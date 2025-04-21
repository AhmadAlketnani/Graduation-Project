<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Dashboard\Auth\ResetPasswordLinkMail;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Mail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('dashboard.auth.pages.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $token = random_int(100000, 999999);

        // Store the token in the database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'expired_at' => now()->addMinutes(10),
                'created_at' => now()
            ]
        );

        // Store the token in the database or cache (e.g., using a model or Redis)
        Cache::put('password_reset_token_' . $request->email, $token, now()->addMinutes(10));
        Session::put('reset_email', $request->email);

        // Send the email
        Mail::to($request->email)->send(new ResetPasswordLinkMail(
            $token
        ));

        if ($request->isJson()) {
            session()->put('success', ['title' => 'Reset Password', 'message' => 'Reset password email sent successfully.']);
            return response()->json(['message' => 'Reset password email sent successfully.']);
        }

        return redirect()->route('admin.auth.password.verify-token')
            ->with('success', ['title' => 'Reset Password', 'message' => 'Reset password email sent successfully.']);
    }
}
