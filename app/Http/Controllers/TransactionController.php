<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    public function store(Request $req)
{
    $product = Product::findOrFail($req->idProduct);
    $idTransaction = 'TR' . now()->timestamp;

    $trx = Transaction::create([
        'idTransaction' => $idTransaction,
        'idUser' => $req->idUser,
        'idProduct' => $product->idProduct,
        'date' => now(),
        'total' => $product->price,
        'status' => 'pending'
    ]);

    return response()->json([
        'message' => 'Order created',
        'transaction' => $trx
    ]);
}

public function addToCart($idProduct, Request $req)
    {
        $product = Product::findOrFail($idProduct);

        $cart = session()->get('cart', []);

        // Kalau produk sudah ada di cart, jangan duplicate
        if (!array_key_exists($idProduct, $cart)) {
            $cart[$idProduct] = [
                'name' => $product->name,
                'price' => $product->price,
                'category' => $product->category,
                'image' => $product->image,
            ];
        }else {
            $cart[$idProduct]['qty'] += 1;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('order', compact('cart'));
    }

    public function checkout(Request $request)
{
    $cart = $request->cart;
    $customer = $request->customer;

    $user = Auth::user();
    if (!$user) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    foreach ($cart as $item) {
        $product = Product::where('name', $item['name'])->first();
        if (!$product) continue;

        Transaction::create([
            'idTransaction' => Str::uuid(),
            'idUser' => $user->idUser,
            'idProduct' => $product->idProduct,
            'date' => now(),
            'total' => $item['price'] * $item['qty'],
            'status' => 'pending',
        ]);
    }

    return response()->json(['message' => 'Checkout berhasil!']);
}


}
