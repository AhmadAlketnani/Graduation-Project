<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::whenSearch(request()->search)->paginate(8);
        return view('dashboard.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users= User::all();
        return view('dashboard.stores.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:stores',
            'phone'=> 'required|numeric',
            'location'=> 'required|string|max:255',
            'facebook'=> 'required|string|max:255',
            'instagram'=> 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        $phoneNumber = "+970 " . $request->phone;


        $request->merge([
            'phone'=> $phoneNumber,
        ]);

        Store::create($request->all());

        session()->flash('success', 'Store created successfully.');
        return redirect(route('admin.stores.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('dashboard.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:stores,email,' . $store->id,
            'phone'=> 'required|numeric',
            'location'=> 'required|string|max:255',
            'facebook'=> 'required|string|max:255',
            'instagram'=> 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $store->update($request->all());

        session()->flash('success', 'Store updated successfully.');
        return redirect(route('admin.stores.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        session()->flash('deleted', 'Store deleted successfully.');
        return redirect(route('admin.stores.index'));
    }
}
