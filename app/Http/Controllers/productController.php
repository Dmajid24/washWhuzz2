<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function getProducts(Request $request)
    {
        $category = $request->category;
        if (!$category) {
            return response()->json(['error' => 'Category is required'], 400);
        }

        $products = Product::where('category', $category)->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products available for this category'], 404);
        }

        return response()->json($products);
    }

    public function uploadImage(Request $request)
    {
         // Validasi file gambar
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Menyimpan gambar dan mendapatkan path
            $imagePath = $request->file('image')->store('products', 'public');
            return response()->json(['imagePath' => $imagePath]);
        }

        return response()->json(['error' => 'No valid image uploaded'], 400);
    }

    public function addOrder(Request $request)
    {
        $orderData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:500',
        ]);

        // Simulate order creation logic here
        // For example, you might save the order to a database

        return response()->json(['message' => 'Order placed successfully', 'orderData' => $orderData]);
    }

}
