<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);
        return view('frontend.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.product-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        // $request->validated();

        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|string',
            'image_path' => 'nullable | image',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'is_active' => 'sometimes',
        ]);
        //One way of storinf data into the database
        // $product = new Product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->is_active = $request->is_active == true ? 1 : 0;

        // $product->save();

        // // return to_route('product.create')->with('success', 'Product created successfully');
        // return redirect()->back()->with('success', 'Product created successfully');

        //Second way of storing data using create() of Eloquent model
        //Check if the user has sellected a file
        if($request->hasFile('image')){
            //get the file path & store it
            $file_path = $request->file('image')->store('products/images');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $file_path,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);

        return to_route('product.index')->with('success', 'Product created successfully');

//Third way of storing data into the database by injecting your attributes into the model

        // if($request->hasFile('image')){
        //     $file_path = $request->file('image')->store('products/images');
        // }
        // $product = new Product([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'image_path' =>$file_path,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1 : 0,
        // ]);

        // $product->save();
        // return to_route('product.index')->with('success', 'Product created successfully');


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
        return view('frontend.product-edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|string',
            'image_path' => 'nullable | image',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'is_active' => 'sometimes',
        ]);
         if ($request->hasFile('image') && $product->image_path) {
            Storage::delete($product->image_path);
            $product->image_path = $request->file('image')->store('products/images');
         } else if($request->hasFile('image') && !$product->image_path){
            $product->image_path = $request->file('image')->store('products/images');
         }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $product->image_path,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return to_route('product.index')->with('success', 'Product updated successfully! 😂');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image_path);
        $product->delete();
        return back()->with('success', 'Product deleted successfully! ❌');
    }
}
