<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $bestSellingProducts = Product::where('tag', 'Best Selling')
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('home', compact('bestSellingProducts'));
    }
}
