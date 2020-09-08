@extends('frontend.layouts.master')
@section('content')
<div class="site__body">
   <div class="page-header">
      <div class="page-header__container container">
         <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="{{ url('/') }}">Home</a> 
                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                     </svg>
                  </li>
                  <li class="breadcrumb-item">
                     <a href="">Breadcrumb</a> 
                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                     </svg>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
               </ol>
            </nav>
         </div>
         <div class="page-header__title">
            <h2>Shopping Cart</h2>
         </div>
      </div>
   </div>
   @if(Cart::count() > 0)
   <div class="cart block">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 offset-lg-2 col-md-9 offset-md-2 col-sm-12">
               <table class="cart__table cart-table">
                  <thead class="cart-table__head">
                     <tr class="cart-table__row">
                        <th class="cart-table__column cart-table__column--image">Image</th>
                        <th class="cart-table__column cart-table__column--product">Product</th>
                        <th class="cart-table__column cart-table__column--remove"></th>
                     </tr>
                  </thead>
                  <tbody class="cart-table__body">
                     @foreach(Cart::content() as $row)
                     <tr class="cart-table__row">
                        <td class="cart-table__column cart-table__column--image">
                           <div class="product-image"><a href="{{ route('single-product', $row->options->slug) }}" class="product-image__body">
                              <img class="product-image__img" src="{{ $row->options->image }}" alt=""></a>
                           </div>
                        </td>
                        <td class="cart-table__column cart-table__column--product">
                           <a href="{{ route('single-product', $row->options->slug) }}" class="cart-table__product-name">{{ $row->name }}</a>                    
                        </td>
                        <td class="cart-table__column cart-table__column--remove">
                           <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                              <svg width="12px" height="12px">
                                 <use xlink:href="images/sprite.svg#cross-12"></use>
                              </svg>
                           </button>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <div class="cart__actions">
                  <div class="cart__buttons">
                     <a href="{{ url('/shop') }}" class="btn btn-light">Continue Shopping</a> 
                     <a href="{{ url('/review') }}" class="btn btn-secondary ml-2">Proceed to Checkout</a> 
                     <a href="{{ route('destroyCart') }}" class="btn btn-primary cart__update-button">Destroy Cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @else
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="cart-table-container">
               <div class="row justify-content-center">
                  <div class="text-center">
                     <img src="/frontend/images/empty_product.png" style="padding-left: 20px">
                     <p><strong>Your shopping cart is empty</strong></p>
                     <a href="{{ url('/shop' )}}" class="btn btn-primary">Go shopping</a>
                  </div>
               </div>
               <br>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="cart-table-container">
            </div>
         </div>
      </div>
   </div>
   @endif
</div>
@endsection
@section('scripts')
<script>
   $('.vertical-quantity').on('change', function(){
     let quantity = $(this).val(); alert(quantity);
     let data = $(this).closest('span').attr("value");
     var url = '{{ route("update.cart", ":data") }}';
     url = url.replace(':data', data);
     alert(url);
     $.ajax({
       method: "POST",
       url: url,
       dataType: 'json',
       data: { _token:"{{ csrf_token() }}", _method:"PATCH", quantity: quantity},
       success(response){
         updateCart();
       },
   
       error: function(response){
   
           let data = response.responseJSON.errors;
   
           $.each( data, function( key, value ) {
               $( "<span class='validation-errors text-danger'>"+value+"</span>" ).insertAfter( "#"+key );
           });
         }
     });
   
   })
   
   $(document).on("click", ".product-remove", function() {
       $.ajax({
           method: "GET",
           url: "{{ route('cart.content') }}",
           dataType: 'json',
           success(callback_resonse){
               $('.cart-table-container').empty();
               let html = "";
               let side = "";
               let total = "";
               $.each(callback_resonse, function( key, value ){
                   total = total+value.price;
                   var data = value.options.slug;
                   var url = "{{ route('single-product', ':data') }}";
                   url = url.replace(':data', data);
                   html += '<div class="row" style="border: 1px solid #fff;padding: 10px 5px 10px 0px; background:#eee"><div class="col-lg-2 col-md-3 col-sm-12"><a href="'+value.options.image+'" target="_blank"><img src="'+value.options.image+'" class="cart-image" alt=""></a></div><div class="col-lg-10 col-md-9 col-sm-12"><a href="'+url+'" class="mb-point"><strong>'+value.name+'</strong></a> <p>Zivah</p><div class="tools" style="background:#fff; padding: 4px;  margin-top: 3px"><div class="row"><div class="col-lg-3 col-md-3 col-sm-12"><span value="'+value.rowId+'"><div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected"><input class="vertical-quantity form-control" type="text" value="'+value.qty+'"><span class="input-group-btn-vertical"><button class="btn btn-outline bootstrap-touchspin-up icon-up-dir" type="button"></button><button class="btn btn-outline bootstrap-touchspin-down icon-down-dir" type="button"></button></span></div></span></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="inner-tools">NPR '+value.price+'</div></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="inner-tools"><a href="#" class="btn-icon btn-icon-wish"><i class="icon-heart"></i> Move to wish lists</a></div></div><div class="col-lg-3 col-md-3 col-sm-12"><div class="inner-tools"><button value="'+value.rowId+'" title="Remove product" class="btn-remove product-remove"> Remove</button></div></div></div></div></div></div>';
                   side += '<tr><td class="product-col"><figure class="product-image-container"><a href="'+url+'" class="product-image"><img src="'+value.options.image+'" alt="product"></a></figure><div><h3 class="product-title"><a href="'+url+'">'+value.name+'</a></h3><span class="product-qty" value="'+value.rowId+'">Qty: '+value.qty+'</span></div></td><td class="price-col">'+value.price+'</td></tr>';
               });
               $('.cart-table-container').html(html);
               $('.table-cart').html(side);        
               // cartCount();
           },
           error: function(callback_resonse){
                
           }
       });
   });
</script>
@endsection
