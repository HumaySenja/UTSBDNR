<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    
    public function shopView(){
        return view('shop', ['title' => "Sangkuriang Mart | Shop"]);
    }
    
    public function shopDetailView(){
        return view('shop-detail', ['title' => "Sangkuriang Mart | Shop Detail"]);
    }
    
    
    public function checkoutView(){
        return view('checkout', ['title' => "Sangkuriang Mart | Checkout"]);
    }
}
