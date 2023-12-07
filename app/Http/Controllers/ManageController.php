<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Slider;
use App\Models\Order;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Schema;
use App\Charts\TotalOrdersChart;
use App\Charts\TotalBrandsChart;
use App\Charts\TotalCategoryChart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreate;
use App\Policies\ManagePolicy;

class ManageController extends Controller
{
    public function index()
    {
        $customers = User::where('id_role', 3)->get();
        $products = Product::all();
        $orders = Order::all();

        $larapexChart = new \ArielMejiaDev\LarapexCharts\LarapexChart();

        $totalOrdersChart = new TotalOrdersChart($larapexChart);
        $orderData = $totalOrdersChart->build($orders);

        $totalBrandsChart = new TotalBrandsChart($larapexChart);
        $brandData = $totalBrandsChart->build();

        $totalCategoryChart = new TotalCategoryChart($larapexChart);
        $categoryData = $totalCategoryChart->build();

        return view(
            'admin.dashboard',
            compact('customers', 'products', 'orders', 'orderData', 'brandData', 'categoryData')
        );
    }

    public function product()
    {
        $products = Product::paginate(9);
        $brands = Brand::all();
        $categories = Category::whereNotIn('id', [3, 4])->get();

        $categoryF = Category::whereIn('id', [3, 4])->get();

        return view('admin.products.product', compact('products', 'brands', 'categories', 'categoryF'));
    }

    public function storage()
    {
        $storage = Storage::paginate(9);

        return view('admin.storage.storage', compact('storage'));
    }

    public function order()
    {
        $orders = Order::paginate(9);

        return view('admin.orders.order', compact('orders'));
    }

    public function user()
    {
        $users = User::paginate(9);

        return view('admin.users.user', compact('users'));
    }

    public function slider()
    {
        $sliders = Slider::paginate(9);

        return view('admin.sliders.slider', compact('sliders'));
    }

    public function brand()
    {
        $brands = Brand::paginate(9);

        return view('admin.brands.brand', compact('brands'));
    }

    public function category()
    {
        $categories = Category::paginate(9);

        return view('admin.categories.category', compact('categories'));
    }

    public function create(Request $request, $manages)
    {
        $managesF = ucfirst($manages);
        $namespace = 'App\\Models\\';

        $manage = resolve($namespace . $managesF);

        $this->authorize('create', $manage);

        $formData = $request->all();

        $arrayCategory = $request->id_category;
        $password = $request->password;

        $formData = $request->except('id', '_token', 'id_category', 'password');

        if ($request->has('password')) {
            $formData['password'] = bcrypt($password);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/' . $manages;
            $fileName = $this->uploadFile($image, $folder);
            $formData['image'] = $fileName;
        }

        $columns = Schema::getColumnListing($manage->getTable());
        if (in_array('created_at', $columns) && in_array('updated_at', $columns)) {
            $formData['created_at'] = now();
            $formData['updated_at'] = now();
        }
        $manage->insert($formData);

        $manage = $manage->orderBy('id', 'desc')->first();

        if ($manages == 'product') {
            $storage = new Storage();
            $storage->product_id = $manage->id;
            $storage->quantity = 0;
            $storage->save();

            foreach ($arrayCategory as $categoryId) {
                $product_category = new ProductCategory();
                $product_category->id_product = $manage->id;
                $product_category->id_category = $categoryId;
                $product_category->save();
            }
        }

        session()->flash('success', 'Dữ liệu đã được thêm vào bảng ' . $manages);

        return redirect()->back();
    }

    public function delete(Request $request, $manages)
    {
        $id = $request->id;

        $manages = ucfirst($manages);
        $namespace = 'App\\Models\\';

        $manage = resolve($namespace . $manages)::find($id);

        $this->authorize('delete', $manage);

        session()->flash('success', 'Dữ liệu đã được xóa.');

        $manage->delete();

        if ($manages == 'product') {
            $storage = Storage::where('product_id', $id)->first();
            $storage->delete();

            $product_category = ProductCategory::where('id_product', $id)->get();
            foreach ($product_category as $pc) {
                $pc->delete();
            }
        }

        if ($manages == 'brand') {
            $products = Product::where('brand_id', $id)->get();
            foreach ($products as $product) {
                $product->brand_id = 14;
                $product->save();
            }
        }

        if ($manages == 'category') {
            $products = ProductCategory::where('id_category', $id)->get();
            foreach ($products as $product) {
                $product->delete();
            }
        }

        return redirect()->back();
    }

