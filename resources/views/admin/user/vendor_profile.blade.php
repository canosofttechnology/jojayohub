
<div id="vendor">
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Company</strong> <span class="text-danger">{{!isset($type)?'*':''}}</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" {{isset($type)?'disabled':''}} value="{{ @$vendor_data->company }}" name="company" id="company" placeholder="Name of the company">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Address</strong> <span class="text-danger">{{!isset($type)?'*':''}}</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" {{isset($type)?'disabled':''}} value="{{ @$vendor_data->vendor_address }}" name="vendor_address" id="address" placeholder="Addresss">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>C.Address</strong> <span class="text-danger">{{!isset($type)?'*':''}}</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" {{isset($type)?'disabled':''}} value="{{ @$vendor_data->company_address }}" name="company_address" id="address" placeholder="Addresss">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Categories</strong> <span class="text-danger">{{!isset($type)?'*':''}}</span></label>
        <div class="col-sm-8">
            <select class="form-control select_box select2-hidden-accessible" {{isset($type)?'disabled':''}} name="categories[]" multiple="multiple">
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
                        <option value="{{ $categoryList->id }}" {{ $checked}}>{{ $categoryList->name }}</option>
                        <?php
                    }
                }
                ?>
              </select>
        </div>
    </div>

</div>
