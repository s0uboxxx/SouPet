<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\Brand;
use App\Models\Category;
use App\Models\StoreOrder;
use App\Models\User;
use App\Models\SliderImage;

class ManageController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function product()
    {
        $products = Product::all();

        return view('admin.products.product', compact('products'));
    }

    public function storage()
    {
        $storage = ProductQuantity::all();

        return view('admin.storage.storage', compact('storage'));
    }

    public function order()
    {
        $orders = StoreOrder::all();

        return view('admin.orders.order', compact('orders'));
    }

    public function user()
    {
        $users = User::all();

        return view('admin.users.user', compact('users'));
    }

    public function slider()
    {
        $sliders = SliderImage::all();

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
        $manages = ucfirst($manages);
        $namespace = 'App\\Models\\';

        $manage = resolve($namespace . $manages);

        $formData = $request->all();
        
        $formData = $request->except('id','_token');

        $manage->insert($formData);

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

        $manages = ucfirst($manages);
        $namespace = 'App\\Models\\';

        $manage = resolve($namespace . $manages);

        $formData = $request->all();
        $formData = $request->except('id','_token');

        $manage->where('id', $id)->update($formData);

        session()->flash('success', 'Dữ liệu đã được chỉnh sửa.');

        return redirect()->back();
    }
}
