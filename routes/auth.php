<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    //? This route is for the login action
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
});
Route::middleware('auth')->group(function () {
    Route::delete('/logout', LogoutController::class)->name('logout');
});
