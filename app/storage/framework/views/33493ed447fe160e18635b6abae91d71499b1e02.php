
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="<?php if($active_tab == 'manage'): ?> active <?php endif; ?>"><a href="#manage" data-toggle="tab">All Ads</a></li>
                  <li class="<?php if($active_tab == 'create'): ?> active <?php endif; ?>"><a href="#create" data-toggle="tab">New Ad</a></li>
                  <input type="hidden" id="base" value="<?php echo e(route('ajax.categories')); ?>">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane <?php if($active_tab == 'manage'): ?> active <?php endif; ?>" id="manage">
                     <div class="table-responsive">
                     <table id="normal-table" class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Vendor</th>
                                <th>Sold To</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sold At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($sales_list): ?>
                                <?php $__currentLoopData = $sales_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($saleList->invoice); ?></td>
                                        <td><?php echo e($saleList->vendor->company); ?></td>
                                        <td><?php echo e(@$saleList->reTailer->name); ?></td>
                                        <td><?php echo e(@$saleList->productName->name); ?></td>
                                        <td><?php echo e($saleList->quantity); ?></td>
                                        <td><?php echo e(number_format($saleList->sold_price)); ?></td>
                                        <td><?php echo e($saleList->date); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                     </div>
                  </div>
                  <div class="tab-pane <?php if($active_tab == 'create'): ?> active <?php endif; ?>" id="create">
                  <?php if(!empty($data)): ?>
                    <?php echo e(Form::open(['url'=>route('sales.update', $data->id), 'class'=>'form', 'id'=>'sales_add', 'files'=>true,'method'=>'patch'])); ?>

                <?php else: ?>
                <form action="<?php echo e(route('sales.store')); ?>" method="POST">
                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="name" class="block">Vendor Name *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <select class="product form-control select_box select2-hidden-accessible" name="vendor_id" id="vendor_id">
                                            <?php if(!empty($vendor_list)): ?>
                                                <option>--Select product--</option>
                                                <?php $__currentLoopData = $vendor_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($lists['id']); ?>"><?php echo e($lists['company']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="name" class="block">Product SKU *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input type="text" class="form-control" name="sku" id="sku_value" readonly value="" placeholder="SUK of the product">
                                    </div>
                                </div>
                                <div id="product-unavailable">
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Price per qty (Vendor)</label>
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
                                            <input type="text" class="form-control" id="price" readonly value="" placeholder="Price set by vendor">
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
                                                <?php if(!empty($retailer_list)): ?>
                                                    <?php $__currentLoopData = $retailer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $retailers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($retailers->id); ?>"><?php echo e($retailers->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
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
                                            <label for="slug" class="block">Price per quantity (Jojayo)</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="number" class="form-control" name="price_per_qty" id="price_per_qty" placeholder="Price per piece charged by Jojayohub to retailer">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Sold at</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <input type="number" class="form-control" name="sold_price" id="sold_price" placeholder="Total price charged by Jojayohub">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 col-lg-2">
                                            <label for="slug" class="block">Remarks</label>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <textarea class="form-control" name="remarks" placeholder="Add a note for remembrance"></textarea>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
            data: {_token: "<?php echo e(csrf_token()); ?>", _method:"POST", id: vendor_id},
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
        data: {_token: "<?php echo e(csrf_token()); ?>", _method:"GET"},
        success: function(response){
            $('#selling_price').val(response.price);
            $.ajax({
                method: "GET",
                url: "/get_suk/"+product_id,
                
                success: function(response){
                    $('#sku_value').val(response);
                }
            });
        }
        });
    });
    $('#sales_quantity').on('change', function(){
        var selling_price = $('#selling_price').val();
        var qty = $('#sales_quantity').val();
        var total_price = $('#price').val(qty*selling_price);
        $('#my_price').html('<input type="hidden" name="price" value="'+qty*selling_price+'">');
    });
    $("#price_per_qty").keyup(function (){
        var qty = $('#sales_quantity').val();
        let jojayo_price = $('#price_per_qty').val();
        var total_price = $('#sold_price').val(qty*jojayo_price);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/sales.blade.php ENDPATH**/ ?>