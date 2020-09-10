<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CheckLoginController extends Controller
{
    public function index()
    {
        if (Auth::user() && Auth::user()->roles == 'customers') {
            return redirect()->route('customer.dashboard');
        } else {
            return view('frontend.pages.login');
        }
    }
}
