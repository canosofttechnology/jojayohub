<div class="table-responsive">
    <table id="normal-table" class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
       <thead>
           <tr>
               <th>Retailer</th>
               <th>Product</th>
               <th>Sales Quantity</th>
               <th>Price</th>
               <th>Sold At</th>
               <th>Entry date</th>
           </tr>
       </thead>
       <tbody>
           @if($vendor_sales)
               @foreach($vendor_sales as $saleList)
                   <tr>
                       <td>{{$saleList->reTailer->name}}</td>
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
