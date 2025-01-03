<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index']);
Route::get('/erdem', [FrontController::class, 'erdem']);
Route::get('/contact', [FrontController::class, 'contact']);
