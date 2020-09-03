@extends('frontend.layouts.master')
@section('content')
<div class="site__body">
   <div class="page-header">
      <div class="page-header__container container">
         <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="index.html">Home</a> 
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
                  <li class="breadcrumb-item active" aria-current="page">Latest News</li>
               </ol>
            </nav>
         </div>
         <div class="page-header__title">
            <h1>Latest News</h1>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-8">
            <div class="block">
               <div class="posts-view">
                  <div class="posts-view__list posts-list posts-list--layout--list">
                     <div class="posts-list__body">
                         @if($all_blogs)
                         @foreach($all_blogs as $all_post)
                        <div class="posts-list__item">
                           <div class="post-card post-card--layout--list post-card--size--nl">
                              <div class="post-card__image"><a href=""><img src="{{ asset('/uploads/blog/Thumb-'.$all_post->image) }}" alt=""></a></div>
                              <div class="post-card__info">
                                 <div class="post-card__category"><a href="">{{ $all_post->category->name }}</a></div>
                                 <div class="post-card__name"><a href="{{ route('blog-detail',$all_post->slug) }}">{{ $all_post->title }}</a></div>
                                 <div class="post-card__date">{{ date('F d, Y', strtotime($all_post->created_at)) }}</div>
                                 <div class="post-card__content">{{ $all_post->excerpt }}...</div>
                                 <div class="post-card__read-more"><a href="" class="btn btn-secondary btn-sm">Read More</a></div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        @endif
                     </div>
                  </div>
                  <div class="posts-view__pagination">
                     <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                           <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                              <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                              </svg>
                           </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="">1</a></li>
                        <li class="page-item active"><a class="page-link" href="">2 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="">3</a></li>
                        <li class="page-item">
                           <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                              <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                 <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                              </svg>
                           </a>
                        </li>
                     </ul>
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
                         @if(!empty($all_blogs))
                         @foreach($all_blogs as $post_list)
                        <div class="widget-posts__item">
                           <div class="widget-posts__image"><a href="{{ route('blog-detail',$post_list->slug) }}"><img src="{{ asset('uploads/blog/Thumb-'.$post_list->image) }}" alt=""></a></div>
                           <div class="widget-posts__info">
                              <div class="widget-posts__name"><a href="{{ route('blog-detail',$post_list->slug) }}">{{ $post_list->title }}</a></div>
                              <div class="widget-posts__date">{{ date('F d, Y', strtotime($post_list->created_at)) }}</div>
                           </div>
                        </div>
                        @endforeach
                        @endif
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
@endsection