<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb'; // Menentukan bahwa model ini menggunakan MongoDB
    protected $collection = 'products'; // Nama koleksi MongoDB (otomatis jadi 'products')

    protected $fillable = [
        'name',
        'category',
        'price',
        'stock',
        'description',
        'images',
    ];
}