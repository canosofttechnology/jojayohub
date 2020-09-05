@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-22">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#manage" data-toggle="tab">User Info</a></li>
                  @if ($data->roles=='vendor'||$data->roles=='customers')
                    <li class=""><a href="#create" data-toggle="tab">{{ isset($vendor_sales)?'Vendor Sales':'Cutomer Purchase'}}</a></li>
                    @if ($data->roles=='vendor')
                    <li class=""><a href="#products" data-toggle="tab">Products</a></li>
                    @endif

                @endif
                  {{-- <input type="hidden" id="base" value="{{ route('ajax.users') }}"> --}}
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane active" id="manage">
                        <div class="page-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-22">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Fullname</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" value="{{ @$data->name }}" readonly id="name">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Email</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" value="{{ @$data->email }}" readonly id="email">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Contact</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" value="{{ @$data->contact }}" readonly id="contact">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            @if ($data->roles=='employee')
                                                @include('admin.user.info.employee_info')
                                            @endif

                                            @if ($data->roles=='vendor')
                                                @include('admin.user.info.vendor_info')
                                            @endif
                                            @if ($data->roles=='customers')
                                                @include('admin.user.info.customer_info')
                                            @endif

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-3">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 210px;">

                                                            <input type="hidden" id="thumbnail">
                                                            <img src="{{ !empty($data->image)?$data->image:"http://placehold.it/350x260" }}" id="thumbnailholder" alt="Please Connect Your Internet">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                                                    </div>
                                                </div>
                                                @if ($errors->has('image'))
                                                <div class="col-lg-3">
                                                    <span class="validation-errors text-danger">{{ $errors->first('image') }}</span>
                                                </div>
                                                @endif
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-8">
                                                    <a href="{{route('users.index')}}">
                                                        <button type="submit" class="btn btn-primary m-b-0 pull-right ml-2">Back</button>
                                                    </a>

                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                  </div>

                  <div class="tab-pane" id="create">
                      @if ($data->roles=='vendor')
                          @include('admin.user.info.vendor_sales')
                      @endif
                      @if ($data->roles=='customers')
                          @include('admin.user.info.customer_purchases')
                      @endif
                  </div>
                  @if ($data->roles=='vendor')
                    <div class="tab-pane" id="products">
                        @include('admin.user.info.vendor_product')
                    </div>
                  @endif

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')

@endsection
