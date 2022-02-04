<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\inventory;
use App\Models\User;

class InventoryController extends Controller
{
    // Read inventory (admin and user)
    public function read()
    {
        $inventory = inventory::get();
        return response()->json(['status' => 200, 'info' => $inventory]);
    }

    // Admin add to inventory
    public function adminCreate(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->where('type', 'admin')->first();
        if (!$user) {
            return response()->json(['error' => 'access denied']);
        }
        $invent = $request->validate([
            'name' => 'required ',
            'price' => 'required | integer',
            'quantity' => 'required | integer',
        ]);
        $invent =  inventory::create($invent);
        return response()->json(['status' => 200, 'info' => $invent, 'Created Successfully']);
    }

    // Admin update inventory
    public function adminUpdate(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->where('type', 'admin')->first();
        if (!$user) {
            return response()->json(['error' => 'access denied']);
        }
        $request->validate([
            'id' => 'required',
            'price' => 'integer',
            'quantity' => 'integer',
        ]);
        if (!$request->price && !$request->quantity && !$request->name) {
            return response()->json(['error' => 'invalid criteria']);
        }
        $invent = inventory::where('id', $request->id)->update($request->all());
        if ($invent) {
            return response()->json(['status' => 200, 'info' => 'Update Success']);
        } else
            return response()->json(['error' => 'product does not exist']);
    }


    // Admin Delete from inventory
    public function adminDelete(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->where('type', 'admin')->first();
        if (!$user) {
            return response()->json(['error' => 'access denied']);
        }
        $request->validate([
            'id' => 'required',
        ]);
        $invent = inventory::where('id', $request->id)->first();
        if ($invent) {
            $invent->delete();
            $user->cart()->where('name', $invent->name)->delete();
            return response()->json(['status' => 200, 'info' => 'Deleted Successfully']);
        } else
            return response()->json(['error' => 'product does not exist']);
    }
}
