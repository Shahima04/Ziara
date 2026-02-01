<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Add product to cart
    public function add(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user(); // Get logged-in user
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to cart.');
        }

        // Check if the product already exists in the cart
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($cartItem) {
            // If exists, increment quantity by 1
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Else, create a new cart entry
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added to cart!');
    }


    // View user's cart
    public function index(Request $request)
    {
        $user = $request->user();

        // Get cart items for logged-in user
        $cart = Cart::with('product')->where('user_id', $user->id)->get();

        return view('customer.cart', compact('cart'));
    }

    // Remove item from cart
    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        return back()->with('success', 'Product removed from cart!');
    }
}
