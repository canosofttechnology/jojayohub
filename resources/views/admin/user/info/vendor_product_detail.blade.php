@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">

               <div class="tab-content bg-white">

                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">

                       <div class="row">
                          <div class="col-sm-12">
                             <div class="card">
                                <div class="card-block">
                                   <div class="row">
                                      <div class="col-12">
                                         <div class="form-group row">
                                            <label class="col-sm-2 control-label"><strong>Product Name<span class="text-danger">*</span></strong></label>
                                            <div class="col-md-9 col-lg-9">
                                               <input readonly type="text" required class="form-control" id="name" value="{{ @$data->name }}">
                                            </div>
                                         </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 control-label"><strong>Category<span class="text-danger">*</span></strong></label>
                                            <div class="col-md-9 col-lg-9">
                                               <select name="category_id" id="category_id" disabled class="requires form-control">
                                                  <option selected readonly>--Product Category--</option>
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
                                                                 <input readonly ="text" class="form-control" id="slug" required value="{{ @$data->slug }}">
                                                               </div>
                                                           </div>
                                                           <div class="form-group row">
                                                              <div class="col-md-4 col-lg-2">
                                                                 <label for="description-2" class="block">Video URL </label>
                                                              </div>
                                                              <div class="col-md-8 col-lg-10">
                                                                 <input type="url" readonly placeholder="video url" class="form-control" value="{{ @$data->video }}">
                                                              </div>
                                                           </div>
                                                           <div class="form-group row">
                                                              <label class="col-sm-2">Brand<span class="text-danger">*</strong></label>
                                                              <div class="col-md-8 col-lg-10">
                                                                 <select name="brand_id" id="brand_id" disabled class="requires form-control">
                                                                    <option selected readonly>--Product Brand--</option>
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
                                                                 <select name="vendor_id" disabled id="vendor_id" class="requires form-control">
                                                                    <option selected readonly>--Vendor Name--</option>
                                                                    @if(!empty($vendor_list) && (Auth::user()->roles == 'admin'))
                                                                    @foreach($vendor_list as $vendors_list)
                                                                    <option value="{{ $vendors_list->id }}" {{ @$data->vendor_id == $vendors_list->id ? 'selected' : '' }}>{{ $vendors_list->company }}</option>
                                                                    @endforeach
                                                                    @endif
                                                                 </select>
                                                                 @else
                                                                 <select disabled id="vendor_id" class="requires form-control">
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
                                                                 <input readonly type="text" class="form-control" id="sku" required value="{{ @$data->sku }}">
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
                                                                             <select disabled id="{{ $value->attributeDetail->id }}" class="form-control select_box" stye="width:100%">
                                                                                @php
                                                                                $att_data = App\Models\AttributeValue::where('product_attribute_id', $value->attributeDetail->id)->get();
                                                                                @endphp
                                                                                @foreach($att_data as $data_lists)
                                                                                   <option value="{{ $data_lists->id }}">{{ $data_lists->value }}</option>
                                                                                @endforeach
                                                                             </select>
                                                                          @else
                                                                             <input type="text" readonly value="{{ @$att_list->attribute_value }}" class="form-control">
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
                                                                 <select disabled class="select_2_to" id="similar_poducts" multiple="multiple">
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
                                               <textarea readonly readonly id="specification" rows="10" class="form-control editor">{{ @$data->specification }}</textarea>
                                            </div>
                                         </div>
                                         <div class="form-group row">
                                            <div class="col-md-4 col-lg-2">
                                               <label for="description-2" class="block">Product description *</label>
                                            </div>
                                            <div class="col-md-8 col-lg-10">
                                               <textarea readonly readonly id="description" rows="10" class="form-control editor">{{ @$data->description }}</textarea>
                                            </div>
                                         </div>
                                         <div id="warranty_data">
                                            <div class="form-group row">
                                               <div class="col-md-4 col-lg-2">
                                                  <label for="description-2" class="block">Warranty </label>
                                               </div>
                                               <div class="col-md-8 col-lg-10">
                                                  <input type="text" readonly readonly placeholder="Warranty period" class="form-control" value="{{ @$data->warranty }}">
                                               </div>
                                            </div>
                                         </div>
                                         <div class="form-group pt-10">
                                            <div class="col-md-2 col-lg-2"><label for="description-2" class="block">Images </label>
                                               <!-- <button type="button" class="btn btn-xs btn-primary" id="add_color"><span class="fa fa-plus"></span></button>
                                               <button type="button" class="btn btn-xs btn-danger" id="delete_color"><span class="fa fa-trash-o"></span></button> -->
                                            </div>
                                            <div class="col-md-2 col-lg-2">
                                               <select disabled id="" class="form-control">
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
                                                        <div class="drop-upload" aria-readonly="false">

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
                                               <select disabled class="form-control select_2_to" multiple="multiple">
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
                                               <select class="form-control select_2_to" disabled id="size_available" multiple="multiple">
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
                                                  <input type="text" readonly value="{{ @$avail_data[0]['quantity'] }}" class="form-control input-200" id="quantity">
                                                  <select class="form-control" disabled id="wholesale" name="wholesale_id">
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
                                            <div class="col-md-2 col-lg-2 mt-10"><input class="form-control" type="text" value="{{ @$avail_data[0]['min_order'] }}" readonly placeholder="Minimum order"></div>
                                            <div class="col-md-2 col-lg-2 mt-10"><input class="form-control h-100" value="{{ @$avail_data[0]['max_order'] }}" type="text" readonly placeholder="Maximum Order"></div>
                                            <div class="col-md-3 col-lg-3 mt-10"><input class="form-control h-100" value="{{ @$avail_data[0]['price'] }}" type="text" readonly placeholder="Price"></div>
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
                            <a href="{{route('users.index')}}">
                             <button type="submit" class="btn btn-primary" name="status" value="active">Back</button>
                            </a>
                             {{-- <button type="submit" class="btn btn-danger" name="status" value="inactive">Draft</button> --}}
                          </div>
                       </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
