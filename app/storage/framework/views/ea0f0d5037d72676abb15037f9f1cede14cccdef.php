
<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row ps-form__billing-info">     
        <?php echo $__env->make('frontend.layouts.summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-8 order-lg-first">
            <?php if(empty(Auth::user()) || Auth::user() == null || Auth::user()->roles !== 'customers'): ?>
            <div class="checkout-payment">
                <div class="shipping-address">
                <form action="<?php echo e(route('new_order.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                  <div class="ps-form__billing-info">
                      <div class='row'>
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4 class="ps-form__heading">Contact Information </h4>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <p class="pull-right">Already have an account? <a href="">Login </a></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Phone Number<sup>*</sup>
                          </label>
                          <div class="form-group__content">
                              <input class="form-control" type="text" name="phone">
                          </div>
                      </div>
                      <h5 class="ps-form__heading">Shipping Information </h5>
                      <div class="form-group row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label>First Name<sup>*</sup></label>
                            <div class="form-group__content">
                                <input class="form-control" type="text" name="first_name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label>Last Name<sup>*</sup></label>
                            <div class="form-group__content">
                                <input class="form-control" type="text" name="last_name">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Email Address<sup>*</sup>
                          </label>
                          <div class="form-group__content">
                              <input class="form-control" type="email" name="email">
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Company Name<sup>*</sup>
                          </label>
                          <div class="form-group__content">
                              <input class="form-control" type="text" name="company_name">
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Address<sup>*</sup></label>
                        <div class="form-group__content">
                            <input class="form-control" type="text" name="address">
                        </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>                          
                      </div>                                       
                  </div>
                </form>
                </div>
            </div>
            <?php else: ?>
            <div class="checkout-payment">
                <div class="shipping-address">
                    <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="ps-form__billing-info">
                            <div class='row'>
                                <button class="btn btn-primary m-auto mt-5">Confirm Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>            
        </div>
    </div>
</div>
<div class="mb-6"></div>
</main><!-- End .main -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
let logged_name = "<?php echo e(@Auth::user()->name); ?>";
let logged_contact = "<?php echo e(@Auth::user()->contact); ?>";
let user_id = "<?php echo e(@Auth::user()->id); ?>";
let url = "<?php echo e(route('user.address', ':data')); ?>";
url = url.replace(':data', user_id);
let html = '';
$.ajax({
  method: "GET",
  url: url,
  dataType: 'json',
  success(response){
    console.log(response);
    html += "<div class='form-group-custom-control'></div>";
  }
});

$('.cash_on_delivery, .esewa_btn').on('click', function(){
    let order_id = "<?php echo e(getOrderId()); ?>";
    $('.cash_data').html('<input type="hidden" name="order_id" value="'+order_id+'">');
})

$('#cb01').on('click', function(){
  $('.shipping-address').toggleClass('hidden');
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/pages/review.blade.php ENDPATH**/ ?>