<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Cart extends Model
{
    protected $connection = 'mongodb'; // Menggunakan MongoDB
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Relasi dengan produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
