<div id="customer">
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Company</strong> <span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="{{ @$customer_data->company }}" readonly id="company" placeholder="Name of the company">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 control-label"><strong>Address</strong> <span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="{{ @$customer_data->customer_address }}" readonly id="address" placeholder="Addresss">
            <span class="messages"></span>
        </div>
    </div>

</div>
