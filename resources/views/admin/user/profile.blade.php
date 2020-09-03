@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-22">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#manage" data-toggle="tab">Update Profile</a></li>
                  {{-- <li class=""><a href="#create" data-toggle="tab">New User</a></li> --}}
                  {{-- <input type="hidden" id="base" value="{{ route('ajax.users') }}"> --}}
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane active" id="manage">
                        <div class="page-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-22">
                                    <div class="card">
                                        <div class="card-block">
                                            <form method="post" enctype="multipart/form-data" action="{{ route('user.profile',$data->id) }}">
                                            @csrf
                                            {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Fullname</strong> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" value="{{ @$data->name }}" name="name" id="name" placeholder="Enter title for the user">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Email</strong> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" value="{{ @$data->email }}" name="email" id="email" placeholder="Unique email address">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Password</strong> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" value="" name="password" id="password" placeholder="Type here only if you want to change the password">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Contact</strong> <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" value="{{ @$data->contact }}" name="contact" id="contact" placeholder="Contact number">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            @if ($data->roles=='employee')
                                                @include('admin.user.employee_profile')
                                            @endif

                                            @if ($data->roles=='vendor')
                                                @include('admin.user.vendor_profile')
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
                                                        <div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">
                                                                <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                                    <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                                <!-- <input type="file" name="image" value="upload" data-buttontext="Choose File" id="myImg" data-parsley-id="26"> -->
                                                                <input type="hidden" name="image" id="thumbnailthumbnail" value="{{ @$data->image }}">
                                                                <span class="fileinput-exists">Change</span>
                                                            </span>
                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </span>
                                                        </div>
                                                        <div id="valid_msg" style="color: #e11221"></div>
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
                                                    <button type="submit" class="btn btn-primary m-b-0 pull-right ml-2">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                  </div>
                  {{-- <div class="tab-pane" id="create">

                  </div> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')

@endsection
