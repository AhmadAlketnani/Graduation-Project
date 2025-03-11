<?php

use App\Http\Controllers\Dashboard\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;


Route::resource('stores', StoreController::class);

Route::resource('categories', CategoryController::class);

Route::get('/', function ()  {
return view('dashboard.layout.app');
});

Route::get('admin', function () {
    return view('dashboard.layout.app');
})->name('admin');
// Route::resource('categories',)
