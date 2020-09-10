<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('frontend.pages.dashboard');
    }

    public function accountInfo()
    {
        $user = $this->_findUser();
        return view('frontend.pages.account-information', compact('user'));
    }

    public function accountUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // 'current_password' => 'required',
            'contact' => 'nullable|string',
            'billing_address' => 'string',
            'shipping_address' => 'string',
            'image' => 'nullable|string'
        ]);

        $user = $this->_findUser();
        // $request['password']=bcrypt('password');
        // if (Hash::check($request->password, $user->password)) {
            $user->fill($request->only('name', 'email', 'contact'));
            $user->save();
            $user->customer->update($request->only('billing_address', 'shipping_address'));
        // }
        return redirect()->back();
    }

    public function changePasswordForm()
    {
        return view('frontend.pages.customer.change_password');
    }
    public function changePassword(Request $request){

        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $user=$this->_findUser();
        if(Hash::check($request->current_password, $user->password)){
            $new_password=Hash::make($request->password);
            $user->update(['password'=>$new_password]);
        }
        return redirect()->back();
    }

    private function _findUser()
    {
        return User::findOrFail(Auth::id());
    }
}
