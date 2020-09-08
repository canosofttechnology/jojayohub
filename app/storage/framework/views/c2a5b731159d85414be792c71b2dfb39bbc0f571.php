 <?php $__env->startSection('content'); ?>
<!-- desktop site__header / end --><!-- site__body -->
<div class="site__body">
   <div class="page-header">
      <div class="page-header__container container">
         <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="<?php echo e(url('/')); ?>">Home</a> 
                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                     </svg>
                  </li>
                  <li class="breadcrumb-item">
                     <a href=""><?php echo e($blog_detail->category->name); ?></a> 
                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                     </svg>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo e($blog_detail->title); ?></li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-8">
            <div class="block post post--layout--classic">
               <div class="post__header post-header post-header--layout--classic">
                  <div class="post-header__categories"><a href=""><?php echo e($blog_detail->category->name); ?></a></div>
                  <h1 class="post-header__title"><?php echo e($blog_detail->title); ?></h1>
                  <div class="post-header__meta">
                     <div class="post-header__meta-item">By <a href="">Jessica Moore</a></div>
                     <div class="post-header__meta-item"><a href="">November 30, 2018</a></div>
                     <div class="post-header__meta-item"><a href="">4 Comments</a></div>
                  </div>
               </div>
               <div class="post__featured"><a href=""><img src="<?php echo e(asset('/uploads/blog/Thumb-'.$blog_detail->image)); ?>" alt=""></a></div>
               <div class="post__content typography">
                  <?php echo $blog_detail->description; ?>

               </div>
               <div class="post__footer">
                  <div class="post__tags-share-links">
                     <div class="post__share-links share-links">
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
         </div>
         <div class="col-12 col-lg-4">
            <div class="block block-sidebar block-sidebar--position--end">
               <div class="block-sidebar__item">
                  <div class="widget-search">
                     <form class="widget-search__body">
                        <input class="widget-search__input" placeholder="Blog search..." type="text" autocomplete="off" spellcheck="false"> 
                        <button class="widget-search__button" type="submit">
                           <svg width="20px" height="20px">
                              <use xlink:href="images/sprite.svg#search-20"></use>
                           </svg>
                        </button>
                     </form>
                  </div>
               </div>
               <div class="block-sidebar__item">
                  <div class="widget-categories widget-categories--location--blog widget">
                     <h4 class="widget__title">Categories</h4>
                     <ul class="widget-categories__list" data-collapse data-collapse-opened-class="widget-categories__item--open">
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Latest News
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Special Offers 
                              </a>
                              <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                           </div>
                           <div class="widget-categories__subs" data-collapse-content>
                              <ul>
                                 <li><a href="">Spring Sales</a></li>
                                 <li><a href="">Summer Sales</a></li>
                                 <li><a href="">Autumn Sales</a></li>
                                 <li><a href="">Christmas Sales</a></li>
                                 <li><a href="">Other Sales</a></li>
                              </ul>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 New Arrivals
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Reviews
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Drills and Mixers
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Cordless Screwdrivers
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Screwdrivers
                              </a>
                           </div>
                        </li>
                        <li class="widget-categories__item" data-collapse-item>
                           <div class="widget-categories__row">
                              <a href="">
                                 <svg class="widget-categories__arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                 </svg>
                                 Wrenches
                              </a>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="block-sidebar__item">
                  <div class="widget-posts widget">
                     <h4 class="widget__title">Latest Posts</h4>
                     <div class="widget-posts__list">
                         <?php if(!empty($all_blogs)): ?>
                         <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="widget-posts__item">
                           <div class="widget-posts__image"><a href=""><img src="<?php echo e(asset('/uploads/blog/Thumb-'.$post_detail->image)); ?>" alt=""></a></div>
                           <div class="widget-posts__info">
                              <div class="widget-posts__name"><a href="<?php echo e(route('blog-detail',$post_detail->slug)); ?>"><?php echo e($post_detail->title); ?></a></div>
                              <div class="widget-posts__date"><?php echo e(date('F d, Y', strtotime($post_detail->created_at))); ?></div>
                           </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <div class="block-sidebar__item">
                  <div class="widget-newsletter widget">
                     <h4 class="widget-newsletter__title">Our Newsletter</h4>
                     <div class="widget-newsletter__text">Phasellus eleifend sapien felis, at sollicitudin arcu semper mattis. Mauris quis mi quis ipsum tristique lobortis. Nulla vitae est blandit rutrum.</div>
                     <form class="widget-newsletter__form" action=""><label for="widget-newsletter-email" class="sr-only">Email Address</label> <input id="widget-newsletter-email" type="text" class="form-control" placeholder="Email Address"> <button type="submit" class="btn btn-primary mt-3">Subscribe</button></form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>