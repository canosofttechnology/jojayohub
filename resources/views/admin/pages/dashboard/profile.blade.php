<div class="col-md-6 mt-lg" id="19">
    <section class="panel panel-custom menu" >
       <header class="panel-heading">
          <h3 class="panel-title">Your Detail</h3>
       </header>
       <div class="panel-body inv-slim-scroll" style="height: 437px;overflow-y: scroll;">
        <div class="card-block">
            {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
            <div class="form-group row">
                <label class="col-sm-2 control-label"><strong>Fullname</strong></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" disabled value="{{ @$user->name }}" name="name" id="name" placeholder="Enter title for the user">
                    <span class="messages"></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label"><strong>Email</strong></label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" disabled value="{{ @$user->email }}" name="email" id="email" placeholder="Unique email address">
                    <span class="messages"></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 control-label"><strong>Contact</strong> </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" disabled value="{{ @$user->contact }}" name="contact" id="contact" placeholder="Contact number">
                    <span class="messages"></span>
                </div>
            </div>

            @if ($user->roles=='employee')
                @include('admin.user.employee_profile')
            @endif

            @if ($user->roles=='vendor')
                @include('admin.user.vendor_profile',['type'=>'show'])
            @endif

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-3">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 210px;">

                            <input type="hidden" id="thumbnail">
                            <img src="{{ !empty($user->image)?$user->image:"http://placehold.it/350x260" }}" id="thumbnailholder" alt="Please Connect Your Internet">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                        <div>
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

        </div>

       </div>
    </section>
