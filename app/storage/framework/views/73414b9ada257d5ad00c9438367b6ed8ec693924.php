<?php
$title = Request::segment(1);
?>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($title); ?></li>
        </ol>
    </div><!-- End .container -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-9 order-lg-last dashboard-content">
          <?php if(session()->has('success')): ?>
            <?php echo e(frontSuccess()); ?>

          <?php elseif(session()->has('warning')): ?>
            <?php echo e(frontWarning()); ?>

          <?php elseif(session()->has('error')): ?>
            <?php echo e(frontError()); ?>

          <?php endif; ?>
<?php /**PATH /home/jojayohub/public_html/resources/views/frontend/layouts/front-nav.blade.php ENDPATH**/ ?>