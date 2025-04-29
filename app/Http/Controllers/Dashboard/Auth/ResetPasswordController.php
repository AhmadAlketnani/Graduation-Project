<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request)
    {
        // check the request verfiy
        return view('dashboard.auth.pages.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Get the email from session
        $email = session('reset_email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            session()->flash('error', [
                'title' => 'Reset Password Failed',
                'message' => 'User not found.'
            ]);
            return redirect()->back();
        }
        // Update the password
        $user->password = bcrypt($request->password);
        $user->save();
        // Clear the session
        session()->forget('reset_email');
        session()->flash('success', [
            'title' => 'Reset Password',
            'message' => 'Password reset successfully.'
        ]);

        // Redirect to login page
        return redirect()->route('admin.auth.login');


    }
}
