<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable = ['slug','value','product_attribute_id'];
}
