<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;

Route::get('/', [FrontController::class, 'index']);
Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);
