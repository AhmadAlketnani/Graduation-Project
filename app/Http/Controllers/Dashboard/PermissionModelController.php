<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\PermissionModel;
use Illuminate\Http\Request;

class PermissionModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = PermissionModel::paginate(10);
        return view('dashboard.permission_models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.permission_models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PermissionModel::create($request->all());
        session()->flash('success', 'Model added successfully');
        return redirect()->route('permission_models.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionModel $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermissionModel $model)
    {
        return view('dashboard.permission_models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermissionModel $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $model->update($request->all());
        session()->flash('success', 'Model updated successfully');
        return redirect()->route('permission_models.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PermissionModel::destroy($id);
        session()->flash('success', 'Model deleted successfully');
        return redirect()->route('permission_models.index');
    }
}
