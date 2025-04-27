<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereStatus(User::STATUS_INACTIVE)
            ->whenSearch(request()->search)->latest()->paginate(8);
        return view('dashboard.order.index', compact('users'));
    }


    public function accept(Request $request, User $user)
    {
        try {

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'title' => 'User not found',
                    'message' => 'The user does not exist.'
                ], 404);
            }
            $user->status = User::STATUS_ACTIVE;
            $user->save();

            return response()->json([
                'status' => 'success',
                'title' => 'Operation Successful',
                'message' => 'User request accepted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'title' => 'Error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function reject(User $user)
    {
        try {
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'title' => 'User not found',
                    'message' => 'The user does not exist.'
                ], 404);
            }
            $user->delete();

            return response()->json([
                'status' => 'success',
                'title' => 'Operation Successful',
                'message' => 'User request rejected successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'title' => 'Error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

}
