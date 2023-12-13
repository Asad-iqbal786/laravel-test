<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\FrontendController;


use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/user-cart', [FrontendController::class, 'cart'])->name('userCart');
    Route::get('/remove-cart/{id}', [UserController::class, 'destroy'])->name('removeCartProduct');
    Route::get('/order-details/{id}', [UserController::class, 'orderDetails'])->name('orderDetails');
    Route::post('/create-order', [OrderController::class, 'createOrder'])->name('createOrder');

});
Route::post('/add-to-cart/{productId}', [UserController::class, 'addToCart'])->name('addToCart');

require __DIR__.'/auth.php';


Route::post('/admin-login', [AdminController::class, 'login'])->name('adminLogin');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('adminHomePage');
    Route::get('/all-sellers', [AdminController::class, 'allSellers'])->name('allSellers');
    Route::get('/all-products', [ProductController::class, 'index'])->name('productIndex');
    Route::match(['get', 'post'], 'add-edit-product/{id?}', [ProductController::class, 'addEditProduct'])->name('addEditProduct');
    Route::get('admin-product-destroy/{id}', [ProductController::class, 'destroy'])->name('productDestroy');
    Route::get('/admin-logout', [AdminController::class, 'logout'])->name('adminLogout');
    Route::get('/all-orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('allOrder');
    Route::get('/order-detail/{id}', [App\Http\Controllers\Admin\OrderController::class, 'adminOrderDetails'])->name('adminOrderDetails');


    


});

Route::middleware(['seller'])->group(function () {
    Route::get('/seller-dashboard', [SellerController::class, 'index'])->name('sellerHomePage');
    Route::get('/logout', [SellerController::class, 'logout'])->name('sellerLogout');
    Route::get('/seller-product', [App\Http\Controllers\Seller\ProductController::class, 'index'])->name('sellerProduct');
    Route::match(['get', 'post'],'seller-add-edit-product/{id?}', [App\Http\Controllers\Seller\ProductController::class, 'addEditSellerProduct'])->name('addEditSellerProduct');
    Route::get('product-destroy/{id}', [App\Http\Controllers\Seller\ProductController::class, 'destroy'])->name('productSellerDestroy');
    Route::get('/all-seller-orders', [App\Http\Controllers\Seller\OrderController::class, 'index'])->name('allSellerOrder');
    Route::get('/seller-order-detail/{id}', [App\Http\Controllers\Seller\OrderController::class, 'sellerOrderDetails'])->name('sellerOrderDetails');


});



// frontend controller

Route::get('/', [FrontendController::class, 'index'])->name('homePage');
Route::get('/products', [FrontendController::class, 'allProducts'])->name('allProducts');
Route::get('/login-register', [FrontendController::class, 'loginRegister'])->name('loginRegister');

Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('productDetails');






