<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    //displays a form in the admin panel to create a new product
    public function create()
    {
        return view('admin.add_product');
    }

    //displaya list of all products
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
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
}
