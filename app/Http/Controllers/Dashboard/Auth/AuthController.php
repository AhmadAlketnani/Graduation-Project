<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function authenticated(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            return redirect()->intended(route('admin.'));
        }

        session()->put('error', ['title' => 'Login Failed', 'message' => 'Invalid credentials.']);
        return redirect()->back();
    }

}
