<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\SecondaryCategory;
use App\Models\ProductAttribute;
use App\Models\CategoryAttribute;
use App\Models\ProductWholesale;
use App\Models\Wholesale;
use DB;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $product_category = null;
    protected $secondary_category = null;
    protected $attribute = null;
    protected $sizes = null;
    protected $wholesale = null;
    protected $category_wholesale = null;

    public function __construct(ProductCategory $product_category,SecondaryCategory $secondary_category, Size $sizes, ProductAttribute $attribute, CategoryAttribute $category_attribute, Wholesale $wholesale, ProductWholesale $category_wholesale)
    {
        //$this->authorizeResource(ProductCategory::class, 'productcategory');
        $this->product_category = $product_category;
        $this->secondary_category = $secondary_category;
        $this->sizes = $sizes;
        $this->attribute = $attribute;
        $this->category_attribute = $category_attribute;
        $this->wholesale = $wholesale;
        $this->category_wholesale = $category_wholesale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent = $this->secondary_category->get();
        $allCategories = $this->product_category->orderBy('created_at', 'desc')->get();
        $active_tab = 'manage';
        $secondary_categories = $this->secondary_category->get();
        $all_attributes = $this->attribute->orderBy('name', 'ASC')->get();
        $wholesale_type = $this->wholesale->get();
        return view('admin.pages.product_categories', compact('parent', 'secondary_categories', 'allCategories', 'active_tab','all_attributes','wholesale_type'));
    }

    public function getParentController(){
        $parent = $this->secondary_category->get();
        return response()->json($parent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = $this->secondary_category->get();
        $active_tab = 'create';
        $secondary_categories = $this->secondary_category->get();
        $allCategories = $this->product_category->get();
        $all_attributes = $this->attribute->orderBy('name', 'ASC')->get();
        $wholesale_type = $this->wholesale->get();
        return view('admin.pages.product_categories', compact('secondary_categories','parent', 'active_tab', 'allCategories','all_attributes','wholesale_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->product_category->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['name'] = $request->name;
        $data['secondary_category_id'] = $request->secondary_category_id;
        $data['slug'] = $request->slug;
        $data['warranty'] = $request->warranty;
        $this->product_category->fill($data);
        $status = $this->product_category->save();
        $product_category_id = $this->product_category->id;
        if(!empty($request->size)){
        $sizes = explode(',', $request->size);
            for($i=0; $i<count($sizes); $i++){
                $this->sizes = new Size;
                $slug_data = strtolower(str_replace(' ', '-', trim($sizes[$i])));
                $sizes_data['slug'] = $slug_data;
                $sizes_data['name'] = $sizes[$i];
                $sizes_data['product_category_id'] = str_replace('-','',$product_category_id);
                $this->sizes->fill($sizes_data);
                $this->sizes->save();
            }
        }
        if(!empty($request->product_attribute_id)){
            for($i=0; $i<count($request->product_attribute_id); $i++){
                $this->category_attribute = new CategoryAttribute;
                $category_attr_data['category_id'] = $product_category_id;
                $category_attr_data['product_attribute_id'] = $request->product_attribute_id[$i];
                $this->category_attribute->fill($category_attr_data);
                $this->category_attribute->save();
            }
        }
        if(!empty($request->wholesale_id)){
            for($w=0; $w<count($request->wholesale_id); $w++){
                $this->product_wholesale = new ProductWholesale;
                $category_wholesale['category_id'] = $product_category_id;
                $category_wholesale['wholesale_id'] = $request->wholesale_id[$w];
                $this->product_wholesale->fill($category_wholesale);
                $this->product_wholesale->save();
            }
        }
        if($status){
            $request->session()->flash('success','Category created successfully.');
        } else {
            $request->session()->flash('error','Problem while creating category.');
        }
        return redirect()->route('product_categories.index');
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
        $active_tab = 'create';
        $data = $this->product_category->find($id);
        if(!$data){
            request()->session()->flash('error','Category Not found');
            return redirect()->back();
        }
        $selected_attributes = $this->category_attribute->where('category_id', $data->id)->get();
        $selected_wholesale = $this->category_wholesale->where('category_id', $data->id)->get();
        $size_list = $this->sizes->select('name')->where('product_category_id', $data->id)->get()->toArray();
        $size_list = str_replace(' ','',array_column($size_list, 'name'));
        $all_categories = $this->secondary_category->get();
        $secondary_categories = $this->secondary_category->get();
        $all_attributes = $this->attribute->orderBy('name', 'ASC')->get();
        $allCategories = $this->product_category->orderBy('created_at', 'desc')->get();
        $wholesale_type = $this->wholesale->get();
        return view('admin.pages.product_categories', compact('all_categories', 'allCategories', 'data','size_list', 'secondary_categories', 'active_tab','all_attributes','selected_attributes','wholesale_type','selected_wholesale'));
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
        $this->product_category = $this->product_category->find($id);
        if(!$this->product_category) {
            request()->session()->flash('error','Category not found');
            return redirect()->back();
        }
        $rules = $this->product_category->getRules('update');
        $request->validate($rules);
        $data = $request->all();
        $this->product_category->fill($data);
        $success = $this->product_category->save();
        $product_category_id = $this->product_category->id;
        if($success){
            $sizes_to_delete = $this->sizes->where('product_category_id', $id)->get()->toArray();
            $ids_to_delete = array_map(function($item){ return $item['id']; }, $sizes_to_delete);
            DB::table('sizes')->whereIn('id', $ids_to_delete)->delete();
            if(!empty($request->size)){
            $sizes = explode(',', $request->size);
                for($i=0; $i<count($sizes); $i++){
                    $this->sizes = new Size;
                    $slug_data = strtolower(str_replace(' ', '-', trim($sizes[$i])));
                    $sizes_data['slug'] = $slug_data;
                    $sizes_data['name'] = $sizes[$i];
                    $sizes_data['product_category_id'] = $product_category_id;
                    $this->sizes->fill($sizes_data);
                    $this->sizes->save();
                }
            }
            // Delete first
            if(!empty($request->product_attribute_id)){
                $attributes_to_delete = $this->category_attribute->where('category_id', $id)->get()->toArray();
                $categories_to_delete = array_map(function($item){ return $item['id']; }, $attributes_to_delete);
                DB::table('category_attributes')->whereIn('id', $categories_to_delete)->delete();
                for($i=0; $i<count($request->product_attribute_id); $i++){
                    $this->category_attribute = new CategoryAttribute;
                    $category_attr_data['category_id'] = $product_category_id;
                    $category_attr_data['product_attribute_id'] = $request->product_attribute_id[$i];
                    $this->category_attribute->fill($category_attr_data);
                    $this->category_attribute->save();
                }
            }
            if(!empty($request->wholesale_id)){
                $wholesale_to_delete = $this->category_wholesale->where('category_id', $id)->get()->toArray();
                $categories_to_delete = array_map(function($item){ return $item['id']; }, $wholesale_to_delete);
                DB::table('product_wholesales')->whereIn('id', $categories_to_delete)->delete();
                for($w=0; $w<count($request->wholesale_id); $w++){
                    $this->product_wholesale = new ProductWholesale;
                    $category_wholesale['category_id'] = $product_category_id;
                    $category_wholesale['wholesale_id'] = $request->wholesale_id[$w];
                    $this->product_wholesale->fill($category_wholesale);
                    $this->product_wholesale->save();
                }
            }
            $notification = array(
                'message' => 'Category updated successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Problem while updating category.',
                'alert-type' => 'error'
            );            
        }
        return redirect()->route('product_categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product_category = $this->product_category->find($id);
        if(!$this->product_category){
            request()->session()->flash('error','Category Not found');
            return redirect()->route('category.index');
        }

        $success = $this->product_category->delete();
        if($success){
            return response()->json(['status'=>true,'data'=>'Category deleted successfully.']);
        } else {
            return response()->json(['status'=>false,'data'=>null]);
        }
    }

    public function lastData(){
        $lastData = $this->product_category->orderBy('id', 'desc')->first();
        $parent = $this->product_category->get();
        return response()->json(['lastData'=>$lastData, 'parent'=>$parent]);
    }

    public function editCategory($slug){
        $data = $this->product_category->where('slug', $slug)->first();
        if(!$data){
            request()->session()->flash('error','Category Not found');
            return redirect()->route('product_categories.index');
        }
        $parent = $this->secondary_category->get();
        return view('admin.pages.categoryEdit', compact('parent','data'));
    }
}
