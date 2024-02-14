@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">All Vendors</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <span class="breadcrumb-item active" >Vendors</span>
            </nav>
        </div> 
    </div>
	<div class="card"> 
		<div class="card-body">
			<div class="text-right">
				<a href="{{ URL::to('admin/vendors/add') }}" class="btn btn-primary pull-right add_btn">Add New </a>
			</div>
			<div class="table-responsive">
			    <table class="table">
			        <thead>
			            <tr>
			                <th scope="col">#</th>
			                <th scope="col">{{ trans('home.Name') }}</th>
			                <th scope="col">shops</th>
			                <th scope="col">{{ trans('home.Options') }}</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($allData as $data)
			            <tr>
			                <th scope="row"> {{ $data->id }} </th>
			                <td> {{ $data->name }} </td>
			                <td>
			                	<a href="{{ URL::to('admin/stores/'.$data->id) }}" class=" btn  btn-primary btn-xs "> {{ $data->stores_count  }} </a>
			                </td>
			                <td>
			                	<a href="{{ URL::to('admin/vendors/edit/'.$data->id) }}" class="btn btn-primary btn-md">
				                	{{ trans('home.Edit') }}
				                </a>
				                <!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  {{ ($data->activate == 1)?'Stop':'Activate' }}
								</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        {{ ($data->activate == 1)?'Are You Sure You  Want  To Stop This Vendor':'Are You Sure You  Want  To Activate This Vendor' }}
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <a href="{{ URL::to('admin/vendors/activate/'.$data->id) }}"  class="btn btn-primary">{{ ($data->activate == 1)?'Stop':'Activate' }}</a>
								      </div>
								    </div>
								  </div>
								</div>
			                </td>
			            </tr>
			           @endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
@stop