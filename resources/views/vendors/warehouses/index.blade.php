@extends('vendors.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">All Ware Houses</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('vendors/dashboard') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <span class="breadcrumb-item active" >Ware Houses</span>
            </nav>
        </div>
    </div> 
	<div class="card">
		<div class="card-body">
			<div class="text-right">
				<a href="{{ URL::to('vendors/dashboard/warehouses/add') }}" class="btn btn-primary pull-right add_btn">Add New </a>
			</div>
			<div class="clear-fix"></div>
			<div class="list disable-text-selection" data-check-all="checkAll" style="margin-top: 80px;">
				<div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div
                            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <span class="align-middle text-small d-inline-block">
                                	Name
                                </span>
                            <p class="mb-0 text-muted text-small w-15 w-xs-100">Address</p>
                            <p class="mb-0 text-muted text-small w-15 w-xs-100">
                            	Contact Person
                            </p>
                            <p class="mb-0 text-muted text-small w-15 w-xs-100">Options</p>
                            
                        </div>
                        
                    </div>
                </div>

				@foreach($allData as $data)
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div
                            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <span class="align-middle text-small d-inline-block"> 
                            	{{ $data->name }}
                            </span>
                            <p class="mb-0 text-muted text-small w-15 w-xs-100">
	                            {{ $data->address }}
	                        </p>
                            <p class="mb-0 text-muted text-small w-15 w-xs-100">
                            	{{ $data->contact_person }}
                            </p>
                            <div class="w-15 w-xs-100">
                                <a href="{{ URL::to('vendors/dashboard/warehouses/edit/'.$data->id) }}" class="btn btn-md btn-primary">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                                  {{ trans('home.Delete') }} 
                                </button>
                                <!-- Modal -->
                               <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('home.Alert') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        {{ trans('home.Are You Sure You Want to Delete This ?') }}
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('home.Close') }}</button>
                                        <a href="{{ URL::to('vendors/dashboard/warehouses/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }} </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
		</div>
	</div>
@stop