
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="<?php if($active_tab == 'manage'): ?> active <?php endif; ?>"><a href="#manage" data-toggle="tab">All Ads</a></li>
                  <li class="<?php if($active_tab == 'create'): ?> active <?php endif; ?>"><a href="#create" data-toggle="tab">New Ad</a></li>
                  <input type="hidden" id="base" value="<?php echo e(route('ajax.categories')); ?>">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane <?php if($active_tab == 'manage'): ?> active <?php endif; ?>" id="manage">
                     <div class="table-responsive">
                     <table class="table table-striped datatable_action table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="check">
                            <?php if(!empty($all_ads)): ?> <?php $__currentLoopData = $all_ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ad_lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($ad_lists->id); ?>">
                                <input type="hidden" value="<?php echo e($ad_lists->id); ?>">
                                <td><input type="checkbox" name="delete_items" value="<?php echo e($ad_lists->id); ?>"></td>
                                <td><?php echo e($ad_lists->title); ?></td>
                                <td><?php echo e($ad_lists->url); ?></td>
                                <td><?php echo e($ad_lists->start_date); ?></td>
                                <td><?php echo e($ad_lists->end_date); ?></td>
                                <td><?php echo e($ad_lists->status); ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs edit" value="<?php echo e($ad_lists->id); ?>" style="float: none;"><i class="fa fa-pencil-square-o"></i></button>
                                    <button type="button" class="btn-xs btn btn-danger table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                        </tbody>
                    </table>
                     </div>
                  </div>
                  <div class="tab-pane <?php if($active_tab == 'create'): ?> active <?php endif; ?>" id="create">
                  <form action="<?php echo e(route('ads.store')); ?>" method="POST" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <div class="row">                        
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Name</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(@$data->title); ?>" name="title" id="name" placeholder="Enter title of the ad">                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Link</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(@$data->link); ?>" name="url" id="link" placeholder="Paste the redirect link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Start Date</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?php echo e(@$data->start_date); ?>" name="start_date" id="start_date" placeholder="Enter ads starting date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>End Date</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?php echo e(@$data->end_date); ?>" name="end_date" id="end_date" placeholder="Enter ads ending date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Ad location</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="place">
                                    <option>Option A</option>
                                    <option>Option B</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Ad banner</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 210px;">
                                    <?php
                                    $image = "http://placehold.it/350x260";
                                    if(!empty($data->image)){
                                        $image = $data->image;
                                    }
                                    ?>
                                        <input type="hidden" id="thumbnail">
                                        <img src="<?php echo e($image); ?>" id="thumbnailholder" alt="Please Connect Your Internet">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                                    <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">
                                            <a href="<?php echo e(url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6')); ?>" class="btn iframe-btn btn-primary" type="button">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                            <!-- <input type="file" name="image" value="upload" data-buttontext="Choose File" id="myImg" data-parsley-id="26"> -->
                                            <input type="hidden" name="image" id="thumbnailthumbnail" value="<?php echo e(@$data->image); ?>">
                                            <span class="fileinput-exists">Change</span>
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </span>
                                    </div>
                                    <div id="valid_msg" style="color: #e11221"></div>
                                </div>
                            </div>
                            <?php if($errors->has('image')): ?>
                            <div class="col-lg-3">
                                <span class="validation-errors text-danger"><?php echo e($errors->first('image')); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" id="add" class="btn btn-primary m-b-0 m-r-5">Add Ads</button>
                                <button type="reset" id="discard" class="btn btn-danger m-r-15">Discart</button>
                            </div>
                        </div>

                    </div>              
                </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $('#add_row').hide();
    $('#new').on('click', function() {
        $('#add_row').slideDown(1000);
        $('#new').hide("slide", {
            direction: "right"
        }, 1000);
    });
    $('.edit').on('click', function() {
        let id = $(this).attr("value");
        var editurl = '<?php echo e(route("ads.edit", ":data")); ?>';
        var link = '<?php echo e(route("ads.update", ":data")); ?>';
        editurl = editurl.replace(':data', id);
        link = link.replace(':data', id);
        $.ajax({
            url: editurl,
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                $('#name').val(response.title);
                $('#link').val(response.url);
                $('#start_date').val(response.start_date);
                $('#end_date').val(response.end_date);
                $('#thumbnail').val(response.image);
                $('#holder').attr('src', response.image);
                $('form').attr('action', link);
                $('#add').text('Update Ads');
                $('input:hidden').after('<input name="_method" type="hidden" value="PATCH">');
                $('#add_row').slideDown(1000);
                $('#new').hide("slide", {
                    direction: "right"
                }, 1000);
            },
        });
    });
    $('#discard').on('click', function() {
        $('#add_row').slideUp(1000);
        $('#new').show("slide", {
            direction: "right"
        }, 1000);
    })
</script>
<?php echo $__env->make('admin.scripts.post_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/ads.blade.php ENDPATH**/ ?>