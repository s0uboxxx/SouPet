<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::post('/edit-profile', [UserController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('/change-password', [UserController::class, 'changePassword'])->name('changePassword')->middleware('auth');


Route::get('/food', [ProductController::class, 'food'])->name('food');
Route::get('/toy', [ProductController::class, 'toy'])->name('toy');
Route::get('/{category}/p', [ProductController::class, 'filterProducts']);
Route::get('/{category}/clear', [ProductController::class, 'clearFilter']);
Route::get('/{category}/more/{page}', [ProductController::class, 'loadMore']);
Route::get('/product/{productId}', [ProductController::class, 'showProductDetail']);
// Route::get('/product/{productId}/add-to-cart', [ProductController::class, 'addToCart']);
Route::get('/order/o', [ProductController::class, 'order'])->name('order')->middleware('auth');
Route::post('/order/o', [ProductController::class, 'storeOrder'])->name('storeOrder')->middleware('auth');
Route::get('/tracking/order', [ProductController::class, 'trackingOrder'])->name('trackingOrder')->middleware('auth');
Route::get('/order/d', [ProductController::class, 'orderDetail'])->name('orderDetail')->middleware('auth');
Route::get('/ordercancel', [ProductController::class, 'orderCancel'])->name('orderCancel')->middleware('auth');


Route::get('/order', function () {
    return redirect()->route('home');
});

Route::get('/order/detail', function () {
    return redirect()->route('trackingOrder');
});

// Route::get('/manages', function () {
//     return redirect()->route('dashboard');
// });

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/alert', [HomeController::class, 'alert'])->name('alert');

Route::get('/dashboard', [ManageController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/manage/product', [ManageController::class, 'product'])->name('manage-product')->middleware('auth');
Route::get('/manage/storage', [ManageController::class, 'storage'])->name('manage-storage')->middleware('auth');
Route::get('/manage/user', [ManageController::class, 'user'])->name('manage-user')->middleware('auth');
Route::get('/manage/order', [ManageController::class, 'order'])->name('manage-order')->middleware('auth');
Route::get('/manage/category', [ManageController::class, 'category'])->name('manage-category')->middleware('auth');
Route::get('/manage/slider', [ManageController::class, 'slider'])->name('manage-slider')->middleware('auth');
Route::get('/manage/brand', [ManageController::class, 'brand'])->name('manage-brand')->middleware('auth');

Route::get('/manage/{manages}/delete', [ManageController::class, 'delete'])->name('delete')->middleware('auth');
Route::post('/manage/{manages}/create', [ManageController::class, 'create'])->name('create')->middleware('auth');
Route::post('/manage/{manages}/edit', [ManageController::class, 'edit'])->name('edit')->middleware('auth');