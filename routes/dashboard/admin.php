<?php

use App\Http\Controllers\Dashboard\Ordercontroller;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\PlaneController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PermissionController;


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.layouts.app'); });

    Route::resource('stores', StoreController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('planes', PlaneController::class);
    Route::resource('users', UserController::class);


    Route::get('orders', [Ordercontroller::class, 'index'])->name('orders.index');
    Route::post('orders/{user}', [Ordercontroller::class, 'accept'])->name('orders.accept');
    Route::delete('orders/{user}', [Ordercontroller::class, 'reject'])->name('orders.reject');

});
require __DIR__ . "/auth.php";


