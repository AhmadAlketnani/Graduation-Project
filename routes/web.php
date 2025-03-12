<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PermissionController;


Route::resource('stores', StoreController::class);

Route::resource('categories', CategoryController::class);
Route::resource('Products ', ProductController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions ', PermissionController::class);


Route::get('/', function ()  {
return view('dashboard.layout.app');
});

Route::get('admin', function () {
    return view('dashboard.layout.app');
})->name('admin');
// Route::resource('categories',)
