
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.layouts.front-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Contact Information
                            <a href="#" class="card-edit">Edit</a>
                        </div><!-- End .card-header -->

                        <div class="card-body">
                            <p>
                                John Doe<br>
                                porto_shop@gmail.com<br>
                                <a href="#">Change Password</a>
                            </p>
                        </div><!-- End .card-body -->
                    </div><!-- End .card -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            newsletters
                            <a href="#" class="card-edit">Edit</a>
                        </div><!-- End .card-header -->

                        <div class="card-body">
                            <p>
                                You are currently not subscribed to any newsletter.
                            </p>
                        </div><!-- End .card-body -->
                    </div><!-- End .card -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->

            <div class="card">
                <div class="card-header">
                    Address Book
                    <a href="#" class="card-edit">Edit</a>
                </div><!-- End .card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="">Default Billing Address</h4>
                            <address>
                                You have not set a default billing address.<br>
                                <a href="#">Edit Address</a>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <h4 class="">Default Shipping Address</h4>
                            <address>
                                You have not set a default shipping address.<br>
                                <a href="#">Edit Address</a>
                            </address>
                        </div>
                    </div>
                </div><!-- End .card-body -->
            </div><!-- End .card -->
        </div><!-- End .col-lg-9 -->
        <?php echo $__env->make('frontend.layouts.customer-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- margin -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/pages/dashboard.blade.php ENDPATH**/ ?>