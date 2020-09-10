<div class="col-md-6 mt-lg" id="19">
    <section class="panel panel-custom menu" >
       <header class="panel-heading">
          <h3 class="panel-title">Recently Product</h3>
       </header>
       <div class="panel-body inv-slim-scroll" style="height: 437px;overflow-y: scroll;">
          <div class="table-responsive">
              <table class="table table-striped table-bordered" role="grid" aria-describedby="basic-col-reorder_info">
                 <thead>
                    <tr>
                       <th>Title</th>
                       <th>Vendor</th>
                       <th>Status</th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($recent_products as $product)
                         <tr>
                              <td>
                                  <a href="{{ route('user.product', [$product->VendorName->user_id,$product->id]) }}">
                                      {{ $product->name}}
                                  </a>
                              </td>
                              <td>{{ $product->VendorName->company}}</td>
                              <td>
                                  <span class="{{ $product->status == 'active'?'success-tag':'danger-tag' }}">{{ $product->status }}</span>
                              </td>
                         </tr>
                     @endforeach
                 </tbody>
              </table>
          </div>
       </div>
    </section>
 </div>
