<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::whenSearch(request()->search)->paginate(8);
        return view('dashboard.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'QTY' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'stor_id' => 'required|exists:stores,id'
        ]);

        Product::create($request->all());
        session()->flash('success', 'Product created successfully');
        return redirect(route('Product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.Products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|string',
            'QTY' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'stor_id' => 'required|exists:stores,id'
        ]);

        $product->update($request->all());
        session()->flash('success', 'Product updated successfully');
        return redirect(route('Product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Product deleted successfully');
        return redirect(route('Product.index'));
    }
}
