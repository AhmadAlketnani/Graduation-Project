<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;


Route::resource('stores', StoreController::class);

Route::resource('categories', CategoryController::class);
Route::resource('Products ', ProductController::class);


Route::get('admin', function () {
    return view('dashboard.layout.app');
})->name('admin');
