<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = ['product_id','size_id', 'min_order', 'max_order', 'discount','stock', 'color_id', 'quantity','total_price'];

    public function getRules(){
        $rules = [
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'min_order' => 'required|string',
            'max_order' => 'required|string',
            'quantity' => 'required|string',
            'discount' => 'nullable|string',
            'stock' => 'required|string',
        ];
        return $rules;
    }

}
