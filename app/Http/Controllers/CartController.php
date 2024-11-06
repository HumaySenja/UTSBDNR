<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
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
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Melihat isi keranjang
    public function cartView()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $cartItems = Cart::where('user_id', $user->id)
            ->with('product') // Relasi dengan produk
            ->get();

        // Hitung total harga dan subtotal
        $total = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        $title = "Cart";
        return view('cart', compact('cartItems', 'total', 'title'));
    }

    // Menghapus produk dari keranjang
    public function removeFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete(); // Menghapus produk dari keranjang

        return redirect()->route('cart')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function checkout()
    {
        $user = Auth::user();
        
        // Retrieve cart items for the logged-in user
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        
        // Check if there are items in the cart
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Prepare products array and calculate total price
        $products = [];
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $products[] = [
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ];

            $totalPrice += $item->product->price * $item->quantity;
        }

        // Prepare shipping address as an array
        $shippingAddress = [
            'address_line' => $user->address[0]["address_line"],
            'city' => $user->address[0]["city"],
            'postal_code' => $user->address[0]["postal_code"],
        ];

        // Manually create the transaction
        $transaction = new Transaction([
            'user_id' => $user->id,
            'products' => $products,
            'total_price' => $totalPrice + 3000,
            'status' => 'Pending',
            'shipping_address' => $shippingAddress,
            'created_at' => now(),
        ]);

        $transaction->save();

        // Clear the cart after successful checkout
        Cart::where('user_id', $user->id)->delete();

        return redirect('/cart');
    }

}
