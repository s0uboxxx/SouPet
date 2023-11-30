<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;
use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productsFood = Category::find(3)->products()->orderBy('id', 'desc')->take(4)->get();
        $productsToy = Category::find(4)->products()->orderBy('id', 'desc')->take(4)->get();

        $sliderImages = SliderImage::orderBy('id', 'desc')->take(4)->get();

        return view('home', compact('productsFood', 'productsToy', 'sliderImages'));
    }

    public function about()
    {
        return view('about');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Product::where('name', 'like', '%' . $query . '%')->limit(5)->get();

        return response()->json($results);
    }

    public function alert(Request $request)
    {
        $query = $request->input('message');

        session()->flash('success', $query);
    }
}
