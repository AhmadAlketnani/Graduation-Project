<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'auth', 'as' => 'auth.',],
    function () {

        Route::middleware('guest')->group(function () {
            Route::get('/login', [AuthController::class, 'login'])->name('login');
            Route::post('/login', [AuthController::class, 'authenticated'])->name('login');

            Route::get('/forgot-password', [AuthController::class, 'login'])->name('password.request');

        });
    }
);
