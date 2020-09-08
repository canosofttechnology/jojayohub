<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeDetail extends Model
{
    protected $fillable = ['product_id', 'size_id'];

    public function sizeInfo(){
        return $this->belongsTo('App\Models\Size', 'size_id');
    }
}
