
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="<?php if($active_tab == 'manage'): ?> active <?php endif; ?>"><a href="#manage" data-toggle="tab">All Sliders</a></li>
                  <li class="<?php if($active_tab == 'create'): ?> active <?php endif; ?>"><a href="#create" data-toggle="tab">New Slider</a></li>
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
                                <th>View Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="check">
                            <?php if(!empty($all_slider)): ?> 
                            <?php $__currentLoopData = $all_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($slider_list->id); ?>">
                                <input type="hidden" value="<?php echo e($slider_list->id); ?>">
                                <td><input type="checkbox" name="delete_items" value="<?php echo e($slider_list->id); ?>"></td>
                                <td><?php echo e($slider_list->name); ?></td>
                                <td><?php echo e($slider_list->url); ?></td>
                                <td><?php echo e($slider_list->image); ?></td>
                                <td><?php echo e($slider_list->status); ?></td>
                                <td>
                                    <a href="<?php echo e(route('sliders.edit', $slider_list->id)); ?>" class="btn btn-primary btn-xs" style="margin-right: 5px">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a style="display:inline-block" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <form method="POST" action="<?php echo e(route('sliders.destroy', $slider_list->id)); ?>" accept-charset="UTF-8">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                     </div>
                  </div>
                  <div class="tab-pane <?php if($active_tab == 'create'): ?> active <?php endif; ?>" id="create">
                    <?php if(!empty($data)): ?>
                    <?php echo e(Form::open(['url'=>route('sliders.update', $data->id), 'class'=>'form-horizontal', 'id'=>'slider_add', 'files'=>true,'method'=>'patch'])); ?>

                    <?php else: ?>
                    <form action="<?php echo e(route('sliders.store')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php endif; ?>                    
                    <div class="row">                        
                        <div class="col-sm-12"> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Name</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(@$data->name); ?>" name="name" id="name" placeholder="Paste the redirect link">
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Link</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(@$data->url); ?>" name="url" id="url" placeholder="Paste the redirect link">
                            </div>
                        </div>
                        <div class="form-group medium-image">
                            <label class="col-sm-2 control-label"><strong>Image</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <div class="file-upload no-dash mt-0">
                                    <input type="file" id="files" name="image" style="opacity:1">
                                </div>
                                <?php if(!empty($data->image)): ?>
                                <span class="pip">
                                    <img class="imageThumb" src="<?php echo e(asset('/uploads/slider/Thumb-'.$data->image)); ?>">                      
                                </span>
                                <?php endif; ?>
                            </div>
                            <?php if($errors->has('image')): ?>
                            <div class="col-lg-12">
                                <span class="validation-errors text-danger"><?php echo e($errors->first('image')); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" id="add" class="btn btn-primary m-b-0 m-r-5" name="status" value="active">Add Slider</button>
                                <button type="reset" id="discard" class="btn btn-danger m-r-15" name="status" value="inactive">Discart</button>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/sliders.blade.php ENDPATH**/ ?>