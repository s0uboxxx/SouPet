<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\StoreOrder;
use App\Mail\OrderCreate;
use Illuminate\Support\Facades\Mail;
use App\Models\ProductQuantity;

class ProductController extends Controller
{
    public function showProducts($pageTitle, $categoryId, $categories, $brands)
    {
        $products = Product::whereHas('categories', function ($query) use ($categoryId) {
            $query->whereIn('categories.id', $categoryId);
        })->paginate(8);

        $hasMorePage = $products->hasMorePages();

        return view('shop.products', compact('products', 'pageTitle', 'hasMorePage', 'categories', 'brands'));
    }

    public function food()
    {
        $categoryFood = [3];
        $pageTitle = 'Danh sách Thức ăn';

        $categories = Category::whereNotIn('id', [3, 4])->get();
        $brands = Brand::whereHas('products', function ($query) use ($categoryFood) {
            $query->whereHas('categories', function ($subquery) use ($categoryFood) {
                $subquery->whereIn('categories.id', $categoryFood);
            });
        })->get();

        return $this->showProducts($pageTitle, $categoryFood, $categories, $brands);
    }

    public function toy()
    {
        $categoryToy = [4];
        $pageTitle = 'Danh sách Đồ chơi';

        $categories = Category::whereNotIn('id', [3, 4, 5, 6, 9, 10, 11])->get();

        $brands = Brand::whereHas('products', function ($query) use ($categoryToy) {
            $query->whereHas('categories', function ($subquery) use ($categoryToy) {
                $subquery->whereIn('categories.id', $categoryToy);
            });
        })->get();

        return $this->showProducts($pageTitle, $categoryToy, $categories, $brands);
    }

    public function filterProducts(Request $request, $category)
    {
        $categoryIds = $request->query('categories', '');
        $brandIds = $request->query('brands', '');
        $price = $request->query('price', '');

        $brandArray = [];

        if ($category == 'toy') {
            $pageTitle = 'Danh sách Đồ chơi';
            $categoryArray = ["4"];
        } else {
            $pageTitle = 'Danh sách Thức ăn';
            $categoryArray = ["3"];
        }

        if (!empty($categoryIds)) {
            $categoryArray = array_merge($categoryArray, explode(',', $categoryIds));
        }
        
        if (!empty($brandIds)) {
            $brandArray = array_merge($brandArray, explode(',', $brandIds));
        }

        $query = Product::where(function ($query) use ($categoryArray, $brandArray) {
            foreach ($categoryArray as $categoryId) {
                $query->whereHas('categories', function ($subquery) use ($categoryId) {
                    $subquery->where('categories.id', $categoryId);
                });
            }

            if (isset($brandArray)) {
                foreach ($brandArray as $brandId) {
                    $query->whereHas('brands', function ($subquery) use ($brandId) {
                        $subquery->where('brands.id', $brandId);
                    });
                }
            }
        });

        $query->orderBy('price', ($price == 'min') ? 'asc' : 'desc');

        $products = $query->paginate(8);

        $hasMorePage = $products->hasMorePages();

        if (!$request->ajax()) {
            return view('shop.products', compact('products', 'pageTitle', 'hasMorePage'));
        }
        return view('shop.product-lm-f', compact('products', 'hasMorePage'));
    }

    public function clearFilter(Request $request, $category)
    {
        if ($category == 'toy') {
            $categoryId = [4];
        } else {
            $categoryId = [3];
        }

        $products = Product::whereHas('categories', function ($query) use ($categoryId) {
            $query->whereIn('categories.id', $categoryId);
        })->paginate(8);

        $hasMorePage = $products->hasMorePages();

        return view('shop.product-lm-f', compact('products', 'hasMorePage'));
    }

