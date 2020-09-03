@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.front-nav')

            <h3 class="widget-title">My address(es)</h3>
            <table class="table table-striped">
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Region</th>
                <th>Phone</th>
                <th></th>
              </tr>
              @if(!empty($my_address))
                @foreach($my_address as $address_list)
                <tr>
                  <td>{{ $address_list->name }}</td>
                  <td>{{ $address_list->address }}</td>
                  <td>{{ $address_list->Region->name }}</td>
                  <td>{{ $address_list->phone }}</td>
                  <td>
                    <a href="{{ route('address.edit', $address_list->id) }}" class="pull-left" style="margin-right: 5px">
                        Edit
                    </a>
                    <a onclick="return confirm('Are you sure you want to delete this address?')">
                        <form method="POST" action="{{ route('address.destroy', $address_list->id) }}" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <button type="submit" class="address-delete">Delete</button>
                        </form>
                    </a>
                  </td>
                </tr>
                @endforeach
              @endif
            </table>
            <div class="row text-right mt-5">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="{{ route('addressList') }}" class="btn btn-primary btn-md">Add new Address</a>
              </div>
            </div>
        </div>
        @include('frontend.layouts.customer-nav')
    </div>
</div>

<div class="mb-5"></div><!-- margin -->
@endsection
