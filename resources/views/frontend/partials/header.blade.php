<!DOCTYPE html>
<html lang="en" dir="ltr">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="format-detection" content="telephone=no">
      <title>Jojayohub | Wholesale shop for retail stores</title>
      <link rel="icon" type="image/png" href="frontend/images/favicon.png">
      <!-- fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
      <!-- css -->
      <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
      <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
      <link rel="stylesheet" href="/frontend/css/photoswipe.css">
      <link rel="stylesheet" href="/frontend/css/default-skin.css">
      <link rel="stylesheet" href="/frontend/css/select2.min.css">
      <link rel="stylesheet" href="/frontend/css/style.css">
      <!-- font - fontawesome -->
      <link rel="stylesheet" href="/frontend/css/all.min.css">
      <link rel="stylesheet" href="/admin/css/toastr.min.css">
      <!-- font - stroyka -->
      <link rel="stylesheet" href="/frontend/css/stroyka.css">


   </head>
   <body>
      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="111686237325677"
  theme_color="#682F90"
  logged_in_greeting="Hi! Welcome to Jojayohub. It 's nice to see you!"
  logged_out_greeting="Hi! Welcome to Jojayohub. It 's nice to see you!">
      </div>
    <!-- Load Facebook SDK for JavaScript -->

      <!-- site -->
      <div class="site">
         <!-- mobile site__header -->
         <header class="site__header d-lg-none">
            <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
            <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
               <div class="mobile-header__panel">
                  <div class="container">
                     <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                           <svg width="18px" height="14px">
                              <use xlink:href="frontend/images/sprite.svg#menu-18x14"></use>
                           </svg>
                        </button>
                        <a class="mobile-header__logo" href="{{ url('/') }}">
                           <!-- mobile-logo -->
                           <img src="{{ $sensitive_data->logo }}" alt="">
                           <!-- mobile-logo / end -->
                        </a>
                        <div class="search search--location--mobile-header mobile-header__search">
                           <div class="search__body">
                              <form class="search__form" action="#">
                                 <input class="search__input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                                 <button class="search__button search__button--type--submit" type="submit">
                                    <svg width="20px" height="20px">
                                       <use xlink:href="frontend/images/sprite.svg#search-20"></use>
                                    </svg>
                                 </button>
                                 <button class="search__button search__button--type--close" type="button">
                                    <svg width="20px" height="20px">
                                       <use xlink:href="frontend/images/sprite.svg#cross-20"></use>
                                    </svg>
                                 </button>
                                 <div class="search__border"></div>
                              </form>
                              <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                           </div>
                        </div>
                        <div class="mobile-header__indicators">
                           <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                              <button class="indicator__button">
                                 <span class="indicator__area">
                                    <svg width="20px" height="20px">
                                       <use xlink:href="/frontend/images/sprite.svg#search-20"></use>
                                    </svg>
                                 </span>
                              </button>
                           </div>

                           <div class="indicator indicator--mobile">
                              <a href="cart.html" class="indicator__button">
                                 <span class="indicator__area">
                                    <svg width="20px" height="20px">
                                       <use xlink:href="/frontend/images/sprite.svg#cart-20"></use>
                                    </svg>
                                    <span class="indicator__value">3</span>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- mobile site__header / end --><!-- desktop site__header -->
         <header class="site__header d-lg-block d-none">
            <div class="site-header">
               <!-- .topbar -->

               <!-- .topbar / end -->
               <div class="site-header__middle container">
                  <div class="site-header__logo">
                     <a href="{{ url('/') }}">
                        <!-- logo -->
                        <img src="{{ $sensitive_data->logo }}" alt="">
                        <!-- logo / end -->
                     </a>
                  </div>
                  <div class="site-header__search">
                     <div class="search search--location--header">
                        <div class="search__body">
                           <form class="search__form" action="#">
                              <input class="search__input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                              <button class="search__button search__button--type--submit" type="submit">
                                 <svg width="20px" height="20px">
                                    <use xlink:href="frontend/images/sprite.svg#search-20"></use>
                                 </svg>
                              </button>
                              <div class="search__border"></div>
                           </form>
                           <div class="search__suggestions suggestions suggestions--location--header"></div>
                        </div>
                     </div>
                  </div>
                  <div class="site-header__phone">
                     <div class="site-header__phone-title">Customer Service</div>
                     <div class="site-header__phone-number">{{ $sensitive_data->landline }}</div>
                  </div>
               </div>
               <div class="site-header__nav-panel">
                  <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                  <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
                     <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                           <div class="nav-panel__departments">
                              <!-- .departments -->
                              @php
                              $class = "";
                              if(Request::segment(1) == ''){
                                 $class = "departments--open departments--fixed";
                              }
                              @endphp
                              <div class="departments {{ $class }}" data-departments-fixed-by=".block-slideshow">
                                 <div class="departments__body">
                                    <div class="departments__links-wrapper">
                                       <div class="departments__submenus-container"></div>
                                       <ul class="departments__links">
                                       @if(!empty($primary_categories))
                                       @foreach($primary_categories as $prime)
                                       @if($prime->secondaryCategories->count() > 0)
                                          <li class="departments__item">
                                             <a class="departments__item-link" href="#">
                                             {{ $prime->name }}
                                                <svg class="departments__item-arrow" width="6px" height="9px">
                                                   <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                </svg>
                                             </a>
                                             <div class="departments__submenu departments__submenu--type--menu">
                                                <!-- .menu -->
                                                <div class="menu menu--layout--classic">
                                                   <div class="menu__submenus-container"></div>
                                                   <ul class="menu__list">
                                                   @foreach($prime->secondaryCategories as $secondary)
                                                   @if($secondary->FinalCategory->count() > 0)
                                                   <?php
                                                   $secondary->name = str_replace("Women's", "", $secondary->name);
                                                   $secondary->name = str_replace("Men's", "", $secondary->name);
                                                   ?>
                                                      <li class="menu__item">
                                                         <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                         <div class="menu__item-submenu-offset"></div>
                                                         <a class="menu__item-link" href="{{route('categories',$secondary->slug)}}">
                                                            {{ $secondary->name }}
                                                            <svg class="menu__item-arrow" width="6px" height="9px">
                                                               <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                            </svg>
                                                         </a>
                                                         <div class="menu__submenu" style="top:0px">
                                                            <!-- .menu -->
                                                            <div class="menu menu--layout--classic">
                                                               <div class="menu__submenus-container"></div>
                                                               <ul class="menu__list">
                                                                  @foreach($secondary->FinalCategory as $final_cat)
                                                                  <?php
                                                                  $final_cat->name = str_replace("Women's", "", $final_cat->name);
                                                                  $final_cat->name = str_replace("Men's", "", $final_cat->name);
                                                                  ?>
                                                                  <li class="menu__item">
                                                                     <div class="menu__item-submenu-offset"></div>
                                                                     <a class="menu__item-link" href="{{ route('categories.sec', [$secondary->slug,$final_cat->slug]) }}">{{ $final_cat->name }}</a>
                                                                  </li>
                                                                  @endforeach
                                                               </ul>
                                                            </div>
                                                            <!-- .menu / end -->
                                                         </div>
                                                      </li>
                                                   @else
                                                      <li class="menu__item">
                                                         <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                         <div class="menu__item-submenu-offset"></div>
                                                         <a class="menu__item-link" href="{{route('categories',$secondary->slug)}}">{{ $secondary->name }}</a>
                                                      </li>
                                                      @endif
                                                   @endforeach
                                                   </ul>
                                                </div>
                                                <!-- .menu / end -->
                                             </div>
                                          </li>
                                       @endif
                                       @endforeach
                                       @endif
                                       </ul>
                                    </div>
                                 </div>
                                 <button class="departments__button">
                                    <svg class="departments__button-icon" width="18px" height="14px">
                                       <use xlink:href="/frontend/images/sprite.svg#menu-18x14"></use>
                                    </svg>
                                    Shop By Category
                                    <svg class="departments__button-arrow" width="9px" height="6px">
                                       <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-9x6"></use>
                                    </svg>
                                 </button>
                              </div>
                              <!-- .departments / end -->
                           </div>
                           <!-- .nav-links -->
                           <div class="nav-panel__nav-links nav-links">
                              <ul class="nav-links__list">
                                 <li class="nav-links__item">
                                    <a class="nav-links__item-link" href="{{ url('/') }}">
                                       <div class="nav-links__item-body">Home</div>
                                    </a>
                                 </li>
                                 <li class="nav-links__item">
                                    <a class="nav-links__item-link" href="{{ url('/shop') }}">
                                       <div class="nav-links__item-body">Shop</div>
                                    </a>
                                 </li>
                                 @if(!empty($header_menu))
                                 @foreach($header_menu as $head)
                                 <li class="nav-links__item">
                                    <a class="nav-links__item-link" href="{{ route('pageDetail',$head->slug) }}">
                                       <div class="nav-links__item-body">{{ $head->title }}</div>
                                    </a>
                                 </li>
                                 @endforeach
                                 @endif
                              </ul>
                           </div>
                           <!-- .nav-links / end -->
                           <div class="nav-panel__indicators">
                              <div class="indicator indicator--trigger--click">
                                 <a href="{{ url('/cart') }}" class="indicator__button">
                                    <span class="indicator__area">
                                       <svg width="20px" height="20px">
                                          <use xlink:href="/frontend/images/sprite.svg#cart-20"></use>
                                       </svg>
                                       <span class="indicator__value indicator__cart">{{ Cart::content()->count() }}</span>
                                    </span>
                                 </a>
                                 <div class="indicator__dropdown">
                                    <div class="dropcart dropcart--style--dropdown">
                                       <div class="dropcart__body">
                                          <div class="dropcart__products-list">
                                             @if(!empty(Cart::content()))
                                             @foreach(Cart::content() as $row)
                                             <div class="dropcart__product">
                                                <div class="product-image dropcart__product-image"><a href="{{ route('single-product', $row->options->slug) }}" class="product-image__body"><img class="product-image__img" src="{{ $row->options->image }}" alt="" style="width:70px"></a></div>
                                                <div class="dropcart__product-info">
                                                   <div class="dropcart__product-name"><a href="{{ route('single-product', $row->options->slug) }}">{{ $row->name }}</a></div>
                                                   <div class="dropcart__product-meta"></div>
                                                </div>
                                                <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                   <svg width="10px" height="10px">
                                                      <use xlink:href="/frontend/images/sprite.svg#cross-10"></use>
                                                   </svg>
                                                </button>
                                             </div>
                                             @endforeach
                                             @endif
                                          </div>
                                          <div class="dropcart__buttons"> <a class="btn btn-primary" href="{{ url('/cart') }}">Checkout</a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="indicator indicator--trigger--click">
                                 <a href="account-login.html" class="indicator__button">
                                    <span class="indicator__area">
                                       <svg width="20px" height="20px">
                                          <use xlink:href="/frontend/images/sprite.svg#person-20"></use>
                                       </svg>
                                    </span>
                                 </a>
                                 <div class="indicator__dropdown">
                                    <div class="account-menu">

                                       @if(!empty(Auth::user()) && Auth::user()->roles == 'customers')
                                       <div class="account-menu__divider"></div>
                                       <a href="account-dashboard.html" class="account-menu__user">
                                          <div class="account-menu__user-avatar"><img src="{{ Auth::user()->image }}" alt=""></div>
                                          <div class="account-menu__user-info">
                                             <div class="account-menu__user-name">{{ Auth::user()->name }}</div>
                                             <div class="account-menu__user-email">{{ Auth::user()->email }}</div>
                                          </div>
                                       </a>
                                       <div class="account-menu__divider"></div>
                                       <ul class="account-menu__links">
                                          <li><a href="account-profile.html">Edit Profile</a></li>
                                          <li><a href="account-orders.html">Order History</a></li>
                                          <li><a href="account-addresses.html">Addresses</a></li>
                                          <li><a href="account-password.html">Password</a></li>
                                       </ul>
                                       <div class="account-menu__divider"></div>
                                       <ul class="account-menu__links">
                                          <li><a href="{{ route('logout') }}">Logout</a></li>
                                       </ul>
                                       @else
                                       <form class="account-menu__form" action="{{ route('customerlogin') }}" method="POST">
                                          @csrf
                                          <div class="account-menu__form-title">Log In to Your Account</div>
                                          <div class="form-group"><label for="header-signin-email" class="sr-only">Email address</label>
                                          <input id="header-signin-email" type="email" class="form-control form-control-sm" placeholder="Email address" name="email"></div>
                                          <div class="form-group">
                                             <label for="header-signin-password" class="sr-only">Password</label>
                                             <div class="account-menu__form-forgot">
                                             <input id="header-signin-password" name="password" type="password" class="form-control form-control-sm" placeholder="Password"> <a href="#" class="account-menu__form-forgot-link">Forgot?</a></div>
                                          </div>
                                          <div class="form-group account-menu__form-button"><button type="submit" class="btn btn-primary btn-sm">Login</button></div>
                                          <div class="account-menu__form-link"><a href="">Create An Account</a></div>
                                       </form>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
