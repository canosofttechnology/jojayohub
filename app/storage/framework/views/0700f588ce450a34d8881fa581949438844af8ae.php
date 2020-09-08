
<?php $__env->startSection('content'); ?>
<div class="site__body">
            <!-- .block-slideshow -->
            <div class="block-slideshow block-slideshow--layout--with-departments block">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 d-none d-lg-block"></div>
                     <div class="col-12 col-lg-9">
                        <div class="block-slideshow__body">
                           <div class="owl-carousel">
                              <?php if(!empty($hero_slider)): ?>
                              <?php $__currentLoopData = $hero_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <a class="block-slideshow__slide" href="<?php echo e($slider_list->url); ?>">
                                 <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('<?php echo e(asset('uploads/slider/Thumb-'.$slider_list->image)); ?>')"></div>
                                 <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('<?php echo e(asset('uploads/slider/Thumb-'.$slider_list->image)); ?>')"></div>                                 
                              </a>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
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
                        <?php if(!empty($latest_products)): ?>
                        <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        if(!empty($recent->images[0]->image)){
                            $product_image = $recent->images[0]->image;
                        } else {
                            $product_image = '';
                        }
                        $starting_price = App\Models\ProductSize::where('product_id', $recent->id)->first();                        
                        ?>
                        <div class="products-list__item">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" value="<?php echo e($recent->id); ?>" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $recent->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('/uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $recent->slug)); ?>"><?php echo e(shortContent($recent->name, 10)); ?>...</a></div>                                    
                                    <ul class="product-card__features-list">
                                        <?php echo shortContent($recent->specification, 40); ?>

                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                    
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart add-cart" value="<?php echo e($recent->id); ?>" type="button">Add To Cart</button> 
                                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" value="<?php echo e($recent->id); ?>" type="button">Add To Cart</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
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
                        <?php if(!empty($women_fashion)): ?>
                        <?php $__currentLoopData = $women_fashion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        if(!empty($recent->images[0]->image)){
                            $product_image = $recent->images[0]->image;
                        } else {
                            $product_image = '';
                        }
                        $starting_price = App\Models\ProductSize::where('product_id', $recent->id)->first();
                        
                        ?>
                        <div class="products-list__item">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" value="<?php echo e($recent->id); ?>" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $recent->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('/uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $recent->slug)); ?>"><?php echo e(shortContent($recent->name, 10)); ?>...</a></div>                                    
                                    <ul class="product-card__features-list">
                                        <?php echo shortContent($recent->specification, 40); ?>

                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                    
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart add-cart" type="button" value="<?php echo e($recent->id); ?>">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" type="button">Add To Cart</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
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
                        <?php if(!empty($men_fashion)): ?>
                        <?php $__currentLoopData = $men_fashion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        if(!empty($recent->images[0]->image)){
                            $product_image = $recent->images[0]->image;
                        } else {
                            $product_image = '';
                        }
                        $starting_price = App\Models\ProductSize::where('product_id', $recent->id)->first();
                        
                        ?>
                        <div class="products-list__item">
                            <div class="product-card product-card--hidden-actions">
                                <button class="product-card__quickview" value="<?php echo e($recent->id); ?>" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $recent->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('/uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $recent->slug)); ?>"><?php echo e(shortContent($recent->name, 10)); ?>...</a></div>                                    
                                    <ul class="product-card__features-list">
                                        <?php echo shortContent($recent->specification, 40); ?>

                                    </ul>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                    
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart add-cart" value="<?php echo e($recent->id); ?>" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" type="button">Add To Cart</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
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
                        <?php if(!empty($latest_products)): ?>                                                                  
                        <?php for($key=0; $key < count($latest_products); $key++): ?>
                        <?php
                        if(!empty($latest_products[$key]->images[0]->image)){
                            $product_image = $latest_products[$key]->images[0]->image;
                        } else {
                            $product_image = "";
                        }
                        ?>
                        <div class="block-products-carousel__column">                           
                           <div class="block-products-carousel__cell">
                              <div class="product-card product-card--hidden-actions">
                                 <button class="product-card__quickview" value="<?php echo e($latest_products[$key]->id); ?>" type="button">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $latest_products[$key]->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('/uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $latest_products[$key]->slug)); ?>"><?php echo e($latest_products[$key]->name); ?></a></div>                                    
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
                                       <button class="btn btn-primary product-card__addtocart add-cart" value="<?php echo e($latest_products[$key]->id); ?>" type="button">Add To Cart</button> 
                                       <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" value="<?php echo e($latest_products[$key]->id); ?>" type="button">Add To Cart</button> 
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
                           <?php
                           if($key < count($latest_products)){
                              $key = $key + 1;
                           }
                           if(!empty($latest_products[$key]->images[0]->image)){
                            $product_image = $latest_products[$key]->images[0]->image;
                           } else {
                           $product_image = "";
                           }
                           ?>
                           <?php if($key < count($latest_products)): ?>
                           <div class="block-products-carousel__cell">
                              <div class="product-card product-card--hidden-actions">
                                 <button class="product-card__quickview" value="<?php echo e($latest_products[$key]->id); ?>" type="button">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                 </div>
                                 <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $latest_products[$key]->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('/uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $latest_products[$key]->slug)); ?>"><?php echo e($latest_products[$key]->name); ?></a></div>                                   
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
                                       <button class="btn btn-primary add-cart product-card__addtocart add-cart" value="<?php echo e($latest_products[$key]->id); ?>" type="button">Add To Cart</button> 
                                       <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list add-cart" value="<?php echo e($latest_products[$key]->id); ?>" type="button">Add To Cart</button> 
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
                           <?php endif; ?>                           
                        </div>  
                        <?php endfor; ?>
                        <?php endif; ?>                      
                     </div>
                  </div>
               </div>
            </div>
            <!-- .block-products-carousel / end --><!-- .block-posts -->
            
            <div class="block block-brands">
               <div class="container">
                  <div class="block-brands__slider">
                     <div class="owl-carousel">
                         <?php if(!empty($brand_list)): ?>
                         <?php $__currentLoopData = $brand_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avail_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="block-brands__item"><a href="#"><img src="<?php echo e(asset('uploads/brands/Thumb-'.$avail_brand->logo)); ?>" alt=""></a></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
                            <?php if($electronic_device_product): ?>
                            <?php $__currentLoopData = $electronic_device_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $electronic_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="block-product-columns__item">
                              <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                 <button class="product-card__quickview" type="button" value="<?php echo e($electronic_prod->id); ?>">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 <?php
                                if(!empty($electronic_prod->images[0]->image)){
                                    $product_image = $electronic_prod->images[0]->image;
                                } else {
                                    $product_image = 'no_image.png';
                                }
                                ?>
                                 <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $electronic_prod->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $electronic_prod->slug)); ?>"><?php echo e($electronic_prod->name); ?></a></div>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="block-header">
                           <h3 class="block-header__title">Electronic Accessories</h3>
                           <div class="block-header__divider"></div>
                        </div>
                        <div class="block-product-columns__column">
                            <?php if($electronic_accessories_product): ?>
                            <?php $__currentLoopData = $electronic_accessories_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $electronic_acc_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="block-product-columns__item">
                              <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                 <button class="product-card__quickview" type="button" value="<?php echo e($electronic_acc_pro->id); ?>">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 <?php
                                if(!empty($electronic_acc_pro->images[0]->image)){
                                    $product_image = $electronic_acc_pro->images[0]->image;
                                } else {
                                    $product_image = 'no_image.png';
                                }
                                ?>
                                 <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $electronic_acc_pro->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $electronic_acc_pro->slug)); ?>"><?php echo e($electronic_acc_pro->name); ?></a></div>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="block-header">
                           <h3 class="block-header__title">TV and Home Appliances</h3>
                           <div class="block-header__divider"></div>
                        </div>
                        <div class="block-product-columns__column">
                            <?php if($electronic_accessories_product): ?>
                            <?php $__currentLoopData = $electronic_accessories_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $electronic_acc_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="block-product-columns__item">
                              <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                 <button class="product-card__quickview" type="button" value="<?php echo e($electronic_acc_pro->id); ?>">
                                    <svg width="16px" height="16px">
                                       <use xlink:href="frontend/images/sprite.svg#quickview-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon"></span>
                                 </button>
                                 <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                 </div>
                                 <?php
                                if(!empty($electronic_acc_pro->images[0]->image)){
                                    $product_image = $electronic_acc_pro->images[0]->image;
                                } else {
                                    $product_image = 'no_image.png';
                                }
                                ?>
                                 <div class="product-card__image product-image"><a href="<?php echo e(route('single-product', $electronic_acc_pro->slug)); ?>" class="product-image__body"><img class="product-image__img" src="<?php echo e(asset('uploads/products/Thumb-'.$product_image)); ?>" alt=""></a></div>
                                 <div class="product-card__info">
                                    <div class="product-card__name"><a href="<?php echo e(route('single-product', $electronic_acc_pro->slug)); ?>"><?php echo e($electronic_acc_pro->name); ?></a></div>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/pages/index.blade.php ENDPATH**/ ?>