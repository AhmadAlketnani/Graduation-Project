<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Store_planes;
use Illuminate\Http\Request;

class StorePlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.store_planes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'store_id' => 'required|exists:stores,id',
            'planes_id' => 'required|exists:planes,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'product_insert' => 'required|integer',
        ]);

        Store_planes::create($request->all());
        session()->flash('success', 'Store Plane created successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $store_plane = Store_planes::findOrFail($id);
        return view('dashboard.store_planes.edit', compact('store_plane'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'store_id' => 'required|exists:stores,id',
            'planes_id' => 'required|exists:planes,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'product_insert' => 'required|integer',
        ]);

        Store_planes::findOrFail($id)->update($request->all());
        session()->flash('success', 'Store Plane updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store_plane = Store_planes::findOrFail($id);
        $store_plane->delete();
        session()->flash('success', 'Store Plane deleted successfully.');
        return back();
    }
}
