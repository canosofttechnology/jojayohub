<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sales;
use App\Models\ProductSize;
use App\Models\Product;
use App\User;
use App\Models\Vendor;
use App\Models\Payment;

class SalesController extends Controller
{

    protected $sales = null;
    protected $product_sizes = null;
    protected $products = null;
    protected $payments = null;

    public function __construct(Sales $sales, ProductSize $product_sizes, Product $products, Payment $payments, Vendor $vendor, User $user){
        $this->sales = $sales;
        $this->product_sizes = $product_sizes;
        $this->products = $products;
        $this->payments = $payments;
        $this->vendor = $vendor;
        $this->user = $user;
        //$this->authorizeResource(Sales::class, 'sales');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_list = $this->sales->get();
        $vendor_list = $this->vendor->orderBy('company', 'ASC')->get();
        $methods = $this->payments->get();
        $product_list = $this->products->get();
        $retailer_list = $this->user->where('roles', 'customers')->get();
        $active_tab = 'manage';
        return view('admin.pages.sales', compact('sales_list', 'active_tab','product_list', 'methods','vendor_list','retailer_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_list = $this->products->get();
        $vendor_list = $this->vendor->orderBy('company', 'ASC')->get();
        $retailer_list = $this->user->where('roles', 'customers')->get();
        $sales_list = $this->sales->get();
        $methods = $this->payments->get();
        $active_tab = 'create';
        return view('admin.pages.sales', compact('product_list','methods', 'sales_list', 'active_tab','vendor_list','retailer_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->sales->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['product_id'] = $request->product_id;
        $data['vendor_id'] = $request->vendor_id;
        $data['price'] = $request->price;
        $data['price_per_qty'] = $request->price_per_qty;
        $data['quantity'] = $request->quantity;
        $data['date'] = $request->date;
        $data['status'] = $request->status;
        $data['retailer_id'] = $request->retailer_id;
        $data['remarks'] = $request->remarks;
        $data['sku'] = $request->sku;
        $data['invoice'] = 'INVOICE-'.str_pad(time() + 1, 8, "0", STR_PAD_LEFT);
        $this->sales->fill($data);
        $status = $this->sales->save();
        if($status){
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Sales added successfully.'
            );
        } else {
            $notification = array(
                'alert-type' => 'error',
                'message' => 'Sorry! Sales could not be added at this moment.'
            );
        }
        return redirect()->route('sales.index')->with('notification');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->sales->where('slug', $slug)->first();
        $vendor_list = $this->vendor->orderBy('company', 'ASC')->get();
        $retailer_list = $this->user->where('roles', 'customers')->get();
        if(!$data){
            request()->session()->flash('error','Brand Not found');
            return redirect()->route('brands.index');
        }
        return view('admin.pages.add_sales', compact('data','vendor_list','retailer_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->sales = $this->sales->find($id);
        if(!$this->sales) {
            request()->session()->flash('error','Sales not found');
            return redirect()->back();
        }
        $rules = $this->sales->getRules('update');
        $request->validate($rules);
        $data = $request->all();
        $this->sales->fill($data);
        $success = $this->sales->save();
        if($success){
            $request->session()->flash('success','Sales updated successfully.');
        } else {
            $request->session()->flash('error','Problem while updating sales.');
        }
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sales = $this->sales->find($id);
        if(!$this->sales){
            request()->session()->flash('error','Sales Not found');
            return redirect()->route('products.index');
        }

        $success = $this->sales->delete();
        if($success){
            request()->session()->flash('success','Sales deleted successfully.');
        } else {
            request()->session()->flash('error','Sorry! Sales could not be deleted at this moment.');
        }
        return redirect()->route('sales.index');
    }
}
