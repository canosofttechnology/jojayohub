<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = ['name','slug','field'];

    public function getRules(){
        $rules = array(
            'name' => 'required|string',
            'slug' => 'required|string',
            'field' => 'required|string',
        );
        return $rules;
    }

    public function attributeValue(){
        return $this->hasMany('App\Models\AttributeValue', 'product_attribute_id');
    }
}
