<?php
$title = Request::segment(1);
?>
<aside class="sidebar col-lg-3">
    <div class="widget widget-dashboard">
        <h3 class="widget-title">My Account</h3>
        <ul class="list">
            <li <?php if(@$title == 'dashboard'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/dashboard')); ?>">Account Dashboard</a></li>
            <li <?php if(@$title == 'account-information'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/account-information')); ?>">Account Information</a></li>
            <li <?php if(@$title == 'address-book' || @$title == 'add-address'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/address-book')); ?>">Address Book</a></li>
            <li <?php if(@$title == 'my-oders'): ?> class="active" <?php endif; ?>><a href="#">My Orders</a></li>
            <li <?php if(@$title == 'profile'): ?> class="active" <?php endif; ?>><a href="#">Recurring Profiles</a></li>
            <li <?php if(@$title == 'my-reviews'): ?> class="active" <?php endif; ?>><a href="#">My Product Reviews</a></li>
            <li <?php if(@$title == 'my-wishlist'): ?> class="active" <?php endif; ?>><a href="#">My Wishlist</a></li>
            <li <?php if(@$title == 'newsletter'): ?> class="active" <?php endif; ?>><a href="#">Newsletter Subscriptions</a></li>
            <li <?php if(@$title == 'downloadable'): ?> class="active" <?php endif; ?>><a href="#">My Downloadable Products</a></li>
        </ul>
    </div><!-- End .widget -->
</aside><!-- End .col-lg-3 -->
<?php /**PATH /home/jojayohub/public_html/resources/views/frontend/layouts/customer-nav.blade.php ENDPATH**/ ?>