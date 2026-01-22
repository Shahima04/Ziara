<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $gender = $request->query('gender');
        $categoryId = $request->query('category');
        $tag = $request->query('tag');
        $priceSort = $request->query('price_sort');

        // Base query
        $products = Product::query();

        if ($gender) {
            $products->where('gender', $gender);
        }

        if ($categoryId) {
            $products->where('category_id', $categoryId);
        }

        if ($tag) {
            $products->where('tag', $tag);
        }

        if ($priceSort === 'low') {
            $products->orderBy('price', 'asc');
        } elseif ($priceSort === 'high') {
            $products->orderBy('price', 'desc');
        } else {
            $products->latest();
        }

        $products = $products->get();

        // For filter dropdowns
        $categories = Category::all();

        // Unique tags
        $tags = Product::select('tag')->distinct()->whereNotNull('tag')->get();

        // Best selling for carousel
        $bestSelling = Product::where('tag', 'Best Selling')->latest()->get();

        return view('customer.dashboard', compact('products', 'categories', 'tags', 'bestSelling', 'gender'));
    }
}
