<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CartController;

Route::view('/', 'pages.index');

Route::middleware('auth')
    ->prefix('cart')
    ->name('cart.')
    ->group(function (){
        Route::get('/', [CartController::class, 'index'])
            ->name('index');

        Route::post('{product}', [CartController::class, 'store'])
            ->name('store');

        Route::delete('{cart}', [CartController::class, 'destroy'])
            ->name('destroy');
    });

