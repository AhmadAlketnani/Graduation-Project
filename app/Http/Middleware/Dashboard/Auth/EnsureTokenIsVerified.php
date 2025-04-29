<?php

namespace App\Http\Middleware\Dashboard\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('reset_email') && Cache::has('password_reset_token_' . Session::get('reset_email'))) {
            // Token is not verified, redirect to verify token page
            return redirect()->route('admin.auth.password.verify-token')->with('error', [
                'title' => 'Unauthorized',
                'message' => 'Please verify your token before resetting your password.',
            ]);
        }
        return $next($request);
    }
}
