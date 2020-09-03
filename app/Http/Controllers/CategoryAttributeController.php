<?php

namespace App\Http\Controllers;

use \App\Models\CategoryAttribute;
use \App\Models\AttributeValue;
use \App\Models\ProductAttribute;
use Illuminate\Http\Request;


class CategoryAttributeController extends Controller
{
    protected $category_attribute = null;
    protected $attribute_value = null;
    protected $product_attribute = null;

    public function __construct(CategoryAttribute $category_attribute, AttributeValue $attribute_value, ProductAttribute $product_attribute){
        $this->category_attribute= $category_attribute;
        $this->attribute_value= $attribute_value;
        $this->product_attribute= $product_attribute;
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

    public function getAttribute($id){
        $my_attribute = $this->category_attribute->where('category_id', $id)->get();
        return response()->json($my_attribute);
    }

    public function getAttributeValue($id){
        $my_attribute_value = $this->attribute_value->where('product_attribute_id', $id)->get();
        return response()->json($my_attribute_value);
    }

    public function getAttributeData($id){
        $my_product_attribute = $this->product_attribute->where('id', $id)->get();
        return response()->json($my_product_attribute);
    }
}
