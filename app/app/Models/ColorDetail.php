<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorDetail extends Model
{
    protected $fillable = ['product_id', 'color_id'];

    public function colorInfo(){
        return $this->belongsTo('App\Models\Color', 'color_id');
    }
}
