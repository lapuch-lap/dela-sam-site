<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'quantity', 
        'price_per_day', 
        'deposit', 
        'delivery_price', 
        'description'
    ];
}