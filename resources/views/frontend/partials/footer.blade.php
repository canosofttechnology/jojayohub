<footer class="site__footer">
   <div class="site-footer">
      <div class="container">
         <div class="site-footer__widgets">
            <!-- .block-slideshow / end --><!-- .block-features -->
            <div class="block block-features block-features--layout--classic">
               <div class="container">
                  <div class="block-features__list">
                     <div class="block-features__item">
                        <div class="block-features__icon">
                           <svg width="48px" height="48px">
                              <use xlink:href="frontend/images/sprite.svg#fi-free-delivery-48"></use>
                           </svg>
                        </div>
                        <div class="block-features__content">
                           <div class="block-features__title">Express Delivery</div>
                           <div class="block-features__subtitle">Express Delivery on orders over Nepal</div>
                        </div>
                     </div>
                     <div class="block-features__divider"></div>
                     <div class="block-features__item">
                        <div class="block-features__icon">
                           <svg width="48px" height="48px">
                              <use xlink:href="frontend/images/sprite.svg#fi-24-hours-48"></use>
                           </svg>
                        </div>
                        <div class="block-features__content">
                           <div class="block-features__title">Support 24/7</div>
                           <div class="block-features__subtitle">Call us anytime</div>
                        </div>
                     </div>
                     <div class="block-features__divider"></div>
                     <div class="block-features__item">
                        <div class="block-features__icon">
                           <svg width="48px" height="48px">
                              <use xlink:href="frontend/images/sprite.svg#fi-payment-security-48"></use>
                           </svg>
                        </div>
                        <div class="block-features__content">
                           <div class="block-features__title">100% Safety</div>
                           <div class="block-features__subtitle">Only secure payments</div>
                        </div>
                     </div>
                     <div class="block-features__divider"></div>
                     <div class="block-features__item">
                        <div class="block-features__icon">
                           <svg width="48px" height="48px">
                              <use xlink:href="frontend/images/sprite.svg#fi-tag-48"></use>
                           </svg>
                        </div>
                        <div class="block-features__content">
                           <div class="block-features__title">Quality Checked</div>
                           <div class="block-features__subtitle">We are providing top quality products and service</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- .block-features / end --><!-- .block-products-carousel -->
            <div class="row">
               <div class="col-12 col-md-6 col-lg-4">
                  <div class="site-footer__widget footer-contacts">
                     <h5 class="footer-contacts__title">Contact Us</h5>
                     <div class="footer-contacts__text">Jojayohub.com is one of the best stores of Nepal which deals all types of formal & casual dresses and shoes made of the finest quality.</div>
                     <ul class="footer-contacts__contacts">
                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> {{ $sensitive_data->location }}</li>
                        <li><i class="footer-contacts__icon far fa-envelope"></i> {{ $sensitive_data->email }}</li>
                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> {{ $sensitive_data->landline }}, {{ $sensitive_data->landline1 }}</li>
                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>
                     </ul>
                  </div>
               </div>
               <div class="col-6 col-md-3 col-lg-2">
                  <div class="site-footer__widget footer-links">
                     <h5 class="footer-links__title">Information</h5>
                     <ul class="footer-links__list">
                        @if(!empty($footer_menu))
                        @foreach($footer_menu as $menu_list)
                        <li class="footer-links__item"><a href="{{ route('pageDetail', $menu_list->slug) }}" class="footer-links__link">{{ $menu_list->name }}</a></li>
                        @endforeach
                        @endif
                     </ul>
                  </div>
               </div>
               <div class="col-6 col-md-3 col-lg-2">
                  <div class="site-footer__widget footer-links">
                     <h5 class="footer-links__title">My Account</h5>
                     <ul class="footer-links__list">
                        <li class="footer-links__item"><a href="{{ url('/dashboard') }}" class="footer-links__link">Account Dashboard</a></li>
                        <li class="footer-links__item"><a href="#" class="footer-links__link">Account Information</a></li>
                        <li class="footer-links__item"><a href="#" class="footer-links__link">Address Book</a></li>
                        <li class="footer-links__item"><a href="#" class="footer-links__link">My Orders</a></li>
                        <li class="footer-links__item"><a href="#" class="footer-links__link">My wishlist</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-4">
                  <div class="site-footer__widget footer-newsletter">
                     <h5 class="footer-newsletter__title">Newsletter</h5>
                     <div class="footer-newsletter__text">Fill up the form below to stay updated with products that arrives at Jojayohub.com.</div>
                     <form action="#" class="footer-newsletter__form"><label class="sr-only" for="footer-newsletter-address">Email Address</label> <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address..."> <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button></form>
                     <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on social networks</div>
                     <!-- social-links -->
                     <div class="social-links footer-newsletter__social-links social-links--shape--circle">
                        <ul class="social-links__list">
                           <li class="social-links__item"><a class="social-links__link social-links__link--type--youtube" href="{{ $sensitive_data->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                           <li class="social-links__item"><a class="social-links__link social-links__link--type--facebook" href="{{ $sensitive_data->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                           <li class="social-links__item"><a class="social-links__link social-links__link--type--twitter" href="{{ $sensitive_data->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                           <li class="social-links__item"><a class="social-links__link social-links__link--type--instagram" href="{{ $sensitive_data->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                     </div>
                     <!-- social-links / end -->
                  </div>
               </div>
            </div>
         </div>
         <div class="site-footer__bottom">
            <div class="site-footer__copyright">               
               Design and Developed by <a href="https://canosoft.com.np" target="_blank">Canosoft</a>
            </div>
         </div>
      </div>
      <div class="totop">
         <div class="totop__body">
            <div class="totop__start"></div>
            <div class="totop__container container"></div>
            <div class="totop__end">
               <button type="button" class="totop__button">
                  <svg width="13px" height="8px">
                     <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-up-13x8"></use>
                  </svg>
               </button>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- site__footer / end -->
</div>
<!-- site / end --><!-- quickview-modal -->
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content"></div>
   </div>
</div>
<!-- quickview-modal / end --><!-- mobilemenu -->
<div class="mobilemenu">
   <div class="mobilemenu__backdrop"></div>
   <div class="mobilemenu__body">
      <div class="mobilemenu__header">
         <div class="mobilemenu__title">Menu</div>
         <button type="button" class="mobilemenu__close">
            <svg width="20px" height="20px">
               <use xlink:href="/frontend/images/sprite.svg#cross-20"></use>
            </svg>
         </button>
      </div>
      <div class="mobilemenu__content">
         <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
            @if(!empty($primary_categories))
            @foreach($primary_categories as $prime)
            @if($prime->secondaryCategories->count() > 0)
            <li class="mobile-links__item" data-collapse-item>
               <div class="mobile-links__item-title">
                  <a href="#" class="mobile-links__item-link">{{ $prime->name }}</a> 
                  <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                     <svg class="mobile-links__item-arrow" width="12px" height="7px">
                        <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-12x7"></use>
                     </svg>
                  </button>
               </div>
               <div class="mobile-links__item-sub-links" data-collapse-content>
                  <ul class="mobile-links mobile-links--level--1">
                     @foreach($prime->secondaryCategories as $secondary)
                     @if($secondary->FinalCategory->count() > 0)
                     <?php
                     $secondary->name = str_replace("Women's", "", $secondary->name);
                     $secondary->name = str_replace("Men's", "", $secondary->name);
                     ?>
                     <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                           <a href="#" class="mobile-links__item-link">{{ $secondary->name }}</a> 
                           <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                              <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                 <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-12x7"></use>
                              </svg>
                           </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                           <ul class="mobile-links mobile-links--level--2">
                              @foreach($secondary->FinalCategory as $final_cat)
                              <?php
                              $final_cat->name = str_replace("Women's", "", $final_cat->name);
                              $final_cat->name = str_replace("Men's", "", $final_cat->name);
                              ?>
                              <li class="mobile-links__item" data-collapse-item>
                                 <div class="mobile-links__item-title"><a href="{{ route('categories', $final_cat->slug) }}" class="mobile-links__item-link">{{ $final_cat->name }}</a></div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                     </li>
                     @else
                     <li class="mobile-links__item">
                        <div class="mobile-links__item-title">
                           <a href="#" class="mobile-links__item-link">{{ $secondary->name }}</a>                           
                        </div>                        
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </div>
            </li>
            @endif
            @endforeach
            @endif
         </ul>
      </div>
   </div>
</div>
<!-- mobilemenu / end --><!-- photoswipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="pswp__bg"></div>
   <div class="pswp__scroll-wrap">
      <div class="pswp__container">
         <div class="pswp__item"></div>
         <div class="pswp__item"></div>
         <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
         <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button><!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
               <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                     <div class="pswp__preloader__donut"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
         </div>
         <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
         <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
         </div>
      </div>
   </div>
</div>
<!-- photoswipe / end --><!-- js -->
<script src="/frontend/js/jquery.min.js"></script>
<script src="/frontend/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/js/owl.carousel.min.js"></script>
<script src="/frontend/js/nouislider.min.js"></script>
<script src="/frontend/js/photoswipe.min.js"></script>
<script src="/frontend/js/photoswipe-ui-default.min.js"></script>
<script src="/frontend/js/select2.min.js"></script>
<script src="/frontend/js/number.js"></script>
<script src="/frontend/js/main.js"></script>
<script src="/frontend/js/header.js"></script>
<script src="/frontend/js/svg4everybody.min.js"></script>
<script>svg4everybody();</script>
<script type="text/javascript">
   var currentVal = 1;
   function cartCount(){
       $.ajax({
           method: "GET",
           url: "{{ route('cart.count') }}",
           dataType: 'json',
           success(response){
               $('.indicator__cart').html(response.count);
               $('.indicator__total').html(response.total);
           }
       });
   }
   $('.indicator__cart').html("{{ Cart::content()->count() }}");
   function updateCart(){
       $.ajax({
           method: "GET",
           url: "{{ route('cart.content') }}",
           dataType: 'json',
           success(callback_resonse){
               $('.dropcart__products-list').empty();
               let html = "";
               let total = "";
               $.each(callback_resonse, function( key, value ){
                   total = total+value.price;
                   var data = value.options.slug;
                   var url = "{{ route('single-product', ':data') }}";
                   url = url.replace(':data', data);                   
                   html += '<div class="dropcart__product"> <div class="product-image dropcart__product-image"><a href="'+url+'" class="product-image__body"><img class="product-image__img" src="'+value.options.image+'" alt="" style="width:70px"></a></div> <div class="dropcart__product-info"> <div class="dropcart__product-name"><a href="'+url+'">'+value.name+'</a></div> <div class="dropcart__product-meta"><span class="dropcart__product-quantity">'+value.qty+'</span> × <span class="dropcart__product-price">'+number_format(value.price)+'</span></div> </div> <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon"> <svg width="10px" height="10px"> <use xlink:href="/frontend/images/sprite.svg#cross-10"></use> </svg> </button> </div>';
               });                
               $('.dropcart__products-list').html(html);
               $.getScript("{{ asset('/frontend/js/jquery.min.js') }}")            
               cartCount();
           },
           error: function(callback_resonse){
               toastr.error('Problem!');
           }
       }); 
   }
   $(document).on("click", ".ps-product__remove", function() {
   let confirmation = confirm("Are you sure, you want to remove this item from your cart?");
   if(confirmation){
       let data = $(this).attr('value');        
       var url = '{{ route("cart.destroy", ":data") }}';
       url = url.replace(':data', data);
       $.ajax({
           method: "POST",
           url: url,
           dataType: 'json',
           data: { _token:"{{ csrf_token() }}",  _method:"DELETE"},
           success(response){
               updateCart();
               $('.ps-product__info').find('span').attr('value', '');
               toastr.success(response.data);
           }
       });
   }
   });
   
   function addcart() {
       $('.add-cart').on('click', function(){
       let id = $(this).attr('value');
       let url = '{{ route("cart.store") }}';
       var image_src = $(this).closest('figure').find('img').attr('src');       
       $.ajax({
           method: "POST",
           url: url,
           dataType: 'json',
           data: { _token:"{{ csrf_token() }}", id: id},
           success(response){
               $('.ps-product__info').closest('div').find('span').attr('value', response.rowId)
               $('#productImage').attr('src', image_src);
               cartCount();
               updateCart();
               toastr.success(response.message);  
           },
           error: function(response){
               toastr.error('Something went wrong!');
           }
       });
       })
   }
   addcart();
   
   $(function () {
       var currentVal = '';
       $(".up, .down").on('click', function(){
       let quantity = $(this).val();
       let data = $(this).closest('div').find('span').attr('value');
       if(data == ''){
           toastr.info('Please add the product to the cart first!');
           return;
       }
       var url = '{{ route("update.cart", ":data") }}';
       url = url.replace(':data', data);
           $.ajax({
               method: "POST",
               url: url,
               dataType: 'json',
               data: { _token:"{{ csrf_token() }}", _method:"PATCH", quantity: quantity},
               success(response){
                   toastr.success(response.data);
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
   });   
   setTimeout(function(){
   $('.alert').fadeOut();
   }, 5000);
</script>
<script>
   $(document).ready(function(){
   	$("#nav li").hover(
   	function(){
   		$(this).children('ul').hide();
   		$(this).children('ul').slideDown('fast');
   	},
   	function () {
   		$('ul', this).slideUp('fast');            
   	});
   });
</script>
@yield('scripts')
</body>
</html>