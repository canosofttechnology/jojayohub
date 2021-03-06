@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Product</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Product</a></li>
                  <input type="hidden" id="base" value="{{ route('ajax.products') }}">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                           <thead>
                              <tr>
                                 <th><input type="checkbox" id="all"></th>
                                 <th>Title</th>
                                 <th>Category</th>
                                 <th>Brand</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @if(!empty($allProducts)) 
                              @foreach($allProducts as $productLists)
                              @can('view', $productLists)
                              <tr>
                                 <td><input type="checkbox" name="delete_items" value="{{ $productLists->id }}"></td>
                                 <td style="max-width:550px">{{ $productLists->name }}</td>
                                 <td style="max-width:100px">{{ @$productLists->category->name }}</td>
                                 <td>{{ @$productLists->brand->name }}</td>
                                 @php 
                                 if($productLists->status == 'active'){
                                 $class = "success-tag";
                                 } else {
                                 $class = "danger-tag";
                                 }
                                 @endphp
                                 <td><span class="{{ $class }}">{{ $productLists->status }}</span></td>                              
                                 <td>
                                    <a href="{{ route('products.edit', $productLists->id) }}" class="btn btn-primary btn-xs pull-left" style="margin-right: 5px">
                                    <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a class="pull-left" onclick="return confirm('Are you sure you want to delete this product?')">
                                       <form method="POST" action="{{ route('products.destroy', $productLists->id) }}" accept-charset="UTF-8">
                                          <input name="_method" type="hidden" value="DELETE">
                                          <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                          <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                       </form>
                                    </a>
                                 </td>                                
                              </tr>
                              @endcan
                              @endforeach @endif
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">
                     @if(empty($data))
                     <form action="{{ route('products.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @else
                        {{ Form::open(['url'=>route('products.update', $data->id), 'class'=>'form-horizontal', 'id'=>'product_update', 'files'=>true,'method'=>'patch']) }}
                        @endif
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-block">
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="form-group row">
                                             <label class="col-sm-2 control-label"><strong>Product Name<span class="text-danger">*</span></strong></label>
                                             <div class="col-md-9 col-lg-9">
                                                <input name="name" type="text" required class="form-control" id="name" value="{{ @$data->name }}">
                                                @if($errors->has('name'))
                                                <span class='validation-errors text-danger'>{{ $errors->first('name') }}</span>
                                                @endif
                                             </div>
                                          </div>
                                          
                                          <div class="form-group row">
                                             <label class="col-sm-2 control-label"><strong>Category<span class="text-danger">*</span></strong></label>
                                             <div class="col-md-9 col-lg-9">
                                                <select name="category_id" id="category_id" class="requires form-control">
                                                   <option selected disabled>--Product Category--</option>
                                                   @if((Auth::user()->roles == 'admin') && !empty($category))
                                                   @foreach($category as $category_list)
                                                   <option value="{{ $category_list->id }}" {{ @$data->category_id == $category_list->id ? 'selected' : '' }}>{{ $category_list->name }}</option>
                                                   @endforeach
                                                   @else
                                                   @if(!empty($current_vendor->categoryAssigned))
                                                   @foreach($current_vendor->categoryAssigned as $category_list)
                                                   <option value="{{ $category_list->category_id }}" {{ @$data->category_id == $category_list->category_id ? 'selected' : '' }}>{{ $category_list->CategoryDetail->name }}</option>
                                                   @endforeach
                                                   @endif
                                                   @endif
                                                </select>
                                                @if($errors->has('category_id'))
                                                <span class='validation-errors text-danger'>At least one category should be selected to add a product.</span>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="row form-group">
                                             <label class="col-sm-2 control-label"><strong>Product Attributes<span class="text-danger">*</span></strong></label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-container">
                                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                                      <div class="list-group">
                                                         <a href="#" class="list-group-item active text-center">
                                                            General
                                                         </a>
                                                         <a href="#" class="list-group-item text-center">
                                                            Inventory
                                                         </a>
                                                         <a href="#" class="list-group-item text-center">
                                                            Shipping
                                                         </a>
                                                         <a href="#" class="list-group-item text-center">
                                                            Attributes
                                                         </a>
                                                         <a href="#" class="list-group-item text-center">
                                                            Similar products
                                                         </a>
                                                      </div>
                                                      </div>
                                                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                                         <!-- flight section -->
                                                         <div class="bhoechie-tab-content active">
                                                            <center><p></p>
                                                            <div class="form-group row">
                                                               <label class="col-sm-2">Slug <span class="text-danger">*</span></label>
                                                               <div class="col-md-8 col-lg-10">
                                                                  <input name="slug" type="text" class="form-control" id="slug" required value="{{ @$data->slug }}">
                                                                  @if($errors->has('slug'))
                                                                  <span class='validation-errors text-danger'>{{ $errors->first('slug') }}</span>
                                                                  @endif
                                                               </div>
                                                            </div>
                                                            <div class="form-group row">
                                                               <div class="col-md-4 col-lg-2">
                                                                  <label for="description-2" class="block">Video URL </label>
                                                               </div>
                                                               <div class="col-md-8 col-lg-10">
                                                                  <input type="url" name="video" placeholder="video url" class="form-control" value="{{ @$data->video }}">
                                                               </div>
                                                            </div>
                                                            <div class="form-group row">
                                                               <label class="col-sm-2">Brand<span class="text-danger">*</strong></label>
                                                               <div class="col-md-8 col-lg-10">
                                                                  <select name="brand_id" id="brand_id" class="requires form-control">
                                                                     <option selected disabled>--Product Brand--</option>
                                                                     @if(!empty($brands))
                                                                     @foreach($brands as $brand_list)
                                                                     <option value="{{ $brand_list->id }}" {{ @$data->brand_id == $brand_list->id ? 'selected' : '' }}>{{ $brand_list->name }}</option>
                                                                     @endforeach
                                                                     @endif
                                                                  </select>
                                                               </div>
                                                            </div>
                                                            <div class="form-group row">
                                                               <label class="col-sm-2">Vendor<span class="text-danger">*</span></label>
                                                               <div class="col-md-8 col-lg-10">
                                                                  @if(!empty($vendor_list) && (Auth::user()->roles == 'admin'))
                                                                  <select name="vendor_id" id="vendor_id" class="requires form-control">
                                                                     <option selected disabled>--Vendor Name--</option>
                                                                     @if(!empty($vendor_list) && (Auth::user()->roles == 'admin'))
                                                                     @foreach($vendor_list as $vendors_list)
                                                                     <option value="{{ $vendors_list->id }}" {{ @$data->vendor_id == $vendors_list->id ? 'selected' : '' }}>{{ $vendors_list->company }}</option>
                                                                     @endforeach                                                                                                  
                                                                     @endif
                                                                  </select>
                                                                  @else
                                                                  <select name="vendor_id" id="vendor_id" class="requires form-control">
                                                                     <option value="{{ $current_vendor->id }}" {{ (Auth::user()->id) == $current_vendor->user_id ? 'selected' : '' }}>{{ $current_vendor->company }}</option>                                          
                                                                  </select>
                                                                  @endif
                                                               </div>
                                                            </div>
                                                            </center>
                                                         </div>
                                                         <!-- train section -->
                                                         <div class="bhoechie-tab-content">
                                                            <center><p></p>
                                                            <div class="form-group row">
                                                               <label class="col-sm-2"><strong>SKU<span class="text-danger">*</span></strong></label>
                                                               <div class="col-md-8 col-lg-10">
                                                                  <input name="sku" type="text" class="form-control" id="sku" required value="{{ @$data->sku }}">
                                                                  @if($errors->has('sku'))
                                                                  <span class='validation-errors text-danger'>{{ $errors->first('sku') }}</span>
                                                                  @endif
                                                               </div>
                                                            </div>
                                                            </center>
                                                         </div>
                                             
                                                         <!-- hotel search -->
                                                         <div class="bhoechie-tab-content">
                                                            <center><p></p>
                                                            <!-- <div class="form-group row">
                                                               <label class="col-sm-2"><strong>SKU<span class="text-danger">*</span></strong></label>
                                                               <div class="col-md-8 col-lg-10">
                                                                  <input name="sku" type="text" class="form-control" id="sku" required value="{{ @$data->sku }}">
                                                                  @if($errors->has('sku'))
                                                                  <span class='validation-errors text-danger'>{{ $errors->first('sku') }}</span>
                                                                  @endif
                                                               </div>
                                                            </div> -->
                                                            </center>
                                                         </div>
                                                         <div class="bhoechie-tab-content">
                                                            <center><p></p>                                                               
                                                               <div id="attribute">
                                                                  @if(!empty($product_attr))
                                                                     @foreach($product_attr as $att_list)
                                                                     @foreach($att_list->attributes as $value)
                                                                     <div class="form-group row">
                                                                        <label class="col-sm-2">{{$value->attributeDetail->name}}
                                                                           <span class="text-danger">*</span></label>
                                                                        <div class="col-md-8 col-lg-10">
                                                                           @if($value->attributeDetail->field == 'select')
                                                                              <select name="{{ $value->attributeDetail->slug }}" id="{{ $value->attributeDetail->id }}" class="form-control select_box" stye="width:100%">
                                                                                 @php
                                                                                 $att_data = App\Models\AttributeValue::where('product_attribute_id', $value->attributeDetail->id)->get();
                                                                                 @endphp
                                                                                 @foreach($att_data as $data_lists)
                                                                                    <option value="{{ $data_lists->id }}">{{ $data_lists->value }}</option>
                                                                                 @endforeach
                                                                              </select>
                                                                           @else
                                                                              <input type="text" name="{{ $value->attributeDetail->slug }}" value="{{ @$att_list->attribute_value }}" class="form-control">
                                                                           @endif
                                                                        </div>
                                                                     </div>
                                                                     @endforeach
                                                                     @endforeach
                                                                  @endif
                                                               </div>
                                                            </center>
                                                         </div>
                                                         <div class="bhoechie-tab-content">
                                                            <center><p></p>
                                                            <div class="form-group row">
                                                               <label class="col-sm-2"><strong>Similar Products<span class="text-danger">*</span></strong></label>
                                                               <div class="col-md-8 col-lg-10">
                                                                  <select name="similar_poducts[]" class="select_2_to" id="similar_poducts" multiple="multiple">
                                                                  </select>
                                                               </div>
                                                            </div>
                                                            </center>
                                                         </div>
                                                      </div>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-block">
                                    <div class="row">
                                       <div class="col-12">
                                       <div class="form-group row">
                                             <label class="col-sm-2 control-label"><strong>Product specification<span class="text-danger">*</span></strong></label>
                                             <div class="col-md-9 col-lg-9">
                                                <textarea name="specification" id="specification" rows="10" class="form-control editor">{{ @$data->specification }}</textarea>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <div class="col-md-4 col-lg-2">
                                                <label for="description-2" class="block">Product description *</label>
                                             </div>
                                             <div class="col-md-8 col-lg-10">
                                                <textarea name="description" id="description" rows="10" class="form-control editor">{{ @$data->description }}</textarea>
                                             </div>
                                          </div>                                          
                                          <div id="warranty_data">
                                             <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                   <label for="description-2" class="block">Warranty </label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                   <input type="text" name="warranty" placeholder="Warranty period" class="form-control" value="{{ @$data->warranty }}">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group pt-10">
                                             <div class="col-md-2 col-lg-2"><label for="description-2" class="block">Images </label>
                                                <!-- <button type="button" class="btn btn-xs btn-primary" id="add_color"><span class="fa fa-plus"></span></button>
                                                <button type="button" class="btn btn-xs btn-danger" id="delete_color"><span class="fa fa-trash-o"></span></button> -->
                                             </div>
                                             <div class="col-md-2 col-lg-2">
                                                <select name="" id="" class="form-control">
                                                   <option value="">Red</option>
                                                   <option value="">Green</option>
                                                </select>
                                             </div>
                                             <div class="col-md-8 col-lg-8">
                                                <div class="append">
                                                   <div class="dropzone">
                                                      <div class="upload-tip"><span class="upload-tip-item" style="display: block; margin: 0px 10px 10px 0px;"><span>                                                  
                                                      </span>
                                                      </div>                                                   
                                                      <div>
                                                         <div class="drop-upload" aria-disabled="false">
                                                            <div class="input-group">
                                                               <span class="input-group-btn">
                                                               <a id="lfm" data-input="thumbnail" data-preview="holder" style="border: 1px dashed rgb(196, 198, 207); border-radius: 2px; width: 140px; height: 45px; background-color: rgb(255, 255, 255); text-align: center; cursor: pointer; transition: border-color 0.3s ease 0s; display: inline-block; vertical-align: top;">
                                                               <img src="//laz-g-cdn.alicdn.com/lazada/lib/0.0.81/image/publish/IC_MediaCenter.png" style="position: relative;"> 
                                                               <span class="upload-text" data-spm-anchor-id="0.0.p-30129.i2.81e84edfnX8IMm" style="font-size: 14px; position: relative; top: 10px; color: rgb(102, 102, 102); width: 96px; display: inline-block; text-align: left; margin-left: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Media Center</span>
                                                               </a>
                                                               </span>
                                                               <input id="thumbnail" class="form-control hidden" type="text" name="image">                                                            
                                                            </div>
                                                            
                                                            <div class="medi">
                                                               <div class="file-upload">
                                                                  <input type="file" id="files" name="images[]" multiple>
                                                                  <img src="//laz-g-cdn.alicdn.com/lazada/lib/0.0.81/image/publish/IC_upload.png" style="position: relative;top: 11px;height: 16px;width: 16px;margin-left: 8px;">
                                                                  <span class="upload-text">Upload</span>
                                                               </div>
                                                            </div>
                                                            <div>
                                                            <span id="holder" style="margin-top:15px;max-height:100px;margin-left:10px;display:flex">
                                                               @if(!empty($image_data))
                                                                  @foreach($image_data as $imgs)
                                                                  <img src="{{ asset('/uploads/products/Thumb-') }}{{ $imgs['image'] }}" style="height: 5rem;">
                                                                  @endforeach
                                                               @endif
                                                            </span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </diV>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-block">
                                    <div class="row">
                                       <strong>Set Inventory</strong>                                       
                                    </div>
                                    <div class="row">
                                       <div class="col-12">                                          
                                          <div id="append">
                                          <div class="form-group row div">
                                             <div class="col-md-2 col-lg-2"></div>
                                             <div class="col-md-5 col-lg-5">
                                                <select name="color[]" class="form-control select_2_to" multiple="multiple">                                                   
                                                   @php
                                                   if($color_list){
                                                      foreach ($color_list as $colorList){
                                                            $checked = '';
                                                            if(!empty($colors_available)){
                                                               if (is_array($colors_available) || is_object($colors_available)) {
                                                               foreach ($colors_available as $key => $value) {
                                                               if($colorList->id == old('color_id')){
                                                               $checked = 'selected';
                                                               break;
                                                               }
                                                               elseif($colorList->id == $value['color_id']){
                                                               $checked = 'selected';
                                                               break;
                                                               }
                                                            }
                                                         }
                                                      }
                                                      @endphp
                                                      <option value="{{ $colorList->id }}" {{ (collect(old('color_id'))->contains($colorList->id)) ? 'selected':'' }} {{ $checked}}>{{ $colorList->name }}</option>
                                                      @php
                                                      }
                                                   }
                                                   @endphp
                                                </select>
                                             </div>
                                             <div class="col-md-5 col-lg-5">
                                                <select class="form-control select_2_to" name="size[]" id="size_available" multiple="multiple">
                                                   @php
                                                   if(!empty($product_sizes)){
                                                      foreach ($product_sizes as $sizeList){
                                                            $checked = '';
                                                            if(!empty($sizes_available)){
                                                               if (is_array($sizes_available) || is_object($sizes_available)) {
                                                               foreach ($sizes_available as $key => $value) {
                                                               if($sizeList->id == old('size_id')){
                                                               $checked = 'selected';
                                                               break;
                                                               }
                                                               elseif($sizeList->id == $value['size_id']){
                                                               $checked = 'selected';
                                                               break;
                                                               }
                                                            }
                                                         }
                                                      }
                                                      @endphp
                                                      <option value="{{ $sizeList->id }}" {{ (collect(old('size_id'))->contains($sizeList->id)) ? 'selected':'' }} {{ $checked}}>{{ $sizeList->name }}</option>
                                                      @php
                                                      }
                                                   }
                                                   @endphp
                                                </select>
                                             </div>
                                             <div class="col-md-2 col-lg-2"></div>
                                             <div class="col-md-3 col-lg-3 mt-10">
                                                <span class="box"> 
                                                   <input type="text" name="quantity" value="{{ @$avail_data[0]['quantity'] }}" class="form-control input-200" id="quantity"> 
                                                   <select class="form-control" id="wholesale" name="wholesale_id">
                                                      @if(!empty($wholesale_types))
                                                         @foreach($wholesale_types as $types)
                                                         @php
                                                         $sale_data = App\Models\Wholesale::where('id', $types->wholesale_id)->first();
                                                         @endphp
                                                         <option value="{{ $sale_data->id }}">{{ $sale_data->name }}</option>
                                                         @endforeach
                                                      @endif
                                                   </select> 
                                                </span>
                                             </div>
                                             <div class="col-md-2 col-lg-2 mt-10"><input class="form-control" type="text" value="{{ @$avail_data[0]['min_order'] }}" name="min_order[]" placeholder="Minimum order"></div>
                                             <div class="col-md-2 col-lg-2 mt-10"><input class="form-control h-100" value="{{ @$avail_data[0]['max_order'] }}" type="text" name="max_order[]" placeholder="Maximum Order"></div>
                                             <div class="col-md-3 col-lg-3 mt-10"><input class="form-control h-100" value="{{ @$avail_data[0]['price'] }}" type="text" name="price[]" placeholder="Price"></div>
                                          </div>
                                          </div>
                                          <!-- <div class="form-group text-center">
                                             <button type="button" class="btn btn-xs btn-primary" id="addnew"><span class="fa fa-plus"></span></button>
                                             <button type="button" class="btn btn-xs btn-danger" id="delete"><span class="fa fa-trash-o"></span></button>
                                          </div> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row text-right">
                           <div class="col-12">
                              <button type="submit" class="btn btn-primary" name="status" value="active">{{ !empty($data) ? 'Update' : 'Add' }} Product</button>
                              <button type="submit" class="btn btn-danger" name="status" value="inactive">Draft</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
