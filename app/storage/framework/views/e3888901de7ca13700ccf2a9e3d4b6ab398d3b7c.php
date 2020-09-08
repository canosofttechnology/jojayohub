<div id="vendor">
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Company</strong></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="<?php echo e(@$vendor_data->company); ?>" readonly id="company" >
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Address</strong></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="<?php echo e(@$vendor_data->vendor_address); ?>" readonly id="address">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>C.Address</strong> </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="<?php echo e(@$vendor_data->company_address); ?>" readonly id="address">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Categories</strong></label>
        <div class="col-sm-8">
            <select class="form-control select_box select2-hidden-accessible" disabled name="categories[]" multiple="multiple">
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

</div>
<?php /**PATH /home/jojayohub/public_html/resources/views/admin/user/info/vendor_info.blade.php ENDPATH**/ ?>