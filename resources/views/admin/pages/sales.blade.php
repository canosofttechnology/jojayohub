@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Ads</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Ad</a></li>
                  <input type="hidden" id="base" value="{{ route('ajax.categories') }}">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="table-responsive">
                     <table id="normal-table" class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>Sold To</th>
                                <th>Product</th>
                                <th>Sales Quantity</th>
                                <th>Price</th>
                                <th>Invoice No</th>
                                <th>Sold At</th>
                                <th>Entry date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($sales_list)
                                @foreach($sales_list as $saleList)
                                    <tr>
                                        <td>{{ $saleList->vendor->company }}</td>
                                        <td>{{ @$saleList->reTailer->name }}</td>
                                        <td>{{ @$saleList->productName->name }}</td>
                                        <td>{{ $saleList->quantity }}</td>
                                        <td>{{ $saleList->price }}</td>
                                        <td>{{ $saleList->invoice }}</td>
                                        <td>{{ $saleList->date }}</td>
                                        <td>{{ $saleList->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                     </div>
                  </div>
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">
                  @if(!empty($data))
                    {{ Form::open(['url'=>route('sales.update', $data->id), 'class'=>'form', 'id'=>'sales_add', 'files'=>true,'method'=>'patch']) }}
                @else
                <form action="{{ route('sales.store') }}" method="POST">
                    @endif
                    @csrf
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="name" class="block">Vendor Name *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <select class="product form-control select_box select2-hidden-accessible" name="vendor_id" id="vendor_id">
                                            @if(!empty($vendor_list))
                                                <option>--Select product--</option>
                                                @foreach($vendor_list as $lists)
                                                    <option value="{{ $lists['id'] }}">{{ $lists['company'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="name" class="block">Product Name *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <select class="product form-control select_box select2-hidden-accessible" name="product_id" id="product_id">
                                            <option>--Select Product--</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="product-unavailable">
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Price per piece</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="text" class="form-control" id="selling_price" readonly value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Sales quantity</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="text" class="form-control" id="sales_quantity" name="quantity" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Price</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="text" class="form-control" id="price" readonly value="">
                                            <div id="my_price"></div>
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Type</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <select name="retailer_id" id="retailer_id" class="form-control">
                                                <option>--Select Retailer--</option>
                                                @if(!empty($retailer_list))
                                                    @foreach($retailer_list as $retailers)
                                                    <option value="{{ $retailers->id }}">{{ $retailers->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Transaction date</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="datetime-local" class="form-control" name="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Sold at</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="number" class="form-control" name="sold_price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Remarks</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <textarea class="form-control" name="remarks"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="brand-2" class="block"></label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                    <button type="submit" class="btn btn-primary" name="status" value="active">Make sale</button>
                                    </div>
                                </div>
                                </div>
                                <div id="reload">
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="brand-2" class="block"></label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                        <button type="refresh" class="btn btn-primary" name="status" value="active">Reload</button>
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
@section('scripts')
<script>
    $('.discount-row').fadeOut();
    $('#reload').fadeOut();
    $(document).ready(function() {
        $('.product').select2();
    });
    $('#vendor_id').on('change', function(){
        var vendor_id = $('#vendor_id').val();
        $.ajax({
            method: "POST",
            url: "/auth/get_vendor_post",
            data: {_token: "{{ csrf_token() }}", _method:"POST", id: vendor_id},
            success: function(response){
                $.each(response, function(key, value) {
                    $('#product_id').append('<option value="'+response[key]['id']+'">'+response[key]['name']+'</option>');
                });
            }
        });
    });
    $('#product_id').on('change', function(){
        var product_id = $('#product_id').val();
        $.ajax({
        method: "GET",
        url: "/auth/get_product_price/"+product_id,
        data: {_token: "{{ csrf_token() }}", _method:"GET"},
        success: function(response){
            $('#selling_price').val(response.price);
            
        }
        });
    });
    $('#sales_quantity').on('change', function(){
        var selling_price = $('#selling_price').val();
        var qty = $('#sales_quantity').val();
        var total_price = $('#price').val(qty*selling_price);
        $('#my_price').html('<input type="hidden" name="price" value="'+qty*selling_price+'">');
    });
</script>
@endsection