<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['user_id', 'company', 'company_address', 'vendor_address', 'status'];

    public function categoryAssigned(){
        return $this->hasMany('App\Models\CategoryPermitted');
    }

}
