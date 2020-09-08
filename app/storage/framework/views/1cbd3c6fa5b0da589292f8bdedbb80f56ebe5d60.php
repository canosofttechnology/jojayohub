
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-custom ">
               <header class="panel-heading">Sensitive Information</header>
               <div class="panel-body">
                  <?php if(!empty($data)): ?>
                  <?php echo e(Form::open(['url'=>route('settings.update', $data->id), 'class'=>'form', 'id'=>'settings_update', 'files'=>true,'method'=>'patch'])); ?>

                  <?php else: ?>
                  <form action="<?php echo e(route('settings.store')); ?>" method="POST">
                     <?php endif; ?>
                     <?php echo csrf_field(); ?>
                    <div class="form-group row">
                       <div class="col-sm-12">
                          <label><strong>Website Title</strong></label>
                          <input type="text" class="form-control" value="<?php echo e(@$data->web_title); ?>" name="web_title" id="web_title" placeholder="Enter the website title">
                           <?php if($errors->has('web_title')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('web_title')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-12">
                          <label><strong>Meta Keywords</strong></label>
                          <textarea class="form-control" name="keywords" rows="5" style="resize:none"><?php echo e(@$data->keywords); ?></textarea>
                          <?php if($errors->has('keywords')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('keywords')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-12">
                          <label><strong>Meta Description</strong></label>
                          <textarea class="form-control" name="meta_description" rows="5" style="resize:none"><?php echo e(@$data->meta_description); ?></textarea>
                          <?php if($errors->has('meta_description')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('meta_description')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Company name</strong></label>
                          <input type="text" class="form-control" name="company" value="<?php echo e(@$data->company); ?>">
                          <?php if($errors->has('company')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('company')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Registration No.</strong></label>
                          <input type="text" class="form-control" name="registration" value="<?php echo e(@$data->registration); ?>">
                          <?php if($errors->has('registration')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('registration')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>VAT number</strong></label>
                          <input type="text" class="form-control" name="vat" value="<?php echo e(@$data->vat); ?>">
                          <?php if($errors->has('vat')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('vat')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>PO.BOX No.</strong></label>
                          <input type="text" class="form-control" name="pobox" value="<?php echo e(@$data->pobox); ?>">
                          <?php if($errors->has('pobox')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('pobox')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Facebook URL</strong></label>
                          <input type="text" class="form-control" name="facebook" value="<?php echo e(@$data->facebook); ?>">
                          <?php if($errors->has('facebook')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('facebook')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Twitter URL</strong></label>
                          <input type="text" class="form-control" name="twitter" value="<?php echo e(@$data->twitter); ?>">
                          <?php if($errors->has('twitter')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('twitter')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Linkedin URL</strong></label>
                          <input type="text" class="form-control" name="linkedin" value="<?php echo e(@$data->linkedin); ?>">
                          <?php if($errors->has('linkedin')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('linkedin')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Instagram URL</strong></label>
                          <input type="text" class="form-control" name="instagram" value="<?php echo e(@$data->instagram); ?>">
                          <?php if($errors->has('instagram')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('instagram')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>YouTube URL</strong></label>
                          <input type="text" class="form-control" name="youtube" value="<?php echo e(@$data->youtube); ?>">
                          <?php if($errors->has('youtube')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('youtube')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Primary Landline</strong></label>
                          <input type="text" class="form-control" name="landline" value="<?php echo e(@$data->landline); ?>">
                          <?php if($errors->has('landline')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('landline')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Landline 1</strong></label>
                          <input type="text" class="form-control" name="landline1" value="<?php echo e(@$data->landline1); ?>">
                          <?php if($errors->has('landline1')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('landline1')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Landline 2</strong></label>
                          <input type="text" class="form-control" name="landline2" value="<?php echo e(@$data->landline2); ?>">
                          <?php if($errors->has('landline2')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('landline2')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Primary mobile</strong></label>
                          <input type="text" class="form-control" name="mobile" value="<?php echo e(@$data->mobile); ?>">
                          <?php if($errors->has('mobile')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('mobile')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Mobile 1</strong></label>
                          <input type="text" class="form-control" name="mobile1" value="<?php echo e(@$data->mobile1); ?>">
                          <?php if($errors->has('mobile1')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('mobile1')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Primary email</strong></label>
                          <input type="text" class="form-control" name="email" value="<?php echo e(@$data->email); ?>">
                          <?php if($errors->has('email')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('email')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Secondary email</strong></label>
                          <input type="text" class="form-control" name="email1" value="<?php echo e(@$data->email1); ?>">
                          <?php if($errors->has('email1')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('email1')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-6">
                          <label><strong>Location</strong></label>
                          <textarea name="location" rows="5" class="form-control" style="resize:none"><?php echo e(@$data->location); ?></textarea>
                          <?php if($errors->has('location')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('location')); ?></span>
                           <?php endif; ?>
                       </div>
                       <div class="col-sm-6">
                          <label><strong>Location on map</strong></label>
                          <textarea name="map" rows="5" class="form-control" style="resize:none"><?php echo e(@$data->map); ?></textarea>
                          <?php if($errors->has('map')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('map')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-12">
                          <label><strong>Google Analytics</strong></label>
                          <textarea name="g_analytics" rows="5" class="form-control" style="resize:none"><?php echo e(@$data->g_analytics); ?></textarea>
                          <?php if($errors->has('g_analytics')): ?>
                              <span class="validation-errors text-danger"><?php echo e($errors->first('g_analytics')); ?></span>
                           <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 210px;">
                            <?php
                            $image = "http://placehold.it/350x260";
                            if(!empty($data->logo)){
                                $image = $data->logo;
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
                                    <input type="hidden" name="logo" id="thumbnailthumbnail" value="<?php echo e($image); ?>">
                                    <span class="fileinput-exists">Change</span>
                                </span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </span>
                            </div>
                            <div id="valid_msg" style="color: #e11221"></div>
                        </div>
                        <?php if($errors->has('image')): ?>
                        <div class="col-lg-3">
                            <span class="validation-errors text-danger"><?php echo e($errors->first('image')); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                       <label class="col-sm-2"></label>
                       <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary m-b-0 pull-right ml-2">Save</button>
                       </div>
                    </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/settings.blade.php ENDPATH**/ ?>