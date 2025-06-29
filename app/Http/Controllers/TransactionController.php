<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.idProduct' => 'required|exists:products,idProduct',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|integer|min:0',
            'total' => 'required|integer|min:0',
        ]);
        Log::info('Request masuk ke /transaction');
        Log::info('User:', [auth()->user()]);
        Log::info('Items:', $request->items);
        Log::info('Total:', $request->total);

    if (!auth()->check()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
        $user = Auth::user();

        
        $last = Transaction::max('idTransaction');          // null | "CU007"
        $seq  = $last ? (int)substr($last, 2) + 1 : 1;
        $transactionId   = 'tr' . str_pad($seq, 3, '0', STR_PAD_LEFT);
        // Simpan transaksi utama
        $transaction = Transaction::create([
            'idTransaction' => $transactionId,
            'idUser' => $user->idUser,
            'date' => Carbon::now(),
            'total' => $request->total,
            'status' => 'completed',
        ]);

        // Simpan setiap item dalam transaksi
        foreach ($request->items as $item) {
            TransactionDetail::create([
                'idTransaction' => $transactionId,
                'idProduct' => $item['idProduct'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return response()->json([
            'message' => 'Transaksi berhasil disimpan',
            'transaction_id' => $transactionId
        ], 201);
    }

    public function history()
    {
        $user = Auth::user();

        $transactions = Transaction::with(['items.product'])
            ->where('idUser', $user->idUser)
            ->orderBy('date', 'desc')
            ->get();

        return response()->json($transactions);
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

    


}
