<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(8);
        return view('dashboard.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Permission::create($request->all());
        session()->flash('success', 'Permission created successfully');
        return redirect(route('admin.permissions.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('dashboard.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $permission->update($request->all());
        session()->flash('success', 'Permission updated successfully');
        return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('deleted', 'Permission deleted successfully');
        return redirect(route('admin.permissions.index'));
    }
}
