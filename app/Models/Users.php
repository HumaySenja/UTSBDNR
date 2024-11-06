<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Users extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['name', 'email', 'address', 'phone', 'password'];
    protected $hidden = ['password'];

}