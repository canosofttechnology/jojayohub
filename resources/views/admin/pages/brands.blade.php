@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-custom ">
                <header class="panel-heading">Add Brand</header>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" required="" id="name">
                        <span class="hint">The name is how it appears on your site.</span>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" type="text" name="slug" required="" id="slug">
                        <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                    </div>
                    <div class="form-group">
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
                        @if ($errors->has('logo'))
                        <div class="col-lg-3">
                            <span class="validation-errors text-danger">{{ $errors->first('logo') }}</span>
                        </div>
                        @endif
                    </div>
                    <input type="submit" name="submit" value="Add New Brand" class="btn btn-primary" id="submit">
                </div>
            </div>
        </div>
                                    
        <div class="col-sm-8">
            <div class="panel panel-custom ">
                <header class="panel-heading">All Brands</header>
                <div class="panel-body">
                <table class="table table-striped table-bordered nowrap datatable_action">
                    <thead class="inner">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Logo</th>
                        <th>Action </th>
                    </tr>
                    </thead>
                    <tbody id="check">
                    @if(!empty($allBrands))
                        @foreach($allBrands as $key => $brandList)
                            <tr id="{{ $brandList->id }}">
                                <input type="hidden" value="{{ $brandList->id }}">
                                <td>{{ $brandList->name }}</td>
                                <td>{{ $brandList->slug }}</td>
                                <td><a href="{{ $brandList->logo }}" class="iframe-btn">View Logo</a></td>
                                <td><a href="{{ route('editBrand', $brandList->slug) }}"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>  <button type="button" class="btn-xs btn btn-danger waves-effect waves-light table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><i class="fa fa-trash-o"></i></button> </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
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
@include('admin.scripts.brands')
@endsection
