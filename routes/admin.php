<?php

use \App\Http\Controllers\Admin;
use \Illuminate\Support\Facades;

Route::resource('categories', CategoryController::class);
