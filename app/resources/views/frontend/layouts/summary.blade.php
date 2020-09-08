@if(!empty(Cart::content()) && Cart::count() > 0)
<div class="col-lg-4 col-md-4 col-sm-12">
   <div class="card">
      <div class="card-body">
         <h3 class="card-title">Cart Totals</h3>
         <table class="cart__totals">
            <thead class="cart__totals-header">
               <tr>
               @foreach(Cart::content() as $row)
               <div class="row cart-detail"><a href="#">
                  <div class="col-lg-3 col-md-3 col-sm-12">
                     <img src="{{ $row->options->image }}" style="width:50px" alt="">
                  </div>
                  </a><div class="col-lg-9 col-md-9 col-sm-12"><a href="#">
                     </a><a href="{{ route('single-product', $row->options->slug) }}"> {{ $row->name }} ×{{ $row->qty }}</a>
                  </div>
               </div>
               @endforeach
               </tr>
            </thead>            
         </table>
      </div>
   </div>
</div>
@endif