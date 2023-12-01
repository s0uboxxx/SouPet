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

class ManageController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function product()
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::whereNotIn('id', [3, 4])->get();

        $categoryF = Category::whereIn('id', [3, 4])->get();

        return view('admin.products.product', compact('products','brands', 'categories', 'categoryF'));
    }

    public function storage()
    {
        $storage = Storage::all();

        return view('admin.storage.storage', compact('storage'));
    }

    public function order()
    {
        $orders = Order::all();

        return view('admin.orders.order', compact('orders'));
    }

    public function user()
    {
        $users = User::all();

        return view('admin.users.user', compact('users'));
    }

    public function slider()
    {
        $sliders = Slider::all();

        return view('admin.sliders.slider', compact('sliders'));
    }

    public function brand()
    {
        $brands = Brand::all();

        return view('admin.brands.brand', compact('brands'));
    }

    public function category()
    {
        $categories = Category::all();

        return view('admin.categories.category', compact('categories'));
    }

    public function create(Request $request, $manages)
    {
        $managesF = ucfirst($manages);
        $namespace = 'App\\Models\\';

        $manage = resolve($namespace . $managesF);

        $formData = $request->all();

        $arrayCategory = $request->id_category;

        $formData = $request->except('id', '_token', 'id_category');

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

        if($manages == 'product'){
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

        session()->flash('success', 'Dữ liệu đã được xóa.');

        $manage->delete();

        return redirect()->back();
    }

    public function edit(Request $request, $manages)
    {
        $id = $request->id;

        $managesF = ucfirst($manages);
        $namespace = 'App\\Models\\';

        $manage = resolve($namespace . $managesF);

        $formData = $request->all();
        $formData = $request->except('id', '_token', 'image', 'quantityAdd');

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
