<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Transaction extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'user_id',
        'products',
        'total_price',
        'status',
        'shipping_address',
        'created_at'
    ];

    protected $casts = [
        'products' => 'array',
        'shipping_address' => 'array',
    ];
}

