@extends('frontend.layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">

      @if(Session::has('warning'))
      <br>
      <div class="alert alert-warning alert-intro" role="alert">
          {{ Session::get('warning') }}
      </div>
      @endif
      <div class="login">
          <div class="login-title">
              <h3 class="text-center">Welcome to Jojayo! Please login to purchase.</h3>
          </div>
          <div>
          <form class="account-menu__form" action="{{ route('customerlogin') }}" method="POST">
            <input type="hidden" name="_token" value="fyeLFQ8D5WpqcE45GN63GsOr20XiidNAsVSXJCln">                                          
            <div class="account-menu__form-title">Log In to Your Account</div>
            <div class="form-group"><label for="header-signin-email" class="sr-only">Email address</label> 
                <input id="header-signin-email" type="email" class="form-control form-control-sm" placeholder="Email address" name="email">
            </div>
            <div class="form-group">
                <label for="header-signin-password" class="sr-only">Password</label>
                <div class="account-menu__form-forgot">
                    <input id="header-signin-password" name="password" type="password" class="form-control form-control-sm" placeholder="Password"> <a href="#" class="account-menu__form-forgot-link">Forgot?</a>
                </div>
            </div>
            <div class="form-group account-menu__form-button"><button type="submit" class="btn btn-primary btn-sm">Login</button></div>
            <div class="account-menu__form-link"><a href="">Create An Account</a></div>
            </form>

          </div>
      </div>

      <!-- <div class="ps-form--account ps-tab-root">
        @csrf
          <ul class="ps-tab-list">
              <li class="active"><a href="#sign-in">Login</a></li>
              <li><a href="#register">Register</a></li>
          </ul>
          <div class="ps-tabs">
              <form action="{{ route('customerlogin') }}" method="POST">
                @csrf
                <div class="ps-tab active" id="sign-in">
                    <div class="ps-form__content">
                        <h5>Log In Your Account</h5>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" placeholder="Username or email address">
                            @if (Session::has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ Session::get('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-forgot">
                            <input class="form-control" type="password" name="password" placeholder="Password"><a href="#">Forgot?</a>
                            @if (Session::has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ Session::get('password') }}</strong>
                                </span>
                            @endif
                        </div>                      
                        <div class="form-group submtit">
                            <button type="submit" class="ps-btn ps-btn--fullwidth">Login</button>
                        </div>
                    </div>
                    <div class="ps-form__footer">
                        <p>Connect with:</p>
                        <ul class="ps-list--social">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
              </form>
              <div class="ps-tab" id="register">
                  <div class="ps-form__content">
                      <h5>Register An Account</h5>
                      <div class="form-group">
                          <input class="form-control" type="text" placeholder="Username or email address">
                      </div>
                      <div class="form-group">
                          <input class="form-control" type="text" placeholder="Password">
                      </div>
                      <div class="form-group submtit">
                          <button class="ps-btn ps-btn--fullwidth">Login</button>
                      </div>
                  </div>
                  <div class="ps-form__footer">
                      <p>Connect with:</p>
                      <ul class="ps-list--social">
                          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div> -->
    </div>
  </div>
</div>
@endsection
