<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ViewController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/shop', [ViewController::class, 'shopView'])->name('shop');

Route::get('/shop-detail', [ViewController::class, 'shopDetailView'])->name('shop-detail');
Route::get('/register', [UserController::class, 'registerView'])->name('register');
Route::post('/register/process', [UserController::class, 'addUser']);
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login/process', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'cartView'])->name('cart');
    Route::delete('/cart/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/history', [TransactionController::class, 'historyView'])->name('history');
    Route::get('/transactions', [TransactionController::class, 'transactionsView'])->name('transaction');
    Route::post('/pay-transactions', [TransactionController::class, 'updateStatus'])->name('transaction.pay');
    Route::delete('/remove-transactions/{transactionId}', [TransactionController::class, 'removeTransaction'])->name('transaction.remove');
});

Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');