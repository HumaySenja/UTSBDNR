<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk dari MongoDB
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return view('home', ['title' => "Sangkuriang Mart", "products" => $products, "cartCount"=> $cartCount]);
    }

     // Menampilkan satu produk berdasarkan ID
     public function show($id)
     {
         $product = Product::find($id); // Mencari produk berdasarkan ID
         if ($product) {
             return response()->json($product); // Mengembalikan produk jika ditemukan
         }
         return response()->json(['message' => 'Product not found'], 404); // Jika produk tidak ditemukan
     }
}
