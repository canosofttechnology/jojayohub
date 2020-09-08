@php
$title = Request::segment(1);
@endphp
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
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
