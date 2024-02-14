@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.All Pages') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <span class="breadcrumb-item active">Pages</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			    <table class="table">
			        <thead>
			            <tr>
			                <th scope="col">#</th>
			                <th scope="col">{{ trans('home.Name') }}</th>
			                <th scope="col">{{ trans('home.Options') }}</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($allData as $data)
			            <tr>
			                <th scope="row">{{ $data->id }}</th>
			                <td>{{ $data->name }}</td>
			                <td>
			                	<a href="{{ URL::to('admin/pages/edit/'.$data->id) }}" class="btn btn-primary btn-md">{{ trans('home.Edit') }}</a>
			                </td>
			            </tr>
			           @endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
@stop