<script>
   let edit = "{{ @$edit }}";
   let product_id = "{{ @$data->id }}";
   $('#warranty_data').hide();
   
   if(edit == 'yes'){
       $(document).ready(function(){
       mycat = $('#category_id :selected').val();
       checkWarranty();
   });
   }
   
   function checkWarranty(){
       $.ajax({
           method: "POST",
           url:"{{ route('warranty_check') }}",
           dataType: 'json',
           data: { _token:"{{ csrf_token() }}", _method:"POST", mycat: mycat},
           success: function(response) {
               if(response == "Yes"){
                   $('#warranty_data').show(1000);
               } else {
                   $('#warranty_data').hide(1000);
               }
           },
       });
   }
   
   function getSimilar(){
      let cat_id = $('#category_id :selected').val();
      $.ajax({
         method: "POST",
         url:"{{ route('getSimilar') }}",
         dataType: 'json',
         data: { _token:"{{ csrf_token() }}", _method:"POST", cat_id: cat_id},
         success: function(response) {
            $.each(response, function(key, value) {
                  $('#similar_poducts').append('<option value="'+response[key]['id']+'">'+response[key]['name']+'</option>');
            });
         },
      });
   }

   function MarketSizes(){
      let cat_id = $('#category_id :selected').val();
      $.ajax({
         method: "POST",
         url:"{{ route('getsize') }}",
         dataType: 'json',
         data: { _token:"{{ csrf_token() }}", _method:"POST", cat_id: cat_id},
         success: function(response) {
            $.each(response, function(key, value) {
                  $('#size_available').append('<option value="'+response[key]['id']+'">'+response[key]['name']+'</option>');
            });
         },
      });
   }

   $('#category_id').on('change', function(){
      MarketSizes();
      Wholesale('wholesale');
      getSimilar();
      if(edit == 'yes'){
            let r = confirm("Changing category will remove information about product images, sizes, color. This action cannot be undone.");
            if (r == true) {
            $('#append .div').remove();
            $('#colors .image').remove();
      
            $.ajax({
                  method: "DELETE",
                  url:"{{ route('delete_product_images') }}",
                  dataType: 'json',
                  data: { _token:"{{ csrf_token() }}", _method:"DELETE", id: product_id},
            });
      
            $.ajax({
                  method: "DELETE",
                  url:"{{ route('delete_product_sizes') }}",
                  dataType: 'json',
                  data: { _token:"{{ csrf_token() }}", _method:"DELETE", id: product_id},
            });
      
            } else {
            alert('Cancelled!');
            $(this).val(mycat);
            return;
            }
      }
       mycat = this.value;
       checkWarranty();
   });
   
   

   function Wholesale(id){
   let cat_id = $('#category_id :selected').val();
       $.ajax({
           method: "POST",
           url:"{{ route('getWholesale') }}",
           dataType: 'json',
           data: { _token:"{{ csrf_token() }}", _method:"POST", cat_id: cat_id},
           success: function(response) {
               $.each(response, function(key, value) {
                  $.ajax({
                     method: "POST",
                     url:"{{ route('getWholeSaleDetail') }}",
                     dataType: 'json',
                     data: { _token:"{{ csrf_token() }}", _method:"POST", wholesale_id: value.wholesale_id},
                     success: function(response) { console.log(response)
                        $('#'+id).append('<option value="'+response['id']+'">'+response['name']+'</option>');
                     },
                  });
               });
           },
       });
   }
   
   
