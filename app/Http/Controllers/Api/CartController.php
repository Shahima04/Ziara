<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // List all cart items for the authenticated user
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $cart = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        return response()->json([
            'status' => 'success',
            'cart' => $cart
        ]);
    }

    // Add a product to the cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user_id = $request->user()->id;

        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            $cartItem = Cart::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart',
            'cart_item' => $cartItem->load('product')
        ]);
    }

    // Show a single cart item
    public function show(Request $request, $id)
    {
        $user_id = $request->user()->id;

        $cartItem = Cart::with('product')
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        return response()->json([
            'status' => 'success',
            'cart_item' => $cartItem
        ]);
    }

    // Update quantity of a cart item
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $user_id = $request->user()->id;

        $cartItem = Cart::where('id', $id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Cart updated',
            'cart_item' => $cartItem->load('product')
        ]);
    }

    // Remove a product from the cart
    public function destroy(Request $request, $id)
    {
        $user_id = $request->user()->id;

        $cartItem = Cart::where('id', $id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        $cartItem->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product removed from cart'
        ]);
    }
}
