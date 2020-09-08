<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewOrder;
use Gloudemans\Shoppingcart\Facades\Cart;

class NewOrderController extends Controller
{
    protected $new_order = null;

    public function __construct(NewOrder $new_order){
        $this->new_order = $new_order;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $rules = $this->new_order->getRules();
        // $request->validate($rules);
        $data = $request->all();
        $data['phone'] = $request->phone;
        $data['name'] = $request->first_name." ".$request->last_name;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['address'] = $request->address;
        $ids = array();
        foreach(Cart::content() as $order_id) {
            $ids[] = $order_id->id;
        }
        $data['order_id'] = implode(', ', $ids);
        $this->new_order->fill($data);
        $status = $this->new_order->save();
        if($status){
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Order submitted successfully.'
            );
            Cart::destroy();
        } else {
            $notification = array(
                'alert-type' => 'error',
                'message' => 'Problem while submitting order.'
            );
        }
        return redirect()->back()->with($notification);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
