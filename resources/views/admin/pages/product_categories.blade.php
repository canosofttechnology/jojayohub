@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Categories</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Category</a></li>
                  <input type="hidden" id="base" value="{{ route('ajax.categories') }}">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                            <thead class="inner">
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody id="check">
                            @if(!empty($allCategories))
                                @foreach($allCategories as $key => $categoryList)
                                    <tr id="{{ $categoryList->id }}">
                                        <input type="hidden" value="{{ $categoryList->id }}">
                                        <td>{{ $categoryList->name }}</td>
                                        <td>{{ $categoryList->slug }}</td>
                                        <td>{{ $categoryList->Secondarycategory['name'] != '' ? $categoryList->Secondarycategory['name'] : '-' }}</td>
                                        <td><a href="{{ route('product_categories.edit', $categoryList->id) }}"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>  <button type="button" class="btn-xs btn btn-danger waves-effect waves-light table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><i class="fa fa-trash-o"></i></button> </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">
                  @if(!empty(@$data)) {{ Form::open(['url'=>route('product_categories.update', @$data->id), 'class'=>'form', 'id'=>'user_add', 'files'=>true,'method'=>'patch']) }}
                    <input name="_method" type="hidden" value="PATCH"> @else
                    <form action="{{ route('product_categories.store') }}" method="POST">
                        @endif @csrf
                        <div class="page-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{--{{ @$data !== null ? 'Update' : 'Add' }} user--}}</h5>
                                            <div class="card-header-right">
                                                <i class="icofont icofont-rounded-down"></i>
                                                <i class="icofont icofont-refresh"></i>
                                                <i class="icofont icofont-close-circled"></i>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="">Name</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{ @$data->name }}" name="name" id="name" placeholder="Enter title for the user">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="">Slug</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{ @$data->slug }}" name="slug" id="slug" placeholder="Category slug">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="">Secondary Category</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select name="secondary_category_id" id="role" class="form-control">
                                                        @if(!empty($secondary_categories))
                                                        <option selected disabled>--Select parent category--</option>
                                                        @foreach($secondary_categories as $category_list)
                                                        <option value="{{ $category_list->id }}" {{ $category_list->id == @$data->secondary_category_id ? 'selected' : '' }}>{{ $category_list->name }}</option>
                                                        @endforeach @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="">Has Warranty ?</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="radio" value="1" name="warranty" {{ @$data->warranty == 1 ? 'checked' : '' }}> Yes
                                                    <input type="radio" value="0" name="warranty" {{ @$data->warranty == 0 ? 'checked' : '' }}> No
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="">Available sizes</label>
                                                </div>
                                                <div class="col-sm-10">
                                                @php @$list = implode(',', @$size_list); @endphp
                                                    <input type="text" class="form-control" value="{{ @$list }}" name="size" id="size" placeholder="Enter sizes to be displayed under this category separated by comma (,)">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="">Wholesale Type</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select name="wholesale_id[]" class="form-control select_multi" multiple>                                                        
                                                        @php
                                                        if($wholesale_type){
                                                            foreach ($wholesale_type as $sales_type){
                                                                $checked = '';
                                                                if(!empty($selected_wholesale)){
                                                                    if (is_array($selected_wholesale) || is_object($selected_wholesale)) {
                                                                    foreach ($selected_wholesale as $key => $value) {
                                                                    if($sales_type->id == old('wholesale_id')){
                                                                    $checked = 'selected';
                                                                    break;
                                                                    }
                                                                    elseif($sales_type->id == $value['wholesale_id']){
                                                                    $checked = 'selected';
                                                                    break;
                                                                    }
                                                                }
                                                                }
                                                            }
                                                            @endphp
                                                            <option value="{{ $sales_type->id }}" {{ (collect(old('wholesale_id'))->contains($sales_type->id)) ? 'selected':'' }} {{ $checked}}>{{ $sales_type->name }}</option>
                                                            @php
                                                            }
                                                        }
                                                        @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <strong>Product Attributes</strong>
                                            <div class="form-group row">
                                                @if(!empty($all_attributes))
                                                @foreach($all_attributes as $prod_attr)
                                                @php
                                                $checked = '';
                                                if(!empty($selected_attributes)){
                                                foreach($selected_attributes as $key => $select_attr){
                                                if($select_attr->product_attribute_id == $prod_attr->id){
                                                    $checked = 'checked';
                                                }
                                                }
                                                }
                                                @endphp
                                                <div class="col-md-2 col-lg-2 col-sm-12">
                                                    <div class="checkbox c-checkbox">
                                                        <label class="needsclick">
                                                            <input name="product_attribute_id[]" value="{{ $prod_attr->id }}" {{ $checked }} type="checkbox">
                                                            <span class="fa fa-check"></span>{{ $prod_attr->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0 pull-right ml-2">{{ @$data !== null ? 'Update' : 'Add' }} Category</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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