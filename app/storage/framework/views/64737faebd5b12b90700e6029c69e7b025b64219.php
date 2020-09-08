
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-22">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#manage" data-toggle="tab">User Info</a></li>
                  <?php if($data->roles=='vendor'||$data->roles=='customers'): ?>
                    <li class=""><a href="#create" data-toggle="tab"><?php echo e(isset($vendor_sales)?'Vendor Sales':'Cutomer Purchase'); ?></a></li>
                <?php endif; ?>
                  
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
                                                    <input type="text" class="form-control" value="<?php echo e(@$data->name); ?>" readonly id="name">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Email</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" value="<?php echo e(@$data->email); ?>" readonly id="email">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label"><strong>Contact</strong></label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" value="<?php echo e(@$data->contact); ?>" readonly id="contact">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <?php if($data->roles=='employee'): ?>
                                                <?php echo $__env->make('admin.user.info.employee_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>

                                            <?php if($data->roles=='vendor'): ?>
                                                <?php echo $__env->make('admin.user.info.vendor_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-3">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 210px;">

                                                            <input type="hidden" id="thumbnail">
                                                            <img src="<?php echo e(!empty($data->image)?$data->image:"http://placehold.it/350x260"); ?>" id="thumbnailholder" alt="Please Connect Your Internet">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                                                    </div>
                                                </div>
                                                <?php if($errors->has('image')): ?>
                                                <div class="col-lg-3">
                                                    <span class="validation-errors text-danger"><?php echo e($errors->first('image')); ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-8">
                                                    <a href="<?php echo e(route('users.index')); ?>">
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
                      <?php if($data->roles=='vendor'): ?>
                          <?php echo $__env->make('admin.user.info.vendor_sales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <?php endif; ?>
                      <?php if($data->roles=='customers'): ?>
                          <?php echo $__env->make('admin.user.info.customer_purchases', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/user/info/user_info.blade.php ENDPATH**/ ?>