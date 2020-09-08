<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeDetail extends Model
{
    protected $fillable = ['product_id', 'product_attribute_id', 'attribute_value_id', 'attribute_value'];
}
