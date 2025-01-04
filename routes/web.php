<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [FrontController::class, 'index']);
Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/checkout', [CartController::class, 'checkout']);
