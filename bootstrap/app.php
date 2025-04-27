<?php

use App\Http\Middleware\Dashboard\Auth\EnsureTokenIsVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
                Route::prefix('admin')
                    ->name('admin.')
                    ->middleware('web')
                    ->group(base_path('routes/dashboard/admin.php'));

                Route::prefix('auth')->name('auth.')
                    ->middleware('web')
                    ->group(base_path('routes/auth.php'));
            });
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
                'localize' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
                'localizationRedirect' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
                'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
                'localeCookieRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
                'localeViewPath' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
            ]
        );

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
