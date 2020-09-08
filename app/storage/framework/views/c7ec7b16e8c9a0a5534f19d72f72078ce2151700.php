<?php if(!empty(Cart::content()) && Cart::count() > 0): ?>
<div class="col-lg-4 col-md-4 col-sm-12">
   <div class="card">
      <div class="card-body">
         <h3 class="card-title">Cart Totals</h3>
         <table class="cart__totals">
            <thead class="cart__totals-header">
               <tr>
               <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="row cart-detail"><a href="#">
                  <div class="col-lg-3 col-md-3 col-sm-12">
                     <img src="<?php echo e($row->options->image); ?>" style="width:50px" alt="">
                  </div>
                  </a><div class="col-lg-9 col-md-9 col-sm-12"><a href="#">
                     </a><a href="<?php echo e(route('single-product', $row->options->slug)); ?>"> <?php echo e($row->name); ?> ×<?php echo e($row->qty); ?></a>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tr>
            </thead>            
         </table>
      </div>
   </div>
</div>
<?php endif; ?><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/layouts/summary.blade.php ENDPATH**/ ?>