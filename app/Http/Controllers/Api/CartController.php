<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\inventory;
use App\Models\User;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required  | integer'
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $invent = inventory::where('id', $request->id)->first();
        if ($invent) {
            $user->cart()->create([
                'name' => $invent->name,
                'quantity' => $request->quantity,
                'price' => $invent->price
            ]);
            $invent->update([
                'quantity' => $invent->quantity - $request->quantity
            ]);
            return response()->json(['status' => 200, 'info' => $invent->name . ' added to cart']);
        } else {
            return response()->json(['error' => 'product does not exist']);
        }
    }
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $cart = $user->cart()->where('id', $request->id)->first();
        if ($cart) {
            $cart->delete();
            $invent = inventory::where('id', $request->id)->first();
            $invent->update([
                'quantity' => $invent->quantity + $cart->quantity
            ]);
            return response()->json(['status' => 200, 'info' => $cart->name . ' removed from cart']);
        } else {
            return response()->json(['error' => 'product does not exist or not in cart']);
        }
    }
}