    public function edit(Request $request, $manages)
    {
        $id = $request->id;

        $managesF = ucfirst($manages);
        $namespace = 'App\\Models\\';
        $manage = resolve($namespace . $managesF);

        $this->authorize('edit', $manage);

        $arrayCategory = $request->id_category;

        $formData = $request->except('id', '_token', 'image', 'quantityAdd', 'id_category');

        if ($manages == 'order') {
            if ($request->has('status_id') == 2) {
                $name = explode(' ', auth()->user()->name)[count(explode(' ', auth()->user()->name)) - 1];
                $level = 'success';
                $productId = $manage->where('id', $id)->first()->product_id;
                $productName = Product::where('id', $productId)->first()->name;
                $total = $manage->where('id', $id)->first()->total;
                $actionText = 'Xem chi tiết';
                $greeting = 'Xin chào ' . $name . ',';
                $actionUrl = 'http://da.test/order/d?id=' . $id;

                $introLines = [
                    'Đơn hàng của bạn đã được vận chuyển.',
                    'Thông tin đơn hàng:',
                    'Sản phẩm: ' . $productName,
                    'Tổng tiền: ' . number_format($total, 0, ',', '.') . '₫',
                ];

                $outroLines = [];

                Mail::to(auth()->user()->email)->send(new OrderCreate($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $actionUrl, 2));
            } else if ($request->has('status_id') == 3) {
                $name = explode(' ', auth()->user()->name)[count(explode(' ', auth()->user()->name)) - 1];
                $level = 'success';
                $productId = $manage->where('id', $id)->first()->product_id;
                $productName = Product::where('id', $productId)->first()->name;
                $total = $manage->where('id', $id)->first()->total;
                $actionText = 'Xem chi tiết';
                $greeting = 'Xin chào ' . $name . ',';
                $actionUrl = 'http://da.test/order/d?id=' . $id;

                $introLines = [
                    'Đơn hàng của bạn đã được giao thành công.',
                    'Thông tin đơn hàng:',
                    'Sản phẩm: ' . $productName,
                    'Tổng tiền: ' . number_format($total, 0, ',', '.') . '₫',
                ];

                $outroLines = [];

                Mail::to(auth()->user()->email)->send(new OrderCreate($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $actionUrl, 3));
            } else if ($request->has('status_id') == 4) {
                $name = explode(' ', auth()->user()->name)[count(explode(' ', auth()->user()->name)) - 1];
                $level = 'success';
                $productId = $manage->where('id', $id)->first()->product_id;
                $productName = Product::where('id', $productId)->first()->name;
                $total = $manage->where('id', $id)->first()->total;
                $actionText = 'Xem chi tiết';
                $greeting = 'Xin chào ' . $name . ',';
                $actionUrl = 'http://da.test/order/d?id=' . $id;

                $introLines = [
                    'Đơn hàng của bạn đã bị hủy.',
                    'Thông tin đơn hàng:',
                    'Sản phẩm: ' . $productName,
                    'Tổng tiền: ' . number_format($total, 0, ',', '.') . '₫',
                ];

                $outroLines = [];

                Mail::to(auth()->user()->email)->send(new OrderCreate($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $actionUrl, 4));
            }
        }

        if ($request->has('quantityAdd')) {
            $quantityAdd = $request->quantityAdd;
            $quantity = $manage->where('id', $id)->first()->quantity;
            $formData['quantity'] = $quantity + $quantityAdd;
        }

        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $folder = 'images/' . $manages;
            $fileName = $this->uploadFile($avatar, $folder);
            $formData['avatar'] = $fileName;
            $oldAvatar = $manage->where('id', $id)->first()->avatar;
            $oldFilePath = public_path('images/' . $manages . '/' . $oldAvatar);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/' . $manages;
            $fileName = $this->uploadFile($image, $folder);
            $formData['image'] = $fileName;
            $oldImage = $manage->where('id', $id)->first()->image;
            $oldFilePath = public_path('images/' . $manages . '/' . $oldImage);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $manage->where('id', $id)->update($formData);

        if ($manages == 'product') {
            $product_category = ProductCategory::where('id_product', $id)->get();
            foreach ($product_category as $pc) {
                $pc->delete();
            }
            foreach ($arrayCategory as $categoryId) {
                $product_category = new ProductCategory();
                $product_category->id_product = $id;
                $product_category->id_category = $categoryId;
                $product_category->save();
            }
        }

        session()->flash('success', 'Dữ liệu đã được chỉnh sửa.');

        return redirect()->back();
    }

    public function uploadFile($file, $folder)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs($folder, $fileName, 'public');
        return $fileName;
    }
}
