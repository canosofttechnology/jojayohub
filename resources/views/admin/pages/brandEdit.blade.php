@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-sm-12">
     <div class="panel panel-custom ">
        <header class="panel-heading">Edit Brand</header>
        <div class="page-body">
           <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12">
                 {{ Form::open(['url'=>route('brands.update', $data->id), 'class'=>'form-horizontal', 'id'=>'update_category', 'files'=>true,'method'=>'patch']) }}
                 @if(!empty($data))
                 <div class="form-group">
                    <label class="col-lg-3 control-label"><strong>Name</strong> <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                       <input class="form-control" type="text" value="{{ $data->name }}" name="name" required="" id="name">
                       <span class="hint">The name is how it appears on your site.</span>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-lg-3 control-label"><strong>Slug</strong> <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                       <input class="form-control" type="text" value="{{ $data->slug }}" name="slug" required="" id="slug">
                       <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-lg-3 control-label"><strong>Slug</strong> <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                       <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 210px;">
                             @php
                             $logo = "http://placehold.it/170x29";
                             if(!empty($data->logo)){
                             $logo = $data->logo;
                             }
                             @endphp
                             <input type="hidden" id="thumbnail">
                             <img src="{{ $logo }}" id="thumbnailholder" alt="Please Connect Your Internet">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                          <div>
                             <span class="btn btn-default btn-file">
                             <span class="fileinput-new">
                             <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                             <i class="fa fa-picture-o"></i> Choose
                             </a>                                    
                             <input type="hidden" name="logo" id="thumbnailthumbnail" value="{{ @$data->logo }}">
                             <span class="fileinput-exists">Change</span>
                             </span>
                             <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                             </span>
                          </div>
                          <div id="valid_msg" style="color: #e11221"></div>
                       </div>
                    </div>
                    @if ($errors->has('logo'))
                    <div class="col-lg-3">
                       <span class="validation-errors text-danger">{{ $errors->first('logo') }}</span>
                    </div>
                    @endif
                 </div>
                 <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                       <input type="submit" name="submit" value="Save Changes" class="btn btn-success" id="submit">
                    </div>
                 </div>
                 @endif
                 </form>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
   $("#name").keyup(function (){
       let Slug = $('#name').val();
       document.getElementById("slug").value = convertToSlug(Slug);
   });
</script>
@endsection