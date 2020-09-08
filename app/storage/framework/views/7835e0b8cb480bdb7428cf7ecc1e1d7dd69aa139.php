
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-custom ">
                <header class="panel-heading">Add Primary Category</header>
                <div class="panel-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" required="" id="name">
                    <span class="hint">The name is how it appears on your site.</span>
                </div>
                <div class="form-group">
                    <label>Icon <strong><a href="https://fontawesome.com/icons?d=gallery" target="_blank">(FontAwesome Gallery)</a></strong></label>
                    <input class="form-control" type="text" name="icon" id="icon">
                    <span class="hint">Icon to be displayed in the Primary menu</span>
                </div>
                <input type="submit" name="submit" value="Add New Category" class="btn btn-primary" id="submit">
                </div>
            </div>
        </div>
                                    
        <div class="col-sm-8">
            <div class="panel panel-custom ">
                <header class="panel-heading">All Primary Categories</header>
                <div class="panel-body">
                <table class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                    <thead class="inner">
                    <tr>
                        <th>Name</th>
                        <th>Action </th>
                    </tr>
                    </thead>
                    <tbody id="check">
                    <?php if(!empty($allCategories)): ?>
                        <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categoryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($categoryList->id); ?>">
                                <input type="hidden" value="<?php echo e($categoryList->id); ?>">
                                <td><?php echo e($categoryList->name); ?></td>
                                <td><a href="<?php echo e(route('primary_categories.edit', $categoryList->id)); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>  <button type="button" class="btn-xs btn btn-danger waves-effect waves-light table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><i class="fa fa-trash-o"></i></button> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.scripts.primary_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/primary.blade.php ENDPATH**/ ?>