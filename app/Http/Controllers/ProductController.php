<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //display all products
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return response()->json([
            'products' => $products
        ]);
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

    //store a new product
    public function store(Request $request)
    {
         $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'category_id'    => 'required|exists:categories,id',
            'brand'          => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stock'          => 'required|integer|min:0',
        ]);

         $product = Product::create($request->only([
            'name',
            'description',
            'price',
            'discount_price',
            'category_id',
            'brand',
            'image',
            'stock',
        ]));

        if ($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/products', $filename);
    $product->image = 'products/' . $filename;
}


    $product->save();
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    //update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $request->validate([
            'name'           => 'sometimes|required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'sometimes|required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'category_id'    => 'sometimes|required|exists:categories,id',
            'brand'          => 'nullable|string|max:255',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stock'          => 'sometimes|required|integer|min:0',
        ]);

        $product->update($request->only([
            'name',
            'description',
            'price',
            'discount_price',
            'category_id',
            'brand',
            'stock',
        ]));

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ]);
    }

    //delete a product
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
