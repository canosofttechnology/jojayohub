
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="<?php if($active_tab == 'manage'): ?> active <?php endif; ?>"><a href="#manage" data-toggle="tab">All Pages</a></li>
                  <li class="<?php if($active_tab == 'create'): ?> active <?php endif; ?>"><a href="#create" data-toggle="tab">New Page</a></li>
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane <?php if($active_tab == 'manage'): ?> active <?php endif; ?>" id="manage">
                     <div class="table-responsive">
                     <table class="table table-striped datatable_action table-bordered dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="check">
                            <?php if(!empty($all_pages)): ?> <?php $__currentLoopData = $all_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page_lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($page_lists->id); ?>">
                                <input type="hidden" value="<?php echo e($page_lists->id); ?>">
                                <td><input type="checkbox" name="delete_items" value="<?php echo e($page_lists->id); ?>"></td>
                                <td><?php echo e($page_lists->title); ?></td>
                                <td><?php echo e($page_lists->excerpt); ?></td>
                                <td><?php echo e($page_lists->status); ?></td>
                                <td>
                                <a href="<?php echo e(route('page.edit', $page_lists->id)); ?>" class="btn btn-primary btn-xs" style="margin-right: 5px">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this page?')" style="display:inline-block">
                                    <form method="POST" action="<?php echo e(route('page.destroy', $page_lists->id)); ?>" accept-charset="UTF-8">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </a>
                            </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                        </tbody>
                    </table>
                     </div>
                  </div>
                  <div class="tab-pane <?php if($active_tab == 'create'): ?> active <?php endif; ?>" id="create">
                    <?php if(empty($data)): ?>
                     <form action="<?php echo e(route('page.store')); ?>" method="POST" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <?php else: ?>
                    <?php echo e(Form::open(['url'=>route('page.update', $data->id), 'class'=>'form-horizontal', 'id'=>'product_update', 'files'=>true,'method'=>'patch'])); ?>

                    <?php endif; ?>
                    <div class="row">                        
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Name</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('title', @$data->title)); ?>" name="title" id="name" placeholder="Enter title for the page">
                                <?php if($errors->has('title')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('title')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Slug</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('slug', @$data->slug)); ?>" name="slug" id="slug" placeholder="Paste the slug for the page">
                                <?php if($errors->has('slug')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('slug')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Excerpt</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="excerpt" rows="5" class="form-control"><?php echo e(old('excerpt', @$data->excerpt)); ?></textarea>
                                <?php if($errors->has('excerpt')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('excerpt')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Description</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control editor" id="description"><?php echo e(old('description', @$data->description)); ?></textarea>
                                <?php if($errors->has('description')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('description')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Location</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="location">
                                    <option value="header" <?php if(old('location') == 'header' || @$data->location == 'header'): ?> 'selected' : '' <?php endif; ?>>Header</option>
                                    <option value="footer" <?php if(old('location') == 'footer' || @$data->location == 'footer'): ?> 'selected' : '' <?php endif; ?>>Footer</option>
                                    <option value="both" <?php if(old('location') == 'both' || @$data->location == 'both'): ?> 'selected' : '' <?php endif; ?>>Header and Footer</option>
                                </select>
                                <?php if($errors->has('location')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('location')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Priority</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(@$data->priority); ?>" name="priority" id="name" placeholder="Position the page to be">
                                <?php if($errors->has('priority')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('priority')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><strong>Status</strong> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                <span class="validation-errors text-danger"><?php echo e($errors->first('status')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" id="add" class="btn btn-primary m-b-0 m-r-5">Add Page</button>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/pages.blade.php ENDPATH**/ ?>