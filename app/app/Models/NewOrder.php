<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    protected $fillable = ['phone','email','name','company_name','phone','address','order_id'];

    public function getRules($act = 'add'){
        $rules = array(
            'phone' => 'required|string',
            'email' => 'required|string',
            'name' => 'required|string',
            'company_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'order_id' => 'nullable|string'
        );
        return $rules;
    }
}
