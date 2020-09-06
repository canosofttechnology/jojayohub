<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductSize;
use App\Models\SecondaryCategory;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\Set;
use App\Models\SizeDetail;
use App\Models\ColorDetail;
use App\Models\SimilarProducts;
use App\Models\Vendor;
use App\Models\ProductExpense;
use App\Models\ProductAttributeDetail;
use App\Models\AttributeValue;
use App\Models\ProductWholesale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    protected $product = null;
    protected $size = null;
    protected $product_size = null;
    protected $product_image = null;
    protected $brand = null;
    protected $secondary_category = null;
    protected $color = null;
    protected $product_categories = null;
    protected $vendors = null;
    protected $product_expense = null;
    protected $color_detail = null;
    protected $size_detail = null;
    protected $set = null;
    protected $attribute_value = null;
    protected $product_wholesale = null;

    public function __construct(Product $product,Size $size,ProductSize $product_size,productImages $product_image,Brand $brand,SecondaryCategory $secondary_category,Color $color, ProductCategory $product_categories, Vendor $vendors, ProductExpense $product_expense, ColorDetail $color_detail, Set $set,ProductWholesale $product_wholesale, SizeDetail $size_detail, ProductAttributeDetail $attribute_value)
    {
        //$this->authorizeResource(Product::class, 'product');
        $this->product = $product;
        $this->size = $size;
        $this->product_size = $product_size;
        $this->product_image = $product_image;
        $this->brand = $brand;
        $this->set = $set;
        $this->product_wholesale = $product_wholesale;
        $this->attribute_value = $attribute_value;
        $this->secondary_category = $secondary_category;
        $this->color = $color;
        $this->color_detail = $color_detail;
        $this->size_detail = $size_detail;
        $this->vendors = $vendors;
        $this->product_categories = $product_categories;
        $this->product_expense = $product_expense;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->roles == 'admin' || auth()->user()->roles == 'employee'){
            $allProducts = $this->product->orderBy('created_at', 'desc')->get();
        } else{
            $vendor_data = $this->vendors->where('user_id', auth()->user()->id)->pluck('id')->first();
            $allProducts = $this->product->where('vendor_id', $vendor_data)->orderBy('created_at', 'desc')->get();
        }
        $allProducts = $this->product->orderBy('created_at', 'desc')->get();
        $active_tab = "manage";
        $brands = $this->brand->get();
        $category = $this->product_categories->get();
        $color_list = $this->color->get();
        $vendor_list = $this->vendors->get();
        $current_vendor = $this->vendors->with('categoryAssigned')->where('user_id', auth()->user()->id)->first();
        return view('admin.pages.products', compact('allProducts', 'active_tab','color_list', 'brands', 'category', 'vendor_list','current_vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allProducts = $this->product->orderBy('created_at', 'desc')->get();
        $active_tab = "create";
        $brands = $this->brand->get();
        $category = $this->product_categories->get();
        $vendor_list = $this->vendors->get();
        $color_list = $this->color->get();
        $current_vendor = $this->vendors->with('categoryAssigned')->where('user_id', auth()->user()->id)->first();
        return view('admin.pages.products', compact('color_list','allProducts', 'brands','category', 'vendor_list', 'active_tab','current_vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = $this->product->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['name'] = $request->name.' '.$request->sku;
        $data['slug'] = $request->slug.'-'.$request->sku;
        $data['sku'] = $request->sku;
        $data['description'] = $request->description;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['vendor_id'] = $request->vendor_id;
        $data['video'] = $request->video;
        $data['status'] = $request->status;
        $this->product->fill($data);
        $status = $this->product->save();
        $product_id = $this->product->id;
        if($status){
            if(!empty($request->image)){
                $images = $request->image;
                $images = str_replace('"', '', $images);
                $images = str_replace(array('[',']'),'',$images);
                $images = explode(',', $images);
                for($j = 0; $j < count($images);){
                    $extension = pathinfo($images[$j], PATHINFO_EXTENSION);
                    $path = public_path().'/uploads/products/';
                    $name = ucfirst('Product').'-'.date('Ymdhis').rand(0,999).".".$extension;
                    $file_name = $path.$name;
                    $validator = Validator::make($request->only(['product_id', 'image', 'imageColor']), [
                    'image' => 'required',
                    ]);
                    if ($validator->fails()) {
                        $delete_products = $this->product->find($product_id);
                        $success = $this->product->delete();
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                    $this_image = file_put_contents($file_name, file_get_contents($images[$j]));
                    if($this_image){
                        $thumbnail_image = resizeImage($path, $name, $file_name, '900x900');
                    }
                    $product_image = new productImages();
                    $image_data['product_id'] = $product_id;
                    $image_data['image'] = $name;
                    $product_image->fill($image_data);
                    $product_image->save();
                    $j++;
                }

            } elseif($request->hasFile('images')){
                for($j = 0; $j < count($request->images);){
                    $pro_image = uploadImage($request->images[$j], 'products', '1920x930');
                    $product_image = new productImages();
                    $image_data['product_id'] = $product_id;
                    $image_data['image'] = $pro_image;
                    $product_image->fill($image_data);
                    $product_image->save();
                    $j++;
                }
            } else {
               $notification = array(
                    'message' => 'Please upload images for this product.',
                    'alert-type' => 'error'
                );
               $delete_news = $this->product->find($product_id);
               $success = $this->product->delete();
               return redirect()->back()->with($notification);
            }
            if(!empty($request->size)){
                for($i = 0; $i < count($request->size); $i++){
                    $validator = Validator::make($request->only(['size', 'min_order', 'max_order', 'price', 'wholesale', 'color']), [
                    'size' => 'required|array',
                    'size.*' => 'required|exists:sizes,id',
                    'price' => 'required|array',
                    'price.*' => 'required|string',
                    'max_order' => 'required|array',
                    'max_order.*' => 'required|string',
                    'price' => 'required|array',
                    'price.*' => 'nullable|string',
                    'min_order' => 'required|array',
                    'min_order.*' => 'required|string',
                    'color' => 'required|array',
                    'color' => 'required|exists:colors,id',
                    ]);
                    if ($validator->fails()) {
                        $delete_products = $this->product->find($product_id);
                        $success = $this->product->delete();
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                    for($i = 0; $i < count($request->color); $i++){
                        $product_set = new ColorDetail();
                        $set_data['product_id'] = $product_id;
                        $set_data['color_id'] = $request->color[$i];
                        $product_set->fill($set_data);
                        $data_set = $product_set->save();
                        $product_color_id = $product_set->id;
                        for($s = 0; $s < count($request->size); $s++){
                            $size_detail = new SizeDetail();
                            $size_data['product_id'] = $product_id;
                            $size_data['size_id'] = $request->size[$s];
                            $size_detail->fill($size_data);
                            $data_size = $size_detail->save();
                        }
                    }


                }
            for($i = 0; $i < count($request->price); $i++){
                $product_price = new Set();
                $price_data['product_id'] = $product_id;
                $price_data['min_order'] = $request->min_order[$i];
                $price_data['max_order'] = $request->max_order[$i];
                $price_data['price'] = $request->price[$i];
                $price_data['wholesale'] = $request->wholesale[$i];
                $product_price->fill($price_data);
                $data_size = $product_price->save();
            }
            // product attributes
            foreach($request->attr as $key => $val){
                $attr_data = new ProductAttributeDetail();
                $attr_detail['product_id'] = $product_id;
                $attr_detail['product_attribute_id'] = $key;
                if(is_numeric($val)){
                    $attr_detail['attribute_value_id'] = $val;
                } else {
                    $attr_detail['attribute_value_id'] = null;
                    $attr_detail['attribute_value'] = $val;
                }
                $attr_data->fill($attr_detail);
                $attr_size = $attr_data->save();
            }
            if(!empty($request->similar_poducts)){
                $simi_ids = implode(",", $request->similar_poducts);
                $simi_data = new SimilarProducts();
                $simi_detail['product_id'] = $product_id;
                $simi_detail['ids'] = $simi_ids;
                $simi_data->fill($simi_detail);
                $simi_data->save();
            }
            } else {
                $notification = array(
                    'message' => 'Please select sizes for this product.',
                    'alert-type' => 'error'
                );
               $delete_news = $this->product->find($product_id);
               $success = $this->product->delete();
               return redirect()->back()->with($notification);
            }
            $notification = array(
              'message' => 'Product created successfully.',
              'alert-type' => 'success'
            );
        } else {
            $notification = array(
              'message' => 'Problem while adding product.',
              'alert-type' => 'error'
            );
        }
        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = $this->product->find($id);
        if(!$data) {
            $notification = array(
              'message' => 'Product not found.',
              'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $color_list = $this->color->get();
        $active_tab = "create";
        $colors_available = $this->color_detail->where('product_id', $id)->get();
        $sizes_available = $this->size_detail->where('product_id', $id)->get();
        $image_data = $this->product_image->where('product_id', $id)->distinct()->get()->toArray();
        $avail_data = $this->set->where('product_id', $id)->distinct()->get()->toArray();
        $colors = $this->color->get();
        $product_sizes = $this->size->where('product_category_id', $data->category_id)->get();
        $wholesale_types = $this->product_wholesale->where('category_id', $data->category_id)->get();
        $brands = $this->brand->get();
        $category = $this->product_categories->get();
        $product_attr = $this->product_categories->with('attributes')->where('id', $data->category_id)->get();
        $vendor_list = $this->vendors->get();
        $allProducts = $this->product->orderBy('created_at', 'desc')->get();
        $current_vendor = $this->vendors->with('categoryAssigned')->where('user_id', auth()->user()->id)->first();
        return view('admin.pages.products', compact('category','product_attr','wholesale_types','colors','brands','product_sizes','colors_available','sizes_available','data','image_data', 'avail_data','vendor_list', 'active_tab','color_list', 'allProducts','current_vendor'));
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
        $this->product = $this->product->with('images')->find($id);
        if(!$this->product) {
            $notification = array(
              'message' => 'Product not found.',
              'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $rules = $this->product->getRules('update');
        $request->validate($rules);
        $data = $request->all();
        $this->product->fill($data);
        $success = $this->product->save();
        $product_id = $this->product->id;
        if($success){
            if(!empty($request->color)){
                $color_to_delete = $this->color_detail->where('product_id', $id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $color_to_delete);
                DB::table('color_details')->whereIn('id', $ids_to_delete)->delete();
                for($i = 0; $i < count($request->color); $i++){
                    $product_set = new ColorDetail();
                    $set_data['product_id'] = $product_id;
                    $set_data['color_id'] = $request->color[$i];
                    $product_set->fill($set_data);
                    $data_set = $product_set->save();
                    $product_color_id = $product_set->id;
                }
            }
            if(!empty($request->size)){
                $size_to_delete = $this->size_detail->where('product_id', $id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $size_to_delete);
                DB::table('size_details')->whereIn('id', $ids_to_delete)->delete();
                for($s = 0; $s < count($request->size); $s++){
                    $size_detail = new SizeDetail();
                    $size_data['product_id'] = $product_id;
                    $size_data['size_id'] = $request->size[$s];
                    $size_detail->fill($size_data);
                    $data_size = $size_detail->save();
                }
            }
            // }
            if(!empty($request->image)){
                $images_to_delete = $this->product_image->where('product_id', $id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $images_to_delete);
                DB::table('product_images')->whereIn('id', $ids_to_delete)->delete();
                $images = $request->image;
                $images = str_replace('"', '', $images);
                $images = str_replace(array('[',']'),'',$images);
                $images = explode(',', $images);
                for($j = 0; $j < count($images);){
                    $extension = pathinfo($images[$j], PATHINFO_EXTENSION);
                    $path = public_path().'/uploads/products/';
                    $name = ucfirst('Product').'-'.date('Ymdhis').rand(0,999).".".$extension;
                    $file_name = $path.$name;
                    $validator = Validator::make($request->only(['product_id', 'image', 'imageColor']), [
                    'image' => 'required',
                    ]);
                    if ($validator->fails()) {
                        $delete_products = $this->product->find($product_id);
                        $success = $this->product->delete();
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                    $this_image = file_put_contents($file_name, file_get_contents($images[$j]));
                    if($this_image){
                        $thumbnail_image = resizeImage($path, $name, $file_name, '900x900');
                    }
                    $product_image = new productImages();
                    $image_data['product_id'] = $product_id;
                    $image_data['image'] = $name;
                    $product_image->fill($image_data);
                    $product_image->save();
                    $j++;
                }
                if(!empty($this->product->images)){
                    foreach($this->product->images as $del_image){
                        if(file_exists(public_path().'/uploads/products/'.$del_image))
                        {
                            unlink(public_path().'/uploads/products/'.$del_image);
                            unlink(public_path().'/uploads/products/Thumb-'.$del_image);
                        }
                    }
                }
            }
            elseif($request->hasFile('images')){
                $images_to_delete = $this->product_image->where('product_id', $id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $images_to_delete);
                DB::table('product_images')->whereIn('id', $ids_to_delete)->delete();
                for($j = 0; $j < count($request->images);){
                    $pro_image = uploadImage($request->images[$j], 'products', '1920x930');
                    $product_image = new productImages();
                    $image_data['product_id'] = $product_id;
                    $image_data['image'] = $pro_image;
                    $product_image->fill($image_data);
                    $product_image->save();
                    $j++;
                }
                for($m = 0; $m < count($this->product->images);){
                    if(file_exists(public_path().'/uploads/products/'.$this->product->images[$m]))
                    {
                        unlink(public_path().'/uploads/products/'.$this->product->images[$m]);
                        unlink(public_path().'/uploads/products/Thumb-'.$this->product->images[$m]);
                    }
                    $m++;
                }

            }
            if(!empty($request->price)){
                $set_to_delete = $this->set->where('product_id', $id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $set_to_delete);
                DB::table('sets')->whereIn('id', $ids_to_delete)->delete();
                for($i = 0; $i < count($request->price); $i++){
                    $product_price = new Set();
                    $price_data['product_id'] = $product_id;
                    $price_data['min_order'] = $request->min_order[$i];
                    $price_data['max_order'] = $request->max_order[$i];
                    $price_data['price'] = $request->price[$i];
                    $price_data['quantity'] = $request->quantity;
                    $price_data['wholesale_id'] = $request->wholesale_id;
                    $product_price->fill($price_data);
                    $data_size = $product_price->save();
                }
            }
            if(!empty($request->attr)){
                foreach($request->attr as $key => $val){
                    $attr_to_delete = $this->attribute_value->where('product_id', $id)->get()->toArray();
                    $ids_to_delete = array_map(function($item){ return $item['id']; }, $attr_to_delete);
                    DB::table('product_attribute_details')->whereIn('id', $ids_to_delete)->delete();
                    $attr_data = new ProductAttributeDetail();
                    $attr_detail['product_id'] = $product_id;
                    $attr_detail['product_attribute_id'] = $key;
                    if(is_numeric($val)){
                        $attr_detail['attribute_value_id'] = $val;
                    } else {
                        $attr_detail['attribute_value_id'] = null;
                        $attr_detail['attribute_value'] = $val;
                    }
                    $attr_data->fill($attr_detail);
                    $attr_size = $attr_data->save();
                }
            }
            $notification = array(
              'message' => 'Product updated successfully.',
              'alert-type' => 'success'
            );
        } else {
            $notification = array(
              'message' => 'Problem while updating product.',
              'alert-type' => 'error'
            );
        }
        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product = $this->product->find($id);
        if(!$this->product){
            $notification = array(
              'message' => 'Product Not found.',
              'alert-type' => 'error'
            );
            return redirect()->route('products.index')->with($notification);
        }

        $success = $this->product->delete();
        if($success){
            $notification = array(
              'message' => 'Product deleted successfully.',
              'alert-type' => 'success'
            );
        } else {
            $notification = array(
              'message' => 'Sorry! Product could not be deleted at this moment.',
              'alert-type' => 'success'
            );
        }
        return redirect()->route('products.index')->with($notification);
    }

    public function quickView($id){
      $data = $this->product->with('images')->with('colors')->where('id', $id)->first();
      if(empty($data)){
        return abort(404);
      }
      //return response()->json(['data'=> $data, 'starting_price'=> $starting_price]);
      return view('frontend.pages.quick', compact('data'));
    }

    public function getSimilar(Request $request){
        $similar = $this->product->where('category_id', $request->cat_id)->get();
        return response()->json($similar);
    }

    public function ajaxDestroy(Request $request)
    {
      $ids = $request->ids;
      $success = DB::table("products")->whereIn('id',explode(",",$ids))->delete();
      if($success){
          return response()->json('Products deleted successfully.');
      } else {
          return response()->json('Products could not be deleted at this moment.');
      }
    }

    public function getVendorProduct(Request $request){
        $product_list = $this->product->where('vendor_id', $request->id)->orderBy('created_at','desc')->get();
        return response()->json($product_list);
    }

    public function getSet($id){
        $set_detail = $this->set->where('product_id', $id)->first();
        return response()->json($set_detail);
    }

}
