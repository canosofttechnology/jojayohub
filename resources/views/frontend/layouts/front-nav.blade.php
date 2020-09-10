@php
$title = Request::segment(1);
@endphp
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <div style="height: 20px; width: 100%;"></div>
    </div><!-- End .container -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-9 order-lg-last dashboard-content">
          @if(session()->has('success'))
            {{frontSuccess()}}
          @elseif(session()->has('warning'))
            {{frontWarning()}}
          @elseif(session()->has('error'))
            {{frontError()}}
          @endif
