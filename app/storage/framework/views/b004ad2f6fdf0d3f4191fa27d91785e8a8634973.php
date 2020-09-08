<div class="table-responsive">
    <table id="normal-table" class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
       <thead>
           <tr>
               <th>Retailer</th>
               <th>Product</th>
               <th>Sales Quantity</th>
               <th>Price</th>
               <th>Sold At</th>
               <th>Entry date</th>
           </tr>
       </thead>
       <tbody>
           <?php if($vendor_sales): ?>
               <?php $__currentLoopData = $vendor_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                       <td><?php echo e($saleList->reTailer->name); ?></td>
                       <td><?php echo e($saleList->productName->name); ?></td>
                       <td><?php echo e($saleList->quantity); ?></td>
                       <td><?php echo e($saleList->price); ?></td>
                       <td><?php echo e($saleList->date); ?></td>
                       <td><?php echo e($saleList->created_at); ?></td>
                   </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
       </tbody>
   </table>
    </div>
<?php /**PATH /home/jojayohub/public_html/resources/views/admin/user/info/vendor_sales.blade.php ENDPATH**/ ?>