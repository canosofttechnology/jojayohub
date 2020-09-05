<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['product_id', 'discount', 'price', 'quantity', 'date', 'vendor_id','retailer_id','remarks','sold_price','invoice'];

    public function getRules(){
        $rules = [
            'product_id' => 'required|exists:products,id',
            'vendor_id' => 'required|exists:vendors,id',
            'price' => 'required|string',
            'discount' => 'nullable|string',
            'quantity' => 'required|string',
            'date' => 'required|string',
            'retailer_id' => 'required|exists:users,id',
            'remarks' => 'required|string',
            'sold_price' => 'required|numeric',
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

    public function reTailer(){
        return $this->belongsTo('App\User', 'retailer_id');
    }

    public function vendor(){
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }
}
