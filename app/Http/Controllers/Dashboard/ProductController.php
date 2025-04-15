<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductStoreRequest;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Traits\ImagesStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ImagesStorage;
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
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $validate = $request->validated();
        $request_date = $validate->except('images');
        $request_date['images'] = $this->storeImages(
            $request->images,
            $request->name,
            "products/$request->name"
        );
        Product::create($request_date);
        session()->flash('success', 'Product created successfully');
        return redirect(route('products.index'));
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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:50',
            'QTY' => 'required|integer',
            'description' => 'nullable|string',
            'status' => "required|in:" . Product::STATUS_ACTIVE,
            Product::STATUS_INACTIVE,
            // 'store_id' => 'required|exists:stores,id'
        ]);

        $request_date = $request->except('images');

        if ($request->has('images')) {
            $images = [];
            foreach ($request->images as $index => $image) {
                $imageName = $index . '_' . $request->name . time() . '.' . $image->extension();
                $path = "images/products/$request->name/" . $imageName;

                Storage::disk('public')->put($path, file_get_contents($image));
                array_push($images, $path);
            }

            $request_date['images'] = $images;
        }

        $product->update($request_date);
        session()->flash('success', 'Product updated successfully');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image);
        }
        $product->delete();
        session()->flash('deleted', 'Product deleted successfully');
        return redirect(route('products.index'));
    }
}
