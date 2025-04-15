<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('dashboard.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        
    }


}
