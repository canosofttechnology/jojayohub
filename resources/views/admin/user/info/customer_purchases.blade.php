<div class="table-responsive">
    <table id="normal-table" class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
       <thead>
           <tr>
               {{-- <th>Vendor</th> --}}
               <th>Vendor</th>
               <th>Sales Quantity</th>
               <th>Price</th>
               <th>Sold At</th>
               <th>Entry date</th>
           </tr>
       </thead>
       <tbody>
           @if($customer_purchase)
               @foreach($customer_purchase as $saleList)
                   <tr>
                       <td>{{$saleList->vendor->company}}</td>
                       <td>{{ $saleList->productName->name }}</td>
                       <td>{{ $saleList->quantity }}</td>
                       <td>{{ $saleList->price }}</td>
                       <td>{{ $saleList->date }}</td>
                       <td>{{ $saleList->created_at }}</td>
                   </tr>
               @endforeach
           @endif
       </tbody>
   </table>
    </div>
