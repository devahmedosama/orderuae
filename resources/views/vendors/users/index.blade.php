@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ $title }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <span class="breadcrumb-item active">{{ $title }}</span>
            </nav>
        </div> 
    </div>
	<div class="card">
		<div class="card-body">
			<div class="panel-heading">
			        {{ Form::open(['url'=>'admin/users?type='.app('request')->input('type'),'method'=>'get','class'=>'search-form']) }}
			        <div class="row">
			            <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
			            <div class="col-sm-5">
			            		{{ trans('home.Name') }}  :
			                    {{ Form::text('name',app('request')->input('name'),['class'=>'form-control']) }}

			            </div>
			             <div class="col-sm-2">
			               </br>
			                {{ Form::submit('بحث ',['class'=>' btn btn-md btn-primary']) }}
			            </div>
			        </div>
			        {{ Form::close() }}
			    </div>
			<div class="table-responsive">
				
			    <table class="table"> 
			        <thead>
			            <tr> 
			                <th scope="col">#</th>
			                <th scope="col">{{ trans('home.Name') }}</th>
			                <th scope="col">{{ trans('home.Type') }}</th>
			                <th scope="col">{{ trans('home.Contacts No') }}</th>
			                @if(app('request')->input('type') == 2)
			                <th scope="col">{{ trans('home.Services') }}</th>
			                @endif
			                <th scope="col">{{ trans('home.Options') }}</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($allData as $data)
			            <tr>
			                <th scope="row">{{ $data->id }}</th>
			                <td>{{ $data->name }}</td>
			                <td>{{ ($data->type==2)?'Service Providers':'Customer' }}</td>
			                <td>
			                	{{ App\User::conacts_no($data->id) }}
			                </td>
			                @if(app('request')->input('type') == 2)
			                <td>
			                	{{ $data->service_name }}
			                </td>
			                @endif
			                <td>
			                	@if($data->type == 2)
			                	   @if($data->show == 0)
			                			<a  class="btn btn-primary btn-md activate_user stop"  data-id="{{ $data->id }}">{{ trans('home.Activate') }}</a>
			                	   @else
			                	        <a  class="btn btn-primary btn-md activate_user active"  data-id="{{ $data->id }}">{{ trans('home.Stop') }}</a>
			                	   @endif
			                	@endif
			                	<a href="{{ URL::to('admin/users/edit/'.$data->id) }}" class="btn btn-primary btn-md">{{ trans('home.Edit') }}</a>
			                	<!-- Button trigger modal -->
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
								  {{ trans('home.Delete') }}
								</button>
								@if($data->type == 2)
								   <a href="{{ URL::to('admin/users/statistics/'.$data->id) }}" class="btn btn-success btn-md"> 
									    Statistics and Details 
								   </a>
								   @if($data->featured == 0)
			                			<a  class="btn btn-primary btn-md feature_user stop"  data-id="{{ $data->id }}">
			                				Add To Feature
			                			</a>
			                	   @else
			                	        <a  class="btn btn-primary btn-md feature_user active"  data-id="{{ $data->id }}">
			                	        	Remove From Featured
			                	        </a>
			                	   @endif
								@endif
								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								        <a href="{{ URL::to('admin/users/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }}</a>
								      </div>
								    </div>
								  </div>
								</div>
			                </td>
			            </tr>
			           @endforeach
			           <tr>
			           	<td colspan="4">
			           		{{  $allData->appends(request()->input())->links() }}</td>
			           </tr>
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
@stop