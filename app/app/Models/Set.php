<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = ['product_id', 'min_order', 'max_order', 'price', 'wholesale_id', 'quantity'];
}