</script>
<script>
   let num = {{ !empty($count) ? $count : 0 }};
   // $('#addnew').on('click', function(){
   //     num = num+1;
   //     prev = num-1;
   //     let html = '';
   //     html = '<div class="form-group row div"><div class="col-md-2 col-lg-2"></div><div class="col-md-5 col-lg-5"><select name="color[]" id="colorsData'+num+'" class="form-control" multiple="multiple"></select></div><div class="col-md-5 col-lg-5"><select class="form-control" name="size[]" id="sizesData'+num+'" multiple="multiple"></select></div><div class="col-md-2 col-lg-2"></div><div class="col-md-3 col-lg-3 mt-10"><span class="box"> <input type="text" name="quantity" class="form-control input-200" id="quantity"> <select class="form-control" id="wholesale'+num+'" name="wholesale_id"></select> </span></div><div class="col-md-2 col-lg-2 mt-10"><input class="form-control" value="" type="text" name="min_order[]" placeholder="Minimum order"></div><div class="col-md-2 col-lg-2 mt-10"><input class="form-control h-100" value="" type="text" name="max_order[]" placeholder="Maximum Order"></div><div class="col-md-3 col-lg-3 mt-10"><input class="form-control h-100" value="" type="text" name="price[]" placeholder="Price"></div></div>';       
   //     $('#append').append(html);
   //     callFancyBox();
   //     MarketColors('colorsData'+num);
   //     Wholesale('wholesale'+num);
   //     MarketSizes('sizesData'+num);
   //     initSelect('colorsData'+num+'');
   //     initSelect('sizesData'+num+'');
   // });
   
   $('#delete').on('click', function(){
       $('#append .div').last().remove();
   });
   
   $('#add_color').on('click', function(){
       let html = '';
       num = num+1;
       html = '<div class="col-md-2 col-lg-2"><select name="" id="" class="form-control"><option value="">Red</option><option value="">Green</option></select></div>';
       $('.append').append(html);
      callFancyBox();
       MarketColors('colorsData'+num);
   });
   
   $('#delete_color').on('click', function(){
       $('.append .image').last().remove();
   });

   $('#category_id').on('change', function(){
      let cat_val = $(this).val();
      $.ajax({
           method: "GET",
           url:"/auth/get_attribute/"+cat_val,
           dataType: 'json',
         //   data: { _token:"{{ csrf_token() }}", _method:"POST", cat_id: cat_id},
           success: function(response) {
            $('#attribute').html('');
               $.each(response, function(key, value) {                  
                  $.ajax({
                     method: "GET",
                     url:"/auth/get_attribute_data/"+value.product_attribute_id,
                     dataType: 'json',                     
                     success: function(response) {
                        let select = '';                        
                           $.each(response, function(key, value) {
                              if(value.field == 'select'){
                                 select = $('#attribute').append('<div class="form-group row"><label class="col-sm-2">'+value.name+'<span class="text-danger">*</span></label><div class="col-md-8 col-lg-10"><select name="attr['+value.id+']" id="'+value.id+'" class="form-control select_box" stye="width:100%"></select></div></div>');                                 
                                 initSelect(value.id);
                                 $("#"+value.id).select2({
                                    placeholder: "Select "+value.name,
                                 });
                                 $.ajax({
                                    method: "GET",
                                    url:"/auth/get_attribute_value/"+value.id,
                                    dataType: 'json',                     
                                    success: function(response) {
                                       $.each(response, function(key, value) { 
                                          if(key == 0){
                                             $('#'+value.product_attribute_id).append("<option><option>");
                                          }                                                                                 
                                          option = $('#'+value.product_attribute_id).append("<option value="+value.id+">"+value.value+"</option>");
                                       });
                                    },
                                 });
                              } else {
                                 select = $('#attribute').append('<div class="form-group row"><label class="col-sm-2">'+value.name+'<span class="text-danger">*</span></label><div class="col-md-8 col-lg-10"><input name="attr['+value.id+']" placeholder="input" class="form-control"></div></div>');
                              }                                                                                      
                           });
                     },
                  });
               });
           },
       });
   });

</script>
@endsection