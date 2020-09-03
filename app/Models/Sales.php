<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['product_id', 'color_id', 'discount', 'user_id', 'size_id', 'price', 'quantity', 'sales_date', 'account_id'];

    public function getRules(){
        $rules = [
            'product_id' => 'required|exists:products,id',
            'user_id' => 'sometimes|exists:users,id',
            'color_id' => 'required|exists:colors,id',
            'account_id' => 'required|exists:accounts,id',
            'size_id' => 'required|exists:sizes,id',
            'price' => 'required|string',
            'discount' => 'nullable|string',
            'quantity' => 'required|string',
            'sales_date' => 'required|string',
        ];

        return $rules;
    }

    public function productName(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function account(){
        return $this->belongsTo('App\Models\Account', 'account_id');
    }

    public function color(){
        return $this->belongsTo('App\Models\Color', 'color_id');
    }

    public function size(){
        return $this->belongsTo('App\Models\Size', 'size_id');
    }

}
