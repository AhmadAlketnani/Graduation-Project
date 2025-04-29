<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whenSearch(request()->search)->latest()->paginate(8);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'status' => 'sometimes|required',
        ]);
        $request->password = Hash::make($request->password);
        User::create($request->all());

        session()->flash('success', 'users created successfully.');
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed', // optional + confirmation
        'status' => 'sometimes|required',
    ]);

    // تحضير البيانات
    $data = $request->except('password'); // استثناء كلمة المرور مؤقتاً

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }
    if (!$request->status) {
        $data['status'] = User::STATUS_INACTIVE;
    }

    $user->update($data);

    session()->flash('success', 'User updated successfully.');
    return redirect(route('admin.users.index'));
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('deleted', 'users deleted successfully.');
        return redirect(route('admin.users.index'));
    }

}
