@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.front-nav')
            <form method="POST" action="{{ route('update_user', \Auth::user()->id) }}" accept-charset="UTF-8" class="form" id="address_update" enctype="multipart/form-data">
              <input name="_method" type="hidden" value="PATCH">
              @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">{{ $errors }}
                                    <label for="acc-name">Full Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control"  name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group required-field">
                                  <label for="acc-email">Email</label>
                                  <input type="email" value="{{ Auth::user()->email }}" class="form-control"  name="email" required>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-name">Phone</label>
                                    <input type="text" value="{{ Auth::user()->contact }}" class="form-control" name="contact" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2"></div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="change_password" id="change-pass-checkbox" value="1">
                    <label class="custom-control-label" for="change-pass-checkbox">Change the current Password</label>
                </div>

                <div id="account-chage-pass">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-pass2">Current Password</label>
                                <input type="password" class="form-control" id="acc-pass2" name="old_password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-pass3">Confirm Password</label>
                                <input type="password" class="form-control" id="acc-pass3" name="password">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="required text-right">* Required Field</div>
                <div class="form-footer">
                    <a href="#"><i class="icon-angle-double-left"></i>Back</a>

                    <div class="form-footer-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
        @include('frontend.layouts.customer-nav')
    </div>
</div>

<div class="mb-5"></div>
@endsection
