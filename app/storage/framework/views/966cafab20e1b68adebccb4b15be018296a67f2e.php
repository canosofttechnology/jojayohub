
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="<?php if($active_tab == 'manage'): ?> active <?php endif; ?>"><a href="#manage" data-toggle="tab">All Attributes</a></li>
                  <li class="<?php if($active_tab == 'create'): ?> active <?php endif; ?>"><a href="#create" data-toggle="tab">New Attribute</a></li>
                  <input type="hidden" id="base" value="<?php echo e(route('ajax.products')); ?>">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane <?php if($active_tab == 'manage'): ?> active <?php endif; ?>" id="manage">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                           <thead>
                              <tr>
                                 <th><input type="checkbox" id="all"></th>
                                 <th>Attribute Name</th>
                                 <th>Field Type</th>
                                 <th>Values</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(!empty($all_attribute)): ?> 
                              <?php $__currentLoopData = $all_attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeLists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                              
                              <tr>
                                 <td><input type="checkbox" name="delete_items" value="<?php echo e($attributeLists->id); ?>"></td>
                                 <td style="max-width: 150px"><?php echo e($attributeLists->name); ?></td>
                                 <td><?php echo e($attributeLists->field); ?></td>
                                 <?php
                                 $values = array();
                                 if(!empty($attributeLists->attributeValue)){
                                    foreach($attributeLists->attributeValue as $my_val){
                                    $values[] = $my_val->value;
                                 }
                                 $my_values = implode(",", $values);
                                 }                                                
                                 ?>
                                 <td style="max-width: 600px; overflow:hidden"><?php echo e($my_values); ?></td>
                                 <td>
                                    <a href="<?php echo e(route('attributes.edit', $attributeLists->id)); ?>" class="btn btn-primary btn-xs pull-left" style="margin-right: 5px">
                                    <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a class="pull-left" onclick="return confirm('Are you sure you want to delete this attribute?')">
                                       <form method="POST" action="<?php echo e(route('attributes.destroy', $attributeLists->id)); ?>" accept-charset="UTF-8">
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
                     <form action="<?php echo e(route('attributes.store')); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php else: ?>
                        <?php echo e(Form::open(['url'=>route('attributes.update', $data->id), 'class'=>'form-horizontal', 'id'=>'product_update', 'files'=>true,'method'=>'patch'])); ?>

                        <?php endif; ?>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-block">
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="form-group row">
                                            <label class="col-lg-3 control-label">Attribute Name <span class="text-danger">*</span></label>                                            
                                            <div class="col-md-8 col-lg-8">
                                            <input name="name" type="text" required class="form-control" id="name" value="<?php echo e(@$data->name); ?>">
                                            <?php if($errors->has('name')): ?>
                                            <span class='validation-errors text-danger'><?php echo e($errors->first('name')); ?></span>
                                            <?php endif; ?>
                                            </div>
                                          </div>
                                          <div class="form-group row">                                             
                                             <label class="col-lg-3 control-label">Attribute Slug <span class="text-danger">*</span></label>  
                                             <div class="col-md-8 col-lg-8">
                                                <input name="slug" type="text" class="form-control" id="slug" required value="<?php echo e(@$data->slug); ?>">
                                                <?php if($errors->has('slug')): ?>
                                                <span class='validation-errors text-danger'><?php echo e($errors->first('slug')); ?></span>
                                                <?php endif; ?>
                                             </div>
                                          </div>
                                          <div class="form-group row">                                             
                                             <label class="col-lg-3 control-label">Field Type <span class="text-danger">*</span></label>
                                             <div class="col-md-8 col-lg-8">
                                                <input name="field" type="radio" class="class" <?php echo e(@$data->field == 'input' ? 'checked' : ''); ?> required value="input">&nbsp;Input
                                                <input name="field" class="class" type="radio" <?php echo e(@$data->field == 'select' ? 'checked' : ''); ?> required value="select">&nbsp;Select
                                                <?php if($errors->has('field')): ?>
                                                <span class='validation-errors text-danger'><?php echo e($errors->first('field')); ?></span>
                                                <?php endif; ?>
                                             </div>
                                          </div>
                                          <div class="form-group row" id="show">                                             
                                             <label class="col-lg-3 control-label">Values <span class="text-danger">*</span></label>
                                             <div class="col-md-8 col-lg-8">
                                                <?php 
                                                $values = array();
                                                if(!empty($data->attributeValue)){
                                                   foreach($data->attributeValue as $my_val){
                                                   $values[] = $my_val->value;
                                                }
                                                $my_values = implode(",", $values);
                                                }                                                
                                                ?>
                                                <input name="value" type="text" class="form-control" id="value" required value="<?php echo e(@$my_values); ?>" placeholder="Insert the values separated by comma (,)">
                                                <?php if($errors->has('value')): ?>
                                                <span class='validation-errors text-danger'><?php echo e($errors->first('value')); ?></span>
                                                <?php endif; ?>
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-lg-3 control-label"></label>
                                            <div class="col-lg-8 col-md-8">
                                                <button type="submit" class="btn btn-primary"><?php echo e(!empty($data) ? 'Update' : 'Add'); ?> Attribute</button>
                                                <button type="submit" class="btn btn-danger">Draft</button>
                                            </div> 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
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
let yes = "<?php echo e(@$data->field); ?>";
if(yes !== '' && yes == 'select'){
   $('#show').slideDown();
} else {
   $('#show').hide();
}
$('.class').on('click', function(){
   let a = $(this).val();
   if(a == 'select'){
      $('#show').slideDown();
   } else {
      $('#show').slideUp();
   }   
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/product_attribute.blade.php ENDPATH**/ ?>