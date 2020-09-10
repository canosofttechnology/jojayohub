@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.front-nav')
            <form method="POST" action="{{ route('customer.changepassword') }}" accept-charset="UTF-8" class="form" id="address_update" enctype="multipart/form-data">
              <input name="_method" type="hidden" value="PATCH">
              @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required-field">
                                    <label for="acc-name">Current Password <span class="text-danger">*</span></label>
                                    <input type="password" value="" class="form-control"  name="current_password" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mb-2"></div>


                <div id="account-chage-pass">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-pass2">New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="acc-pass2" name="password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-pass3">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="acc-pass3" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="required text-right">* Required Field</div>
                <div class="form-footer">
                    {{-- <a href="#"><i class="icon-angle-double-left"></i>Back</a> --}}

                    <div class="form-footer-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        @include('frontend.layouts.customer-nav')
    </div>
</div>

<div class="mb-5"></div>
@endsection
