<div class="quickview">
   <button class="quickview__close" type="button">
      <svg width="20px" height="20px">
         <use xlink:href="/frontend/images/sprite.svg#cross-20"></use>
      </svg>
   </button>
   <div class="product product--layout--quickview" data-layout="quickview">
      <div class="product__content">
         <!-- .product__gallery -->
         <div class="product__gallery">
            <div class="product-gallery">
               <div class="product-gallery__featured">
                  <button class="product-gallery__zoom">
                     <svg width="24px" height="24px">
                        <use xlink:href="images/sprite.svg#zoom-in-24"></use>
                     </svg>
                  </button>
                  <div class="owl-carousel owl-loaded owl-drag" id="product-image">
                     <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2430px;">
                            <?php if(!empty($data->images)): ?>
                            <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="owl-item active" style="width: 486px;">
                              <div class="product-image product-image--location--gallery">
                                 <!--
                                    The data-width and data-height attributes must contain the size of a larger version
                                    of the product image.
                                    
                                    If you do not know the image size, you can remove the data-width and data-height
                                    attribute, in which case the width and height will be obtained from the naturalWidth
                                    and naturalHeight property of img.product-image__img.
                                    --> <a href="<?php echo e(asset('uploads/products/Thumb-'.$product_images->image)); ?>" data-width="700" data-height="700" class="product-image__body" target="_blank"><img class="product-image__img" src="<?php echo e(asset('uploads/products/Thumb-'.$product_images->image)); ?>" alt=""></a>
                              </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                     </div>
                     <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                     <div class="owl-dots disabled"></div>
                  </div>
               </div>
               <div class="product-gallery__carousel">
                  <div class="owl-carousel owl-loaded owl-drag" id="product-carousel">
                     <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 500px;">
                            <?php if(!empty($data->images)): ?>
                            <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="owl-item active" style="width: 90px; margin-right: 10px;">
                                <a href="<?php echo e(asset('uploads/products/Thumb-'.$product_images->image)); ?>" class="product-image product-gallery__carousel-item product-gallery__carousel-item--active">
                                    <div class="product-image__body"><img class="product-image__img product-gallery__carousel-image" src="<?php echo e(asset('uploads/products/Thumb-'.$product_images->image)); ?>" alt=""></div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                     </div>
                     <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                     <div class="owl-dots disabled"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- .product__gallery / end --><!-- .product__info -->
         <div class="product__info">
            <div class="product__wishlist-compare">
               <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                  <svg width="16px" height="16px">
                     <use xlink:href="images/sprite.svg#wishlist-16"></use>
                  </svg>
               </button>
               <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                  <svg width="16px" height="16px">
                     <use xlink:href="images/sprite.svg#compare-16"></use>
                  </svg>
               </button>
            </div>
            <h1 class="product__name"><?php echo e($data->name); ?></h1>
            <div class="product__rating">
               <div class="product__rating-stars">
                  <div class="rating">
                     <div class="rating__body">
                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                           <g class="rating__fill">
                              <use xlink:href="images/sprite.svg#star-normal"></use>
                           </g>
                           <g class="rating__stroke">
                              <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                              <use xlink:href="images/sprite.svg#star-normal"></use>
                           </g>
                           <g class="rating__stroke">
                              <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                              <use xlink:href="images/sprite.svg#star-normal"></use>
                           </g>
                           <g class="rating__stroke">
                              <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                              <use xlink:href="images/sprite.svg#star-normal"></use>
                           </g>
                           <g class="rating__stroke">
                              <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
               <!-- <div class="product__rating-legend"><a href="">7 Reviews</a><span>/</span><a href="">Write A Review</a></div> -->
            </div>
            <div class="product__description"><?php echo $data->description; ?></div>
            <ul class="product__features">
               <li>Speed: 750 RPM</li>
               <li>Power Source: Cordless-Electric</li>
               <li>Battery Cell Type: Lithium</li>
               <li>Voltage: 20 Volts</li>
               <li>Battery Capacity: 2 Ah</li>
            </ul>
            <ul class="product__meta">
               <li class="product__meta-availability">Availability: <span class="text-success">In Stock</span></li>
               <li>Brand: <a href="">Wakita</a></li>
               <li>SKU: 83690/32</li>
            </ul>
         </div>
         <!-- .product__info / end --><!-- .product__sidebar -->
         <div class="product__sidebar">
            <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>
            <!-- .product__options -->
            <form class="product__options">
               <div class="form-group product__option">
                  <label class="product__option-label">Color</label>
                  <div class="input-radio-color">
                    <div class="input-radio-color__list">
                        <?php
                        $unique_product_colors = $data->colors->unique('color_id');
                        ?>
                        <?php if(!empty($unique_product_colors)): ?>
                            <?php $__currentLoopData = $unique_product_colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="input-radio-color__item input-radio-color__item--white" style="color: <?php echo e($color_data->colorInfo->name); ?>;" data-toggle="tooltip" title="White"><input type="radio" name="color"> <span></span></label> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>                                              
                    </div>
                  </div>
               </div>
               <div class="form-group product__option">                  
                  <div class="product__actions">                     
                     <div class="product__actions-item product__actions-item--addtocart"><button class="btn btn-primary btn-lg">Add to cart</button></div>                     
                  </div>
               </div>
            </form>
            <!-- .product__options / end -->
         </div>
         <!-- .product__end -->
         <div class="product__footer">
            <div class="product__share-links share-links">
               <ul class="share-links__list">
                  <li class="share-links__item share-links__item--type--like"><a href="">Like</a></li>
                  <li class="share-links__item share-links__item--type--tweet"><a href="">Tweet</a></li>
                  <li class="share-links__item share-links__item--type--pin"><a href="">Pin It</a></li>
                  <li class="share-links__item share-links__item--type--counter"><a href="">4K</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/pages/quick.blade.php ENDPATH**/ ?>