<div class="table-responsive">
    <table class="table table-striped table-bordered datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
       <thead>
          <tr>
             {{-- <th><input type="checkbox" id="all"></th> --}}
             <th>Title</th>
             <th>Category</th>
             <th>Brand</th>
             <th>Status</th>
             {{-- <th>Action</th> --}}
          </tr>
       </thead>
       <tbody>
          @if(!empty($vendor_products))
          @foreach($vendor_products as $productLists)
          @can('view', $productLists)
          <tr>
             {{-- <td><input type="checkbox" name="delete_items" value="{{ $productLists->id }}"></td> --}}
             <td style="max-width:550px">{{ $productLists->name }}</td>
             <td style="max-width:100px">{{ @$productLists->category->name }}</td>
             <td>{{ @$productLists->brand->name }}</td>
             @php
             if($productLists->status == 'active'){
             $class = "success-tag";
             } else {
             $class = "danger-tag";
             }
             @endphp
             <td><span class="{{ $class }}">{{ $productLists->status }}</span></td>
             {{-- <td>
                <a href="{{ route('products.edit', $productLists->id) }}" class="btn btn-primary btn-xs pull-left" style="margin-right: 5px">
                <i class="fa fa-pencil-square-o"></i>
                </a>
                @if (Auth::user()->roles=='admin'||Auth::user()->roles=='vendor')
                <a class="pull-left" onclick="return confirm('Are you sure you want to delete this product?')">
                   <form method="POST" action="{{ route('products.destroy', $productLists->id) }}" accept-charset="UTF-8">
                      <input name="_method" type="hidden" value="DELETE">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                      <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                   </form>
                </a>
                @endif
             </td> --}}
          </tr>
          @endcan
          @endforeach @endif
       </tbody>
    </table>
 </div>
