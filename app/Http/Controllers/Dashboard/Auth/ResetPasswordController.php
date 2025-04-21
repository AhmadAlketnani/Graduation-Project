<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request )
    {
        // check the request verfiy
        return view('dashboard.auth.pages.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);



        return response()->json(['message' => 'Password reset successfully.']);
    }
}
