<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','sku','category_id','brand_id','video','status', 'specification', 'description','warranty', 'vendor_id'];

    public function getRules($act = 'add'){
        $rules = [
            'name' => 'bail|required|string|unique:products,name',
            'slug' => 'bail|required|string|unique:products,slug',
            'sku' => 'bail|required|string|unique:products,sku',
            'specification' => 'bail|required|string',
            'description' => 'bail|required|string',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'vendor_id' => 'nullable|exists:vendors,id',
            'video' => 'nullable|string',
            'warranty' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ];
        if($act !== 'add'){
            $rules['name'] = "required|string";
            $rules['slug'] = "required|string";
            $rules['sku'] = "required|string";
        }
        return $rules;
    }
    public function category(){
        return $this->belongsTo('App\Models\ProductCategory');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function VendorName(){
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }

    public function images(){
      return $this->hasMany('App\Models\ProductImages', 'product_id');
    }

    public function sizes(){
      return $this->hasMany('App\Models\SizeDetail', 'product_id');
    }

    public function set(){
        return $this->hasOne('App\Models\Set', 'product_id');
      }

    public function colors(){
        return $this->hasMany('App\Models\ColorDetail', 'product_id');
    }

    public function finalCategory(){
        return $this->belongsTo('App\Models\SecondaryCategory', 'category_id');
    }

    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id');
    }

}
