@extends('frontend.layouts.master')
@section('content')
<div class="site__body">
            <!-- .block-slideshow -->
            <div class="block-slideshow block-slideshow--layout--with-departments block">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 d-none d-lg-block"></div>
                     <div class="col-12 col-lg-9">
                        <div class="block-slideshow__body">
                           <div class="owl-carousel">
                              @if(!empty($hero_slider))
                              @foreach($hero_slider as $slider_list)
                              <a class="block-slideshow__slide" href="{{ $slider_list->url }}">
                                 <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('{{ asset('uploads/slider/Thumb-'.$slider_list->image) }}')"></div>
                                 <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('{{ asset('uploads/slider/Thumb-'.$slider_list->image) }}')"></div>                                 
                              </a>
                              @endforeach
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">Featured Products</h3>
                     <div class="block-header__divider"></div>                     
                     <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-left-7x11"></use>
                           </svg>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-right-7x11"></use>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="block-products-carousel__slider">
                     <div class="block-products-carousel__preloader"></div>
                     <div class="owl-carousel">
                        @if(!empty($latest_products))
                        @foreach($latest_products as $recent)
                        @php
                        if(!empty($recent->images[0]->image)){
                            $product_image = $recent->images[0]->image;
                        } else {
                            $product_image = '';
                        }
                        $starting_price = App\Models\ProductSize::where('product_id', $recent->id)->first();                        
                        @endphp
                        <div class="products-list__item">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" value="{{ $recent->id }}" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image"><a href="{{ route('single-product', $recent->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('/uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $recent->slug) }}">{{ shortContent($recent->name, 10) }}...</a></div>                                    
                                    <ul class="product-card__features-list">
                                        {!! shortContent($recent->specification, 40) !!}
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                    
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart add-cart" value="{{ $recent->id }}" type="button">Add To Cart</button> 
                                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" value="{{ $recent->id }}" type="button">Add To Cart</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                     </div>
                  </div>
               </div>
            </div>
            <!-- .block-products-carousel / end --><!-- .block-banner -->
            <!-- <div class="block block-banner">
               <div class="container">
                  <a href="#" class="block-banner__body">
                     <div class="block-banner__image block-banner__image--desktop" style="background-image: url('frontend/images/banners/banner-1.jpg')"></div>
                     <div class="block-banner__image block-banner__image--mobile" style="background-image: url('frontend/images/banners/banner-1-mobile.jpg')"></div>
                     <div class="block-banner__title">Hundreds<br class="block-banner__mobile-br">Hand Tools</div>
                     <div class="block-banner__text">Hammers, Chisels, Universal Pliers, Nippers, Jigsaws, Saws</div>
                     <div class="block-banner__button"><span class="btn btn-sm btn-primary">Shop Now</span></div>
                  </a>
               </div>
            </div> -->
            <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">Women Fashion</h3>
                     <div class="block-header__divider"></div>                     
                     <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-left-7x11"></use>
                           </svg>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-right-7x11"></use>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="block-products-carousel__slider">
                     <div class="block-products-carousel__preloader"></div>
                     <div class="owl-carousel">
                        @if(!empty($women_fashion))
                        @foreach($women_fashion as $recent)
                        @php
                        if(!empty($recent->images[0]->image)){
                            $product_image = $recent->images[0]->image;
                        } else {
                            $product_image = '';
                        }
                        $starting_price = App\Models\ProductSize::where('product_id', $recent->id)->first();
                        
                        @endphp
                        <div class="products-list__item">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" value="{{ $recent->id }}" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image"><a href="{{ route('single-product', $recent->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('/uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $recent->slug) }}">{{ shortContent($recent->name, 10) }}...</a></div>                                    
                                    <ul class="product-card__features-list">
                                        {!! shortContent($recent->specification, 40) !!}
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                    
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart add-cart" type="button" value="{{ $recent->id }}">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" type="button">Add To Cart</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">Men Fashion</h3>
                     <div class="block-header__divider"></div>                     
                     <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-left-7x11"></use>
                           </svg>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-right-7x11"></use>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="block-products-carousel__slider">
                     <div class="block-products-carousel__preloader"></div>
                     <div class="owl-carousel">
                        @if(!empty($men_fashion))
                        @foreach($men_fashion as $recent)
                        @php
                        if(!empty($recent->images[0]->image)){
                            $product_image = $recent->images[0]->image;
                        } else {
                            $product_image = '';
                        }
                        $starting_price = App\Models\ProductSize::where('product_id', $recent->id)->first();
                        
                        @endphp
                        <div class="products-list__item">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" value="{{ $recent->id }}" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image"><a href="{{ route('single-product', $recent->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('/uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $recent->slug) }}">{{ shortContent($recent->name, 10) }}...</a></div>                                    
                                    <ul class="product-card__features-list">
                                        {!! shortContent($recent->specification, 40) !!}
                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                    
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart add-cart" value="{{ $recent->id }}" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" type="button">Add To Cart</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="block block--highlighted block-categories block-categories--layout--classic">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">Popular Categories</h3>
                     <div class="block-header__divider"></div>
                  </div>
                  <div class="block-categories__list">                     
                  </div>
               </div>
            </div> -->
            
            <div class="block block-products-carousel" data-layout="horizontal" data-mobile-grid-columns="2">
               <div class="container">
                  <div class="block-header">
                     <h3 class="block-header__title">New Arrivals</h3>
                     <div class="block-header__divider"></div>
                     <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-left-7x11"></use>
                           </svg>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                           <svg width="7px" height="11px">
                              <use xlink:href="frontend/images/sprite.svg#arrow-rounded-right-7x11"></use>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="block-products-carousel__slider">
                     <div class="block-products-carousel__preloader"></div>
                     <div class="owl-carousel">
                        @if(!empty($latest_products))                                                                  
                        @for($key=0; $key < count($latest_products); $key++)
                        @php
                        if(!empty($latest_products[$key]->images[0]->image)){
                            $product_image = $latest_products[$key]->images[0]->image;
                        } else {
                            $product_image = "";
                        }
                        @endphp
                        <div class="block-products-carousel__column">                           
                           <div class="block-products-carousel__cell">
                              <div class="product-card product-card--hidden-actions">
                                 <button class="product-card__quickview" value="{{ $latest_products[$key]->id }}" type="button">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 <div class="product-card__image product-image"><a href="{{ route('single-product', $latest_products[$key]->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('/uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $latest_products[$key]->slug) }}">{{ $latest_products[$key]->name }}</a></div>                                    
                                    <ul class="product-card__features-list">
                                       <li>Speed: 750 RPM</li>
                                       <li>Power Source: Cordless-Electric</li>
                                       <li>Battery Cell Type: Lithium</li>
                                       <li>Voltage: 20 Volts</li>
                                       <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                 </div>
                                 <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>                                    
                                    <div class="product-card__buttons">
                                       <button class="btn btn-primary product-card__addtocart add-cart" value="{{ $latest_products[$key]->id }}" type="button">Add To Cart</button> 
                                       <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" value="{{ $latest_products[$key]->id }}" type="button">Add To Cart</button> 
                                       <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                          <svg width="16px" height="16px">
                                             <use xlink:href="frontend/images/sprite.svg#wishlist-16"></use>
                                          </svg>
                                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                       </button>
                                       <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                          <svg width="16px" height="16px">
                                             <use xlink:href="frontend/images/sprite.svg#compare-16"></use>
                                          </svg>
                                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @php
                           if($key < count($latest_products)){
                              $key = $key + 1;
                           }
                           if(!empty($latest_products[$key]->images[0]->image)){
                            $product_image = $latest_products[$key]->images[0]->image;
                           } else {
                           $product_image = "";
                           }
                           @endphp
                           @if($key < count($latest_products))
                           <div class="block-products-carousel__cell">
                              <div class="product-card product-card--hidden-actions">
                                 <button class="product-card__quickview" value="{{ $latest_products[$key]->id }}" type="button">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                 </div>
                                 <div class="product-card__image product-image"><a href="{{ route('single-product', $latest_products[$key]->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('/uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $latest_products[$key]->slug) }}">{{ $latest_products[$key]->name }}</a></div>                                   
                                    <ul class="product-card__features-list">
                                       <li>Speed: 750 RPM</li>
                                       <li>Power Source: Cordless-Electric</li>
                                       <li>Battery Cell Type: Lithium</li>
                                       <li>Voltage: 20 Volts</li>
                                       <li>Battery Capacity: 2 Ah</li>
                                    </ul>
                                 </div>
                                 <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>                                    
                                    <div class="product-card__buttons">
                                       <button class="btn btn-primary add-cart product-card__addtocart add-cart" value="{{ $latest_products[$key]->id }}" type="button">Add To Cart</button> 
                                       <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" value="{{ $latest_products[$key]->id }}" type="button">Add To Cart</button> 
                                       <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                          <svg width="16px" height="16px">
                                             <use xlink:href="frontend/images/sprite.svg#wishlist-16"></use>
                                          </svg>
                                          <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                       </button>
                                       <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                          <svg width="16px" height="16px">
                                             <use xlink:href="frontend/images/sprite.svg#compare-16"></use>
                                          </svg>
                                          <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endif                           
                        </div>  
                        @endfor
                        @endif                      
                     </div>
                  </div>
               </div>
            </div>
            <!-- .block-products-carousel / end --><!-- .block-posts -->
            
            <div class="block block-brands">
               <div class="container">
                  <div class="block-brands__slider">
                     <div class="owl-carousel">
                         @if(!empty($brand_list))
                         @foreach($brand_list as $avail_brand)
                        <div class="block-brands__item"><a href="#"><img src="{{ asset('uploads/brands/Thumb-'.$avail_brand->logo) }}" alt=""></a></div>
                        @endforeach
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="block block-product-columns d-lg-block d-none">
               <div class="container">
                  <div class="row">
                     <div class="col-4">
                        <div class="block-header">
                           <h3 class="block-header__title">Electronic Devices</h3>
                           <div class="block-header__divider"></div>
                        </div>
                        <div class="block-product-columns__column">
                            @if($electronic_device_product)
                            @foreach($electronic_device_product as $electronic_prod)
                           <div class="block-product-columns__item">
                              <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                 <button class="product-card__quickview" type="button" value="{{ $electronic_prod->id }}">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 @php
                                if(!empty($electronic_prod->images[0]->image)){
                                    $product_image = $electronic_prod->images[0]->image;
                                } else {
                                    $product_image = 'no_image.png';
                                }
                                @endphp
                                 <div class="product-card__image product-image"><a href="{{ route('single-product', $electronic_prod->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $electronic_prod->slug) }}">{{ $electronic_prod->name }}</a></div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="block-header">
                           <h3 class="block-header__title">Electronic Accessories</h3>
                           <div class="block-header__divider"></div>
                        </div>
                        <div class="block-product-columns__column">
                            @if($electronic_accessories_product)
                            @foreach($electronic_accessories_product as $electronic_acc_pro)
                           <div class="block-product-columns__item">
                              <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                 <button class="product-card__quickview" type="button" value="{{ $electronic_acc_pro->id }}">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 @php
                                if(!empty($electronic_acc_pro->images[0]->image)){
                                    $product_image = $electronic_acc_pro->images[0]->image;
                                } else {
                                    $product_image = 'no_image.png';
                                }
                                @endphp
                                 <div class="product-card__image product-image"><a href="{{ route('single-product', $electronic_acc_pro->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $electronic_acc_pro->slug) }}">{{ $electronic_acc_pro->name }}</a></div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="block-header">
                           <h3 class="block-header__title">TV and Home Appliances</h3>
                           <div class="block-header__divider"></div>
                        </div>
                        <div class="block-product-columns__column">
                            @if($electronic_accessories_product)
                            @foreach($electronic_accessories_product as $electronic_acc_pro)
                           <div class="block-product-columns__item">
                              <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                 <button class="product-card__quickview" type="button" value="{{ $electronic_acc_pro->id }}">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 @php
                                if(!empty($electronic_acc_pro->images[0]->image)){
                                    $product_image = $electronic_acc_pro->images[0]->image;
                                } else {
                                    $product_image = 'no_image.png';
                                }
                                @endphp
                                 <div class="product-card__image product-image"><a href="{{ route('single-product', $electronic_acc_pro->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('single-product', $electronic_acc_pro->slug) }}">{{ $electronic_acc_pro->name }}</a></div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
@endsection
