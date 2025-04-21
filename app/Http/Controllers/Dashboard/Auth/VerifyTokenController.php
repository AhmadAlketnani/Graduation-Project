<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponses;
use Cache;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class VerifyTokenController extends Controller
{
    use JsonResponses;

    private $email = Session::get('reset_email');
    public function show(Request $request)
    {

        return view('dashboard.auth.pages.verify-token');
    }

    public function verifyToken(Request $request)
    {
        $request->validate([
            'token' => 'required|digits:6',
        ]);

        $token = $request->token;
        // Get the token from cache
        $cacheToken = Cache::get('password_reset_' . $this->email);

        // Get the token from the database
        $record = DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->first();

        // Check if cache or DB token exists
        if (!$cacheToken || !$record) {
            session()->put('error', [
                'title' => 'Verification Failed',
                'message' => 'Invalid or expired token.'
            ]);
            return redirect()->back();
        }

        if (Carbon::parse($record->expired_at)->isPast()) {
            session()->put('error', [
                'title' => 'Verification Failed',
                'message' => 'Token has expired.'
            ]);
            return redirect()->back();
        }

        if (!hash_equals((string) $token, (string) $cacheToken) ||
        !hash_equals((string) $token, (string) $record->token)) {
            session()->put('error', [
                'title' => 'Verification Failed',
                'message' => 'Invalid token.'
            ]);
            return redirect()->back();
        }


        // Token is valid
        // Clear cache and DB entry after successful validation
        Cache::forget('password_reset_token_' . $request->email);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('admin.auth.password.reset')
            ->with('success', ['title' => 'Reset Password', 'message' => 'Reset password email sent successfully.']);
    }
}
