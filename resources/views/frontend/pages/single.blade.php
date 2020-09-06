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
                            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">{{ $data->category->name }}</a> 
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content">
                <!-- .product__gallery -->
                <div class="product__gallery">
                    <div class="product-gallery">
                        <div class="product-gallery__featured">
                            <button class="product-gallery__zoom">
                            <svg width="24px" height="24px">
                                <use xlink:href="/frontend/images/sprite.svg#zoom-in-24"></use>
                            </svg>
                            </button>
                            <div class="owl-carousel" id="product-image">
                            @if(!empty($data->images) && count($data->images) > 0)
                            @foreach($data->images as $image_list)
                            <div class="product-image product-image--location--gallery">
                                <a href="{{ asset('/uploads/products/'.$image_list->image) }}" data-width="100" data-height="100" class="product-image__body" target="_blank"><img class="product-image__img" src="{{ asset('/uploads/products/'.$image_list->image) }}" alt=""></a>
                            </div>
                            @endforeach
                            @else
                            
                            <div class="product-image product-image--location--gallery">
                                <a href="{{ asset('/uploads/products/Thumb-no_image.png') }}" data-width="100" data-height="100" class="product-image__body" target="_blank"><img class="product-image__img" src="{{ asset('/uploads/products/Thumb-no_image.png') }}" alt=""></a>
                            </div>
                            @endif
                            </div>
                        </div>
                        <div class="product-gallery__carousel">
                            <div class="owl-carousel" id="product-carousel">
                            @if(!empty($data->images) && count($data->images) > 0)
                            @foreach($data->images as $image_list)
                            <a href="{{ asset('/uploads/products/'.$image_list->image) }}" class="product-image product-gallery__carousel-item">
                                <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="{{ asset('/uploads/products/'.$image_list->image) }}" alt=""></div>
                            </a>
                            @endforeach
                            @else
                            <a href="{{ asset('/uploads/products/Thumb-no_image.png') }}" class="product-image product-gallery__carousel-item">
                                <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="{{ asset('/uploads/products/Thumb-no_image.png') }}" alt=""></div>
                            </a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .product__gallery / end --><!-- .product__info -->
                <div class="product__info">
                    <h1 class="product__name">{{ $data->name }}</h1>
                    <!-- <div class="product__rating">
                        <div class="product__rating-stars">
                            <div class="rating">
                            <div class="rating__body">
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                    <g class="rating__fill">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                    </g>
                                    <g class="rating__stroke">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                    </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                    <div class="rating__fill">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                    <div class="rating__stroke">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                    <g class="rating__fill">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                    </g>
                                    <g class="rating__stroke">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                    </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                    <div class="rating__fill">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                    <div class="rating__stroke">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                    <g class="rating__fill">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                    </g>
                                    <g class="rating__stroke">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                    </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                    <div class="rating__fill">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                    <div class="rating__stroke">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                    <g class="rating__fill">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                    </g>
                                    <g class="rating__stroke">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                    </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                    <div class="rating__fill">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                    <div class="rating__stroke">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                </div>
                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                    <g class="rating__fill">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                    </g>
                                    <g class="rating__stroke">
                                        <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                    </g>
                                </svg>
                                <div class="rating__star rating__star--only-edge rating__star--active">
                                    <div class="rating__fill">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                    <div class="rating__stroke">
                                        <div class="fake-svg-icon"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="product__rating-legend"><a href="#">7 Reviews</a><span>/</span><a href="#">Write A Review</a></div>
                    </div> -->
                    <div class="product__description">
                    {!! $data->specification !!}
                    <ul class="product__meta">
                        <li class="product__meta-availability">Availability: <span class="text-success">In Stock</span></li>
                        @if(!empty($data->brand_id) && $data->brand->name !== "No Brand")                       
                        <li>Brand: <a href="#">{{ @$data->brand->name }}</a></li>
                        @endif                        
                        <li>SKU: {{ @$data->sku }}</li>
                    </ul>
                </div>
                <!-- .product__info / end --><!-- .product__sidebar -->                

                <div class="product__sidebar">
                    <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>
                    
                    <p></p>
                    <!-- .product__options -->
                    <!-- <form class="product__options"> -->
                        @php
                        $unique_product_colors = $data->colors->unique('color_id');
                        $unique_product_sizes = $data->sizes->unique('size_id');
                        @endphp
                        @if(!empty($unique_product_colors))  
                        <div class="form-group product__option">
                            <label class="product__option-label">Colors</label>
                            <div class="input-radio-color">
                                <div class="input-radio-color__list">
                                    @foreach($unique_product_colors as $color_data)
                                    <label class="input-radio-color__item input-radio-color__item--white" style="color: {{ $color_data->colorInfo->name }};" data-toggle="tooltip" title="" data-original-title="{{ $color_data->colorInfo->name }}">
                                        <input type="radio" name="color"> <span></span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($unique_product_sizes))
                        <div class="form-group product__option">
                            <label class="product__option-label">Sizes</label>
                            <div class="input-radio-label">
                                <div class="input-radio-label__list">
                                    @foreach($unique_product_sizes as $avail_size)
                                    <label>
                                        <input type="radio" name="{{ $avail_size->sizeInfo->name }}"> 
                                        <span>{{ $avail_size->sizeInfo->name }}</span>
                                    </label> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group product__option">
                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <div class="product__actions">
                                <div class="product__actions-item">
                                <div class="input-number product__quantity">
                                    <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                    <div class="input-number__add"></div>
                                    <div class="input-number__sub"></div>
                                </div>
                                </div>
                                <div class="product__actions-item product__actions-item--addtocart"><button class="btn btn-primary btn-lg add-cart" value="{{ $data->id }}">Add to cart</button></div>
                                <div class="product__actions-item product__actions-item--addtocart"><button class="btn btn-primary btn-lg add-cart buy-now" value="{{ $data->id }}">Buy Now</button></div>                                
                            </div>
                        </div>
                    <!-- </form> -->
                    <!-- .product__options / end -->
                </div>
                <!-- .product__end -->
                
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                
            
                <div class="product__footer">                    
                    <div class="product__share-links share-links">
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-tabs product-tabs--sticky">
                <div class="product-tabs__list">
                <div class="product-tabs__list-body">
                    <div class="product-tabs__list-container container"><a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a> <a href="#tab-specification" class="product-tabs__item">Specification</a></div>
                </div>
                </div>
                <div class="product-tabs__content">
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                    <div class="typography">
                        <h3>Product Full Description</h3>
                        {!! $data->description !!}
                    </div>
                </div>
                <div class="product-tabs__pane" id="tab-specification">
                    <div class="spec">
                        <h3 class="spec__header">Specification</h3>
                        {!! $data->specification !!}
                        <div class="spec__disclaimer">Information on technical characteristics, the delivery set, the country of manufacture and the appearance of the goods is for reference only and is based on the latest information available at the time of publication.</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($related))
    <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Related Products</h3>
                <div class="block-header__divider"></div>
                <div class="block-header__arrows-list">
                <button class="block-header__arrow block-header__arrow--left" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-left-7x11"></use>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-7x11"></use>
                    </svg>
                </button>
                </div>
            </div>
            <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">                    
                    @foreach($related as $related_products)
                    @php
                    if(!empty($related_products->images[0]->image)){
                        $product_image = $related_products->images[0]->image;
                    } else {
                        $product_image = "no_image.png";
                    }
                    
                    @endphp
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" type="button" value="{{ $related_products->id }}">
                                <svg width="16px" height="16px">
                                    <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__image product-image"><a href="{{ route('single-product',$related_products->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ asset('uploads/products/Thumb-'.$product_image) }}" alt=""></a></div>
                                <div class="product-card__info">
                                <div class="product-card__name"><a href="{{ route('single-product',$related_products->slug) }}">{{ $related_products->name }}</a></div>
                                <div class="product-card__rating">
                                    <div class="product-card__rating-stars">
                                        <div class="rating">
                                            <div class="rating__body">
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="/frontend/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">11 Reviews</div>
                                </div>
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
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> 
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@section('scripts')
<script>

setTimeout(function(){
 	$('.buy-now').on('click', function(){
 	    window.location.replace("http://jojayohub.com/review")
 	});
}, 4000); 
let product_id = $('#product_id').attr('value');
// sinlge_page
</script>
@endsection