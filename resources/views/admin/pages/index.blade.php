@extends('admin.layouts.master')
@section('content')

     <div class="row">
      <div class="col-lg-12">

         <div class="dashboard">
             @if (Auth::user()->roles=='admin')
                 @include('admin.pages.dashboard.admin')
             @endif

             @if (Auth::user()->roles=='vendor')
                 @include('admin.pages.dashboard.recent_products')
                 @include('admin.pages.dashboard.profile')
             @endif
        </div>
      </div>
   </div>

@endsection