    public function loadMore(Request $request, $category, $page)
    {
        $categoryIds = $request->query('filter', '');

        if ($category == 'toy') {
            $categoryArray = ["4"];
        } else {
            $categoryArray = ["3"];
        }

        if ($categoryIds != "") {
            $categoryArray = array_merge($categoryArray, explode(',', $categoryIds));
        }

        $products = Product::where(function ($query) use ($categoryArray) {
            foreach ($categoryArray as $categoryId) {
                $query->whereHas('categories', function ($subquery) use ($categoryId) {
                    $subquery->where('categories.id', $categoryId);
                });
            }
        })->paginate(8, ['*'], 'page', $page);

        $hasMorePage = $products->hasMorePages();

        return view('shop.product-lm-f', compact('products', 'hasMorePage'));
    }

    public function showProductDetail($productId)
    {
        $product = Product::find($productId);

        return view('shop.product-detail', compact('product'));
    }

    public function order(Request $request)
    {
        $productId = $request->input('productId', 0);
        $quantity = $request->input('quantity', 1);
        $user = auth()->user();
        $product = Product::find($productId);

        return view('shop.product-order', compact('user', 'product', 'quantity'));
    }

    public function storeOrder(Request $request)
    {
        $user = auth()->user();

        $storeOrder = new StoreOrder();
        $storeOrder->fill([
            'user_id' => $user->id,
            'product_id' => $request->productId,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'address' => $request->address,
            'phone' => $request->phone,
            'id_status' => 1
        ]);

        $storeOrder->save();

        $productQuantity = ProductQuantity::where('product_id', $request->productId)->first();
        $productQuantity->quantity -= $request->quantity;
        $productQuantity->save();

        session()->flash('success', 'Đặt hàng thành công.');

        $name = explode(' ', $user->name)[count(explode(' ', $user->name)) - 1];
        $level = 'success';
        $actionText = 'Xem chi tiết';
        $greeting = 'Xin chào ' . $name . ',';
        $actionUrl = 'http://da.test/order/d?id=' . $storeOrder->id;

        $productName = Product::find($request->productId)->name;

        $introLines = [
            'Đơn hàng của bạn đã được đặt thành công.',
            'Thông tin đơn hàng:',
            'Sản phẩm: ' . $productName,
            'Tổng tiền: ' . number_format($request->total, 0, ',', '.') . '₫',
        ];

        $outroLines = [];

        Mail::to($user->email)->send(new OrderCreate($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $actionUrl, 1));

        return redirect()->route('trackingOrder');
    }

    public function trackingOrder()
    {
        $user = auth()->user();
        $storeOrders = StoreOrder::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('shop.order-tracking', compact('storeOrders'));
    }

    public function orderCancel(Request $request)
    {
        $user = auth()->user();

        $storeOrder = StoreOrder::find($request->id);
        $storeOrder->status_id = 4;
        
        $storeOrder->save();

        $productId = $storeOrder->product_id;
        $quantity = $storeOrder->quantity;

        $productQuantity = ProductQuantity::where('product_id', $productId)->first();
        $productQuantity->quantity += $quantity;
        $productQuantity->save();

        session()->flash('success', 'Đơn hàng đã được hủy thành công.');

        $name = 'Duy';
        $level = 'error';
        $actionText = 'Xem chi tiết';
        $greeting = 'Xin chào ' . $name . ',';
        $actionUrl = 'http://da.test/order/d?id=' . $storeOrder->id;

        $productName = Product::find($storeOrder->product_id)->name;

        $introLines = [
            'Đơn hàng của bạn đã được hủy thành công.',
            'Thông tin đơn hàng:',
            'Sản phẩm: ' . $productName,
            'Tổng tiền: ' . number_format($storeOrder->total, 0, ',', '.') . '₫',
        ];

        $outroLines = [];

        Mail::to($user->email)->send(new OrderCreate($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $actionUrl, 4));

        return redirect()->route('trackingOrder');
    }

    public function orderDetail(Request $request)
    {
        $user = auth()->user();
        $storeOrder = StoreOrder::find($request->id);

        return view('shop.order-detail', compact('storeOrder'));
    }
}
