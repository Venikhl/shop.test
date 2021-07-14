<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CartController;
use \App\Http\Middleware\EnsureCartIsNotEmpty;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;

Route::redirect('/', 'products');

Route::middleware('auth')
    ->prefix('cart')
    ->name('cart.')
    ->group(function (){
        Route::get('/', [CartController::class, 'index'])
            ->name('index');

        Route::post('promocode', [CartController::class, 'applyPromocode'])
            ->name('promocode');

        Route::post('{product}', [CartController::class, 'store'])
            ->name('store');

        Route::delete('{cart}', [CartController::class, 'destroy'])
            ->name('destroy');
    });

Route::middleware(['auth'])
    ->group(function (){

        Route::resource('orders', OrderController::class)
            ->middleware(EnsureCartIsNotEmpty::class)
            ->only('create', 'store');

        Route::resource('orders', OrderController::class)
            ->only('show');

    });

Route::resource('products', ProductController::class)
    ->only('index', 'show');

Route::resource('categories', CategoryController::class)
    ->only('show');
