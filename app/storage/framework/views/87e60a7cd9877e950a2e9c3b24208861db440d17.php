
<?php $__env->startSection('content'); ?>
<div class="ps-page--single" id="about-us">
    <img src="img/bg/about-us.jpg" alt="">
    <div class="ps-about-intro">
        <div class="container">
            <?php echo $page_detail->description; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/pages/page.blade.php ENDPATH**/ ?>