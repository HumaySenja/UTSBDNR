<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/shop', function(){
    return view('shop');
})->name('shop');

Route::get('/shop-detail', function(){
    return view('shop-detail');
})->name('shop-detail');


Route::get('/checkout', function(){
    return view('checkout');
})->name('checkout');

Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register/process', [UserController::class, 'addUser']);
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login/process', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
Route::delete('/cart/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');





