<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register/process', [UserController::class, 'addUser']);
Route::get('/login', [UserController::class, 'loginView']);
Route::post('/login/process', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);