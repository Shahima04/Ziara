<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //add product to cart
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $user_id = $request->user()->id;

        $cartItem = Cart::where('user_id', $user_id)
        ->where('product_id', $request->product_id)
        ->first();

        if($cartItem){
            $cartItem->increment('quantity', $request->quantity);
        } else{
            $cartItem = Cart::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart',
            'cart' => $cartItem
        ]);
    }

    //view user specific cart
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $cart = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        return response()->json([
            'cart' => $cart
        ]);
    }

    //update quantity of a cart item
    public function update(Request $request)
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
            'message' => 'Cart updated successfully',
            'cart' => $cartItem->load('product')
        ]);
    }
}
