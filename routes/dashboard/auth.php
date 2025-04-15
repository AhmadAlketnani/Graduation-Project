<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'auth', 'as' => 'auth.',],
    function () {

        Route::middleware('guest')->group(function () {
            Route::get('/login', [AuthController::class, 'login'])->name('login');
            Route::post('/login', [AuthController::class, 'authenticated'])->name('login');

            /**
             * Forgot Password Routes
             */
            Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
            Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
            Route::get('/reset-password/{token}', [AuthController::class, 'login'])->name('password.reset');
            Route::post('/reset-password', [AuthController::class, 'login'])->name('password.update');

            Route::get('/verify-email', [AuthController::class, 'login'])->name('verification.notice');
            Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'login'])->name('verification.verify');
            Route::post('/verify-email', [AuthController::class, 'login'])->name('verification.send');
        });
    }
);
