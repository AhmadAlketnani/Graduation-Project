<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('dashboard.auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }
}
