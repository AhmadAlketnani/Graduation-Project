<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Dashboard\Plane;
use App\Http\Controllers\Controller;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plane::whenSearch(request()->search)->paginate(2);
        return view('dashboard.planes.index', compact('planes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.planes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'product_numbers' => 'required|numeric',
            'period' => 'required|string|max:255',
            'status' => 'sometimes|required',
        ]);
        Plane::create($request->all());
        session()->flash('success', 'Plane created successfully');
        return redirect(route('planes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plane $plane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plane $plane)
    {
        return view('dashboard.planes.edit', compact('plane'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plane $plane)
    {
        dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'product_numbers' => 'required|numeric',
            'period' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $plane->update($request->all());
        session()->flash('success', 'Plane updated successfully');
        return response()->json(['success' => true, 'message' => 'Plane updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plane $plane)
    {
        $plane->delete();
        session()->flash('deleted', 'Plane deleted successfully');
        return redirect(route('planes.index'));
    }
}
