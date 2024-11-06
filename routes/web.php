<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/shop', function(){
    return view('shop');
})->name('shop');

Route::get('/shop-detail', function(){
    return view('shop-detail');
})->name('shop-detail');

Route::get('/cart', function(){
    return view('cart');
})->name('cart');

Route::get('/checkout', function(){
    return view('checkout');
})->name('checkout');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
