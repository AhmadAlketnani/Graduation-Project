<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\Auth\VerifyTokenController;
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
            // verify token
            Route::get('/verify-token', [VerifyTokenController::class, 'show'])->name('password.verify-token');
            Route::post('/verify-token', [VerifyTokenController::class, 'verifyToken'])->name('password.verify-token');
            // reset password
            Route::middleware('TokenIsVerified')->group(function () {
                Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
                Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
            });

            Route::get('/verify-email', [AuthController::class, 'login'])->name('verification.notice');
            Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'login'])->name('verification.verify');
            Route::post('/verify-email', [AuthController::class, 'login'])->name('verification.send');
        });
    }
);
