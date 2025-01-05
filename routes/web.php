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
Route::get('/', [FrontController::class, 'index'])->middleware('throttle:10000,60');

Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/login', [FrontController::class, 'login']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/my-orders', [MyOrdersController::class, 'index']);
Route::get('/my-orders/detail', [MyOrdersController::class, 'detail']);

Route::middleware('throttle:registration')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::get('/activation/{token}', [RegisterController::class, 'activation'])->name('activation');

Route::middleware('throttle:login')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});
