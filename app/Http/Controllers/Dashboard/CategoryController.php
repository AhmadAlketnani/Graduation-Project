<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Traits\ImagesStorage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ImagesStorage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::whenSearch(request()->search)->paginate(8);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);
        $request_data = $request->except('image');

        $request_data['image'] = $this->storeImage(
            $request->file('image'),
            $request->name . "_image_",
            'categories/' . $request->name
        );

        Category::create($request_data);
        session()->flash('success', 'Category created successfully');
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $request_data = $request->except('image');

        if ($request->hasFile('image')) {
            $request_data['image'] = $this->storeImage(
                $request->file('image'),
                $request->name . "_image_",
                'categories/' . $request->name
            );
            $this->deleteImage($category->image); // Assuming you have a method to delete the old image
        }

        $category->update($request_data);

        if ($request->ajax()) {
            return response()->json(['category' => $category]);
        }

        session()->flash('success', 'Category updated successfully');
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('deleted', 'Category deleted successfully');
        return redirect(route('admin.categories.index'));
    }
}
