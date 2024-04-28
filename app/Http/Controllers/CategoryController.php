<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(5);
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string |max:255 ',
            'description' => 'required | string | max:255 ',
            'image_path' => 'nullable | image',
            'is_active' => 'sometimes',
        ]);
        //Check if the user has sellected a file
        if($request->hasFile('image')){
            //get the file path & store it
            $file_path = $request->file('image')->store('categories/images');
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $file_path,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return to_route('category.index')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required | string |max:255 ',
            'description' => 'required | string | max:255 ',
            'image_path' => 'nullable | image',
            'is_active' => 'sometimes',
        ]);

        if($request->hasFile('image') && $category->image_path){
            Storage::delete($category->image_path);
            $category->image_path = $request->file('image')->store('categories/images');
        } else if($request->hasFile('image') && !$category->image_path){
            $category->image_path = $request->file('image')->store('categories/images');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' =>  $category->image_path,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);

        return to_route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image_path);
        $category->delete();
        return back()->with('success', 'Category deleted successfully 😂');
    }
}
