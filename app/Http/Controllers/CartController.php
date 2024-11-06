<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId); // Cari produk berdasarkan ID
        $user = Auth::user(); // Ambil user yang sedang login

        // Cek apakah produk sudah ada di keranjang user
        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($cartItem) {
            // Jika sudah ada, tambah kuantitasnya
            $cartItem->increment('quantity');
        } else {
            // Jika belum ada, buat item cart baru
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        // return redirect()->route('cart')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Melihat isi keranjang
    public function cartView()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $cart = Cart::where('user_id', $user->id)->get(); // Ambil semua produk di keranjang user

        return view('cart', ['title' => "Cart", compact('cart')]);
    }

    // Menghapus produk dari keranjang
    public function removeFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete(); // Menghapus produk dari keranjang

        return redirect()->route('cart.view')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    // Mengupdate kuantitas produk di keranjang
    public function updateQuantity(Request $request, $cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.view')->with('success', 'Kuantitas produk diperbarui.');
    }
}
