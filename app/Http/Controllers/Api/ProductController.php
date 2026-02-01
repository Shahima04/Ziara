<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $request->image->move(public_path('images'), $imageName);

        $product = Product::create([
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
            'image' => $imageName,
        ]);

        return response()->json([
            'message' => 'Product added successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
