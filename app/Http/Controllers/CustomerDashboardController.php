<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $gender   = $request->query('gender');
        $category = $request->query('category');

        $bestSelling = Product::where('tag', 'Best Selling')
            ->latest()
            ->get();

        return view('dashboard.home', compact(
            'bestSelling',
            'gender',
            'category'
        ));
    }
}
