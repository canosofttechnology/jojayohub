@php
$title = Request::segment(1);
@endphp
<aside class="sidebar col-lg-3">
    <div class="widget widget-dashboard">
        <h3 class="widget-title">My Account</h3>
        <ul class="list">
            <li @if(@$title == 'dashboard') class="active" @endif><a href="{{ url('/dashboard') }}">Account Dashboard</a></li>
            <li @if(@$title == 'ordered-product') class="active" @endif><a href="{{ route('customer.ordered') }}">Ordered Products</a></li>
            <li @if(@$title == 'purchased-product') class="active" @endif><a href="{{ route('customer.purchase')}}">Purchased Products</a></li>
            <li @if(@$title == 'account-information') class="active" @endif><a href="{{ url('/account-information') }}">Account Information</a></li>
            <li @if(@$title == 'change-password') class="active" @endif><a href="{{ route('customer.changepassword.form') }}">Change Password</a></li>
            {{-- <li @if(@$title == 'address-book' || @$title == 'add-address') class="active" @endif><a href="{{ url('/address-book') }}">Address Book</a></li>
            <li @if(@$title == 'profile') class="active" @endif><a href="#">Recurring Profiles</a></li>
            <li @if(@$title == 'my-reviews') class="active" @endif><a href="#">My Product Reviews</a></li>
            <li @if(@$title == 'my-wishlist') class="active" @endif><a href="#">My Wishlist</a></li>
            <li @if(@$title == 'newsletter') class="active" @endif><a href="#">Newsletter Subscriptions</a></li>
            <li @if(@$title == 'downloadable') class="active" @endif><a href="#">My Downloadable Products</a></li> --}}
        </ul>
    </div><!-- End .widget -->
</aside><!-- End .col-lg-3 -->
