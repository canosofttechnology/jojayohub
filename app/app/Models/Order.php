<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id','user_id','color_id','size_id','price','quantity','status','delivery_date','order_id'];

    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
