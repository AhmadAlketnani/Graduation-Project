<?php

use App\Http\Middleware\Dashboard\Auth\EnsureTokenIsVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('admin')
                ->name('admin.')
                ->middleware('web')
                ->group(base_path('routes/dashboard/admin.php'));

            Route::prefix('auth')->name('auth.')
                ->middleware('web')
                ->group(base_path('routes/auth.php'));

        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function () {
            return request()->is('admin') || request()->is('admin/*')
                ? route('admin.auth.login') : route('auth.login');
        });

        $middleware->alias(
            [
                'TokenIsVerified' => EnsureTokenIsVerified::class,
            ]
        );

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
