<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductWholesale;
use App\Models\Wholesale;

class WholesaleController extends Controller
{
    protected $product_wholesale = null;

    public function __construct(ProductWholesale $product_wholesale, Wholesale $wholesale){
        $this->product_wholesale = $product_wholesale;
        $this->wholesale = $wholesale;
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
        //
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

    public function getDetail(Request $request){
        $data = $this->wholesale->where('id', $request->wholesale_id)->first();
        return response()->json($data);
    }

    public function getWholesale(Request $request){
        $allSales = $this->product_wholesale->where('category_id', $request->cat_id)->get();
        return response()->json($allSales);
    }
}
