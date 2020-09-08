
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-custom ">
                <header class="panel-heading">Add Brand</header>
                <div class="panel-body">
                <form id="data" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
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
                    <div class="form-group small-image">
                        <div class="file-upload no-dash">
                            <input type="file" id="files" name="logo" style="opacity:1">
                        </div>
                        <?php if(!empty($data->logo)): ?>
                        <span class="pip">
                            <img class="imageThumb" src="<?php echo e(asset('/uploads/brands/Thumb-'.$data->logo)); ?>">                      
                        </span>
                        <?php endif; ?>
                        <?php if($errors->has('logo')): ?>
                        <div class="col-lg-12">
                            <span class="validation-errors text-danger"><?php echo e($errors->first('logo')); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <input type="submit" name="submit" value="Add New Brand" class="btn btn-primary" id="submit">
                </form>
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
                    <?php if(!empty($allBrands)): ?>
                        <?php $__currentLoopData = $allBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brandList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($brandList->id); ?>">
                                <input type="hidden" value="<?php echo e($brandList->id); ?>">
                                <td><?php echo e($brandList->name); ?></td>
                                <td><?php echo e($brandList->slug); ?></td>
                                <td><a href="<?php echo e($brandList->logo); ?>" class="iframe-btn">View Logo</a></td>
                                <td><a href="<?php echo e(route('editBrand', $brandList->slug)); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" style="float: none;"><i class="fa fa-pencil-square-o"></i></button></a>  <button type="button" class="btn-xs btn btn-danger waves-effect waves-light table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><i class="fa fa-trash-o"></i></button> </td>
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
    <script>
        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });
    </script>
<?php echo $__env->make('admin.scripts.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/brands.blade.php ENDPATH**/ ?>