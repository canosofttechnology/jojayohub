  {{-- for employee --}}
  <div class="form-group row">
    <label class="col-sm-2 control-label"><strong>Address</strong></label>
    <div class="col-sm-8">
        <input type="text" class="form-control" value="{{ $employee_data->address }}" readonly id="address">
        <span class="messages"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 control-label"><strong>DOB</strong> <span class="text-danger">*</span></label>
    <div class="col-sm-8">
        <input type="date" class="form-control" value="{{ $employee_data->DOB }}" readonly id="DOB">
        <span class="messages"></span>
    </div>
</div>

