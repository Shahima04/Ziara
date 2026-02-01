<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {$query = Product::query();

    // Gender filter
    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }

    // Category filter
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    // Tag filter
    if ($request->filled('tag')) {
        $query->where('tag', $request->tag);
    }

    // Price sorting
    if ($request->price_sort === 'low') {
        $query->orderBy('price', 'asc');
    } elseif ($request->price_sort === 'high') {
        $query->orderBy('price', 'desc');
    }

    // Fetch filtered products
    $products = $query->get();

    // Fetch filter options
    $categories = Product::select('category')
        ->whereNotNull('category')
        ->distinct()
        ->get();

    $tags = Product::select('tag')
        ->whereNotNull('tag')
        ->distinct()
        ->get();

    return view('customer.products', [
        'products'   => $products,
        'categories' => $categories,
        'tags'       => $tags,
        'gender'     => $request->gender,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('customer.product-details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
