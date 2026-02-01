<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    //displays list of all products
    public function index()
    {
        return response()->json(Product::latest()->get());
    }
    
    //display a single product
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        return response()->json([
            'product' => $product
        ]);
    }

    //store a new product in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'gender' => 'required',
        'category' => 'required',
        'stock' => 'required|integer',
        'image' => 'required|image'
        ]);

        $imageName = time().'.'.$request->image->extension();

        //moves the image to public/images directory
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'gender' => $request->gender,
            'description' => $request->description,
            'category' => $request->category,
            'brand' => $request->brand,
            'tag' => $request->tag,
            'discount_price' => $request->discount_price,
            'discount_percent' => $request->discount_percent,
            'stock' => $request->stock,
            'image'=>$imageName,
        ]);

        return redirect()->route('admin.products')->with('success','Product added successfully.');
    }

    public function update(Request $request, $id)
    {
    $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'message' => 'Product not found'
        ], 404);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'gender' => 'required',
        'category' => 'required',
        'stock' => 'required|integer',
        'brand' => 'nullable|string',
        'tag' => 'nullable|string',
        'discount_price' => 'nullable|numeric',
        'discount_percent' => 'nullable|numeric',
        'description' => 'nullable|string',
    ]);

    $product->update($validated);

    return response()->json([
        'message' => 'Product updated successfully',
        'product' => $product
    ]);
}
}
