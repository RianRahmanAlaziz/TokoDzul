<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TestimoniController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/shop/{product:slug}', [HomeController::class, 'show']);

Route::get('/cart', [HomeController::class, 'shop_cart'])->middleware('auth');
Route::post('/addToCart', [HomeController::class, 'addToCart']);
Route::get('/deleteToCart/{cart}', [HomeController::class, 'deleteToCart']);
Route::get('/getKabupaten/{id}', [HomeController::class, 'getKabupaten']);
Route::get('/getOngkir/{destination}', [HomeController::class, 'getOngkir']);
Route::post('/checkout-order', [HomeController::class, 'checkoutOrder']);

Route::post('/payments', [HomeController::class, 'payment']);
Route::get('/order', [HomeController::class, 'order']);



// Route::get('/belanja/{post:slug}', [PostController::class, 'show']);
// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Category',
//         'categories' => Category::all()
//     ]);
// });

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('category', [
//         'title' => $category->name,
//         'posts' => $category->post,
//         'category' => $category->name
//     ]);
// });


// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// logOut
Route::post('/logout', [AuthController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/category', CategoryController::class)->middleware('admin');
Route::resource('/dashboard/subcategory', SubcategoryController::class)->middleware('admin');
Route::resource('/dashboard/slider', SliderController::class)->middleware('admin');
Route::resource('/dashboard/testimoni', TestimoniController::class)->middleware('admin');

Route::resource('/dashboard/reviews', ReviewController::class)->middleware('auth');
Route::resource('/dashboard/payment', PaymentController::class)->middleware('auth');
Route::resource('/dashboard/product', ProductController::class)->middleware('auth');

Route::get('/pesanan/baru', [OrderController::class, 'baru'])->middleware('auth');
Route::get('/pesanan/dikonfirmasi', [OrderController::class, 'dikonfirmasi'])->middleware('auth');
Route::get('/pesanan/dikemas', [OrderController::class, 'dikemas'])->middleware('auth');
Route::get('/pesanan/dikirim', [OrderController::class, 'dikirim'])->middleware('auth');
Route::get('/pesanan/diterima', [OrderController::class, 'diterima'])->middleware('auth');
Route::get('/pesanan/selesai', [OrderController::class, 'selesai'])->middleware('auth');


Route::post('pesanan/ubah_status/{order}', [OrderController::class, 'ubah_status']);
Route::get('/dashboard/laporan', [ReportController::class, 'index'])->middleware('auth');
