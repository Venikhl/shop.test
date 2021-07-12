<?php

use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\CategoryController;
use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ProductController;

Route::get('/', DashboardController::class)
    ->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
