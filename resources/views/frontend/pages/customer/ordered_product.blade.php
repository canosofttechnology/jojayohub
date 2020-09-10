@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.front-nav')
<div class="table-responsive">
    <table id="normal-table" class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
       <thead>
           <tr>
               <th>Product</th>
               <th>Quantity</th>
               <th>Purchased date</th>
           </tr>
       </thead>
       <tbody>
               @foreach($orders as $order)
                   <tr>
                       <td>{{ $order->product->name }}</td>
                       <td>{{ $order->quantity }}</td>
                       <td>{{ $order->created_at->diffForHumans() }}</td>
                   </tr>
               @endforeach
       </tbody>
   </table>
    </div>
        </div>
        @include('frontend.layouts.customer-nav')
    </div>
</div>

<div class="mb-5"></div>
@endsection
