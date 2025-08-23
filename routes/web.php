<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
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

use App\Http\Controllers\PageController;

Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');

Route::get('/shop-fullwidth-banner', [PageController::class, 'shopFullwidthBanner'])->name('shopFullwidthBanner');

Route::get('/shop-banner-sidebar', [PageController::class, 'shopBannerSidebar'])->name('shop-banner-sidebar');

Route::get('/product-details', [PageController::class, 'productDetails'])->name('product-details');

Route::get('/order', [PageController::class, 'order'])->name('order');

Route::get('/my-account', [PageController::class, 'myAccount'])->name('my-account');

Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');

Route::get('/checkout', [PageController::class, 'checkout'])->middleware('checkAuth')->name('checkout');

Route::post('/checkout', [PageController::class, 'submit'])->name('checkout.submit');


Route::get('/cart', [PageController::class, 'cart'])->name('cart');

Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');

Route::get('/search-products', [PageController::class, 'searchProducts'])->name('search.products');

Route::get('/', [PageController::class, 'index'])->name('home');

Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');

Route::post('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/cart/html', [CartController::class, 'getCartHtml'])->name('cart.html');

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'userLogin'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'userRegister'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



