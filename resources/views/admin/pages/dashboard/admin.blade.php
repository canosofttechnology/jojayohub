<div id="report_menu" class="row">
    <div class="col-sm-4 report" id="1">
       {{-- <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#1" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/1/0"><i class='fa fa-times-circle'></i></strong> --}}
       <div class="panel report_menu">
          <div class="row row-table row-flush">
             <div class="col-xs-6 bb br">
                <div class="row row-table row-flush">
                   <div class="col-xs-2 text-center text-info">
                      {{-- <em class="fa fa-plus fa-2x"></em> --}}
                   </div>
                   <div class="col-xs-10">
                      <div class="text-center">
                         <h4 class="mt-sm mb0"> {{ array_sum(array($employee_count,$vendor_count,$customer_count))}} </h4>
                         <p class="mb0 text-muted">Total Users</p>
                        <small>
                            <a href="{{ route('users.index',['active_tab'=>'create'])}}" class="mt0 mb0">
                                Add new
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </small>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xs-6 bb">
                <div class="row row-table row-flush">
                   <div class="col-xs-2 text-center text-danger">
                      {{-- <em class="fa fa-minus fa-2x"></em> --}}
                   </div>
                   <div class="col-xs-10">
                      <div class="text-center">
                      <h4 class="mt-sm mb0"> {{$vendor_count}}</h4>
                         <p class="mb0 text-muted">Total Vendor</p>
                         <small>
                             <a href="{{ route('users.index')}}" class=" small-box-footer">
                                See all
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </small>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="col-sm-4 report" id="1">
       {{-- <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#1" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/1/0"><i class='fa fa-times-circle'></i></strong> --}}
       <div class="panel report_menu">
          <div class="row row-table row-flush">
            <div class="row row-table row-flush">
                <div class="col-xs-6 br">
                   <div class="row row-table row-flush">
                      <div class="col-xs-2 text-center text-info">
                         {{-- <em class="fa fa-plus fa-2x"></em> --}}
                      </div>
                      <div class="col-xs-10">
                         <div class="text-center">
                         <h4 class="mt-sm mb0">{{$employee_count}}</h4>
                            <p class="mb0 text-muted">Toal Employee</p>
                            <small>
                                <a href="{{ route('users.index',['active_tab'=>'employees'])}}" class="mt0 mb0">
                                   See all
                                   <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </small>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xs-6">
                   <div class="row row-table row-flush">
                      <div class="col-xs-2 text-center text-danger">
                         {{-- <em class="fa fa-minus fa-2x"></em> --}}
                      </div>
                      <div class="col-xs-10">
                         <div class="text-center">
                         <h4 class="mt-sm mb0"> {{$customer_count}}</h4>
                            <p class="mb0 text-muted">Total Customer</p>
                            <small>
                                <a href="{{ route('users.index',['active_tab'=>'customers'])}}" class="small-box-footer">
                                   See all
                               <i class="fa fa-arrow-circle-right"></i>
                           </a>
                       </small>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

 </div>
<div class="clearfix visible-sm-block "></div>
<div id="menu" class="row">
    @include('admin.pages.dashboard.recent_products')
   <div class="col-md-6 mt-lg" id="19">
    <section class="panel panel-custom menu" >
       <header class="panel-heading">
          <h3 class="panel-title">Recently Product</h3>
       </header>
       <div class="panel-body inv-slim-scroll" style="height: 437px;overflow-y: scroll;">
          <div class="table-responsive">
              <table class="table table-striped table-bordered" role="grid" aria-describedby="basic-col-reorder_info">
                 <thead>
                    <tr>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($inquiries as $inquiry)
                        <tr>
                            <td>
                                <a href="{{ route('inquiry',$inquiry->id)}}">
                                    {{ $inquiry->name}}
                                </a>
                            </td>
                            <td>{{ $inquiry->email}}</td>
                            <td>{{ $inquiry->phone}}</td>
                        </tr>
                     @endforeach
                 </tbody>
              </table>
          </div>
       </div>
    </section>
 </div>

</div>
