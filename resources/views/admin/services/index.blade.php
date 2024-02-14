@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.All Services') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a href="{{ URL::to('admin/services') }}" class="breadcrumb-item">Services</a>
               
                @if(count($path))
                   @foreach($path as $key=>$item)
                		<a href="{{ URL::to('admin/services?parent_id='.$key) }}" class="breadcrumb-item">{{ $item }}</a>
                   @endforeach
                @endif
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			<a class="btn btn-primary btn-md pull-right" href="{{ URL::to('admin/services/add?parent_id='.app('request')->input('parent_id')) }}">
			   {{ trans('home.Add') }}
		    </a>			
			<div class="table-responsive">
			    <table class="table"> 
			        <thead>
			            <tr>
			                <th scope="col">#</th>
			                <th scope="col">{{ trans('home.Name') }}</th>
			                <th scope="col">{{  (app('request')->input('parent_id'))?trans('home.Category'):trans('home.Sub Services') }}</th>
			                <th scope="col">{{ trans('home.Options') }}</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($allData as $data)
			            <tr>
			                <th scope="row">{{ $data->id }}</th>
			                <td>{{ $data->name }}</td>
			                <td>
			                	{{ ($data->category)?$data->category->name:' ' }} &nbsp; &nbsp;

			                	<a class="btn btn-primary btn-xs" href="{{ URL::to('admin/services?parent_id='.$data->id) }}">
			                		{{ trans('home.Sub Services') }} {{  $data->sub_services_count }}
			                	</a>
			                </td>
			                <td>
			                	<a href="{{ URL::to('admin/services/edit/'.$data->id) }}" class="btn btn-primary btn-md">{{ trans('home.Edit') }}</a>
			                </td>
			            </tr>
			           @endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
@stop