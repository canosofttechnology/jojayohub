<?php

namespace App\Http\Controllers;

use App\Models\CategoryPermitted;
use App\Models\Customer;
use App\Models\NewOrder;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $employee_count = User::where('roles', 'employee')->count();
        $vendor_count = User::where('roles', 'vendor')->count();
        $customer_count = User::where('roles', 'customers')->count();

        $user = User::findOrFail(Auth::id());

        $customer_data=null;
        $vendor_data = null;
        $permitted = null;
        $allCategories = null;
        $recent_products = Product::latest()
            ->when($user->roles == 'vendor', function ($q)use($user) {
                $q->where('vendor_id', $user->vendor->id);
            })
            ->limit(10)->get();

        if ($user->roles == 'vendor') {
            $vendor_data = Vendor::with('categoryAssigned')->where('user_id', $user->id)->first();
            if (isset($vendor_data)) {
                $allCategories = ProductCategory::get();
                $permitted = CategoryPermitted::where('vendor_id', $vendor_data->id)->get();
            }
        }
        $inquiries = NewOrder::latest()->limit(10)->get();
        $customers = Customer::latest()->limit(10)->get();
        return view('admin.pages.index', compact('user','employee_count', 'vendor_count', 'customer_count', 'recent_products', 'inquiries', 'customers','vendor_data','allCategories','permitted'));
    }

    public function inquries($inquiry_id)
    {
        $inquiry = NewOrder::findOrFail($inquiry_id);
    }
}
