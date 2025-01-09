<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\MyOrdersController;
use App\Http\Controllers\Front\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', [FrontController::class, 'index'])->middleware('throttle:10000,60')->name('index');

Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/login', [FrontController::class, 'login']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::prefix('my-orders')->name('order.')->middleware('auth')->group(function () {
    Route::get('/', [MyOrdersController::class, 'index'])->name('index');
    Route::get('/detail', [MyOrdersController::class, 'detail'])->name('detail');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin.check'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/orders', [AdminController::class, 'index'])->name('orders');
});


Route::prefix('register')->middleware('throttle:registration')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('register');
    Route::post('/', [RegisterController::class, 'register']);
});
Route::prefix('login')->middleware('throttle:login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/activation/{token}', [RegisterController::class, 'activation'])->name('activation');
