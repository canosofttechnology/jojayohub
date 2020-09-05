<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'contact', 'image', 'roles'];

    public function getRules($act = 'add'){
        $rules = [
            'name' => 'sometimes|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'contact' => 'nullable|string',
            'roles'=> 'sometimes|in:admin,vendor,employee,customers',
            'image' => 'nullable|string'
        ];
        if($act !== 'add'){
            $rules['email'] = 'required|string';
        }
        return $rules;
    }

    public function addressBook(){
        return $this->hasMany('App\Models\AddressBook');
    }

}
