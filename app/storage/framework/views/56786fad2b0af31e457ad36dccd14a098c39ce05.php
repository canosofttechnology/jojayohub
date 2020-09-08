
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-22">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="<?php if($active_tab == 'manage'): ?> active <?php endif; ?>"><a href="#manage" data-toggle="tab">Vendors</a></li>
                  <li class=""><a href="#customers" data-toggle="tab">Customer</a></li>
                  <li class=""><a href="#employees-tab" data-toggle="tab">Employee</a></li>
                  <li class="<?php if($active_tab == 'create'): ?> active <?php endif; ?>"><a href="#create" data-toggle="tab">New User</a></li>
                  <input type="hidden" id="base" value="<?php echo e(route('ajax.users')); ?>">
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane <?php if($active_tab == 'manage'): ?> active <?php endif; ?>" id="manage">
                     <div class="table-responsive">
                     <table class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($allUsers)): ?> <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userLists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($userLists->id); ?>">
                                <td><input type="checkbox" name="delete_items" value="<?php echo e($userLists->id); ?>"></td>
                                <td>
                                <a href="<?php echo e(route('user.info',$userLists->id)); ?>"><?php echo e($userLists->name); ?></a>
                                </td>
                                <td><?php echo e($userLists->email); ?></td>
                                <td><?php echo e($userLists->roles); ?></td>
                                <td><a href="<?php echo e($userLists->image); ?>" class="iframe-btn">View Profile Image</a></td>
                                <td>
                                    <a href="<?php echo e(route('users.edit', $userLists->id)); ?>" class="btn btn-primary btn-xs" style="margin-right: 5px">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <?php if(Auth::user()->roles=='admin'): ?>
                                    <a style="display:inline-block" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <form method="POST" action="<?php echo e(route('users.destroy', $userLists->id)); ?>" accept-charset="UTF-8">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                     </div>
                  </div>

                  <div class="tab-pane" id="customers">
                     <div class="table-responsive">
                     <table class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($customer_lists)): ?> <?php $__currentLoopData = $customer_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($customer->id); ?>">
                                <td><input type="checkbox" name="delete_items" value="<?php echo e($customer->id); ?>"></td>
                                <td>
                                <a href="<?php echo e(route('user.info',$customer->id)); ?>"><?php echo e($customer->name); ?></a>
                                </td>
                                <td><?php echo e($customer->email); ?></td>
                                <td><?php echo e($customer->roles); ?></td>
                                <td><a href="<?php echo e($customer->image); ?>" class="iframe-btn">View Profile Image</a></td>
                                <td>
                                    <a href="<?php echo e(route('users.edit', $customer->id)); ?>" class="btn btn-primary btn-xs" style="margin-right: 5px">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <?php if(Auth::user()->roles=='admin'): ?>
                                    <a style="display:inline-block" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <form method="POST" action="<?php echo e(route('users.destroy', $customer->id)); ?>" accept-charset="UTF-8">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                     </div>
                  </div>

                  <div class="tab-pane" id="employees-tab">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap datatable_action" role="grid" aria-describedby="basic-col-reorder_info">
                       <thead>
                           <tr>
                               <th></th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Role</th>
                               <th>Image</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>

                           <?php if(!empty($employees)): ?> <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr id="<?php echo e($employee->id); ?>">
                               <td><input type="checkbox" name="delete_items" value="<?php echo e($employee->id); ?>"></td>
                               <td>
                               <a href="<?php echo e(route('user.info',$employee->id)); ?>"><?php echo e($employee->name); ?></a>
                               </td>
                               <td><?php echo e($employee->email); ?></td>
                               <td><?php echo e($employee->roles); ?></td>
                               <td><a href="<?php echo e($employee->image); ?>" class="iframe-btn">View Profile Image</a></td>
                               <td>
                                   <a href="<?php echo e(route('users.edit', $employee->id)); ?>" class="btn btn-primary btn-xs" style="margin-right: 5px">
                                       <i class="fa fa-pencil-square-o"></i>
                                   </a>
                                   <?php if(Auth::user()->roles=='admin'): ?>
                                   <a style="display:inline-block" onclick="return confirm('Are you sure you want to delete this user?')">
                                       <form method="POST" action="<?php echo e(route('users.destroy', $employee->id)); ?>" accept-charset="UTF-8">
                                           <input name="_method" type="hidden" value="DELETE">
                                           <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                           <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                       </form>
                                   </a>
                                   <?php endif; ?>
                               </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                       </tbody>
                   </table>
                    </div>
                 </div>

                  <div class="tab-pane <?php if($active_tab == 'create'): ?> active <?php endif; ?>" id="create">
                    <?php if(Auth::user()->roles=='admin'): ?>
                  <?php if(!empty(@$data)): ?>
                        <?php echo e(Form::open(['url'=>route('users.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'user_add', 'files'=>true,'method'=>'patch'])); ?>

                        <input name="_method" type="hidden" value="PATCH">
                    <?php else: ?>
                        <form action="<?php echo e(route('users.store')); ?>" method="POST" class="form-horizontal">
                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-22">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label"><strong>Fullname</strong> <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo e(@$data->name); ?>" name="name" id="name" placeholder="Enter title for the user">
                                                        <input type="hidden" class="form-control" value="<?php echo e(@$employee_detail->slug); ?>" name="slug" id="slug">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label"><strong>Email</strong> <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" value="<?php echo e(@$data->email); ?>" name="email" id="email" placeholder="Unique email address">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label"><strong>Password</strong> <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="password" class="form-control" value="" name="password" id="password" placeholder="Type here only if you want to change the password">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label"><strong>Contact</strong> <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" value="<?php echo e(@$data->contact); ?>" name="contact" id="contact" placeholder="Contact number">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label"><strong>Role</strong> <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="roles" id="role" class="form-control">
                                                            <option selected disabled>--Select user type--</option>
                                                            <option value="admin" <?php echo e(@$data->roles == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                                            <option value="vendor" <?php echo e(@$data->roles == 'vendor' ? 'selected' : ''); ?>>Vendor</option>
                                                            <option value="employee" <?php echo e(@$data->roles == 'employee' ? 'selected' : ''); ?>>Editor</option>
                                                            <option value="customers" <?php echo e(@$data->roles == 'customers' ? 'selected' : ''); ?>>Customers</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="vendor">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Company</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="<?php echo e(@$vendor_data->company); ?>" name="company" id="company" placeholder="Name of the company">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Address</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="<?php echo e(@$vendor_data->vendor_address); ?>" name="vendor_address" id="address" placeholder="Addresss">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>C.Address</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="<?php echo e(@$vendor_data->company_address); ?>" name="company_address" id="address" placeholder="Addresss">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Categories</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select_box select2-hidden-accessible" name="categories[]" multiple="multiple">
                                                                <?php
                                                                if($allCategories){
                                                                    foreach ($allCategories as $categoryList){
                                                                        $checked = '';
                                                                        if(!empty($permitted)){
                                                                            if (is_array($permitted) || is_object($permitted)) {
                                                                            foreach ($permitted as $key => $value) {
                                                                            if($categoryList->id == $value['category_id']){
                                                                            $checked = 'selected';
                                                                            break;
                                                                            }
                                                                        }
                                                                        }
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo e($categoryList->id); ?>" <?php echo e($checked); ?>><?php echo e($categoryList->name); ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                              </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Status</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <select name="status" id="status" class="form-control">
                                                                <option selected disabled>--Select user status--</option>
                                                                <option value="verified" <?php echo e(@$vendor_data->status == 'verified' ? 'selected' : ''); ?>>Verified</option>
                                                                <option value="unverified" <?php echo e(@$vendor_data->status == 'unverified' ? 'selected' : ''); ?>>Not verified</option>
                                                                <option value="suspended" <?php echo e(@$vendor_data->status == 'suspended' ? 'selected' : ''); ?>>Suspended</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="employee">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Address</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="<?php echo e(@$employee_data->address); ?>" name="address" id="address" placeholder="Addresss">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Salary</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="number" class="form-control" value="<?php echo e(@$employee_data->salary); ?>" name="salary" id="salary" placeholder="Salary for the employee">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>DOB</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" value="<?php echo e(@$employee_data->DOB); ?>" name="DOB" id="DOB" placeholder="Date of birth">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label"><strong>Status</strong> <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <select name="status" id="status" class="form-control">
                                                                <option selected disabled>--Select user status--</option>
                                                                <option value="active" <?php echo e(@$employee_data->status == 'active' ? 'selected' : ''); ?>>Active</option>
                                                                <option value="inactive" <?php echo e(@$employee_data->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"></label>
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
                                                <div class="form-group row">
                                                    <label class="col-sm-2"></label>
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn btn-primary m-b-0 pull-right ml-2"><?php echo e(@$data !== null ? 'Update' : 'Add'); ?> User</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php else: ?>
                            <h3>Sorry, You have't permission to create user.</h3>
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
    <script>
        let data = "<?php echo isset($data) ? 'yes' : 'no' ?>";
        if(data == 'yes'){
            if('<?php echo e(@$data->roles); ?>' == 'vendor'){
                $('#vendor').show();
                $('#employee').hide();
            } else if('<?php echo e(@$data->roles); ?>' == 'employee'){
                $('#vendor').hide();
                $('#employee').show();
            }
        }else if(data == 'no') {
            $('#vendor').hide();
            $('#employee').hide();
        }

        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });
        $('#role').on('change', function(){
            let role = (this).value;
            if(role == 'vendor'){
                $('#vendor').show(1000);
                $('#employee').hide(1000);
            } else if(role == 'employee'){
                $('#employee').show(1000);
                $('#vendor').hide(1000);
            } else if(role == 'admin'){
                $('#employee').hide(1000);
                $('#vendor').hide(1000);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/users.blade.php ENDPATH**/ ?>