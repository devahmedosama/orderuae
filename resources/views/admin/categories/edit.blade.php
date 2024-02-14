@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ $data->name }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a href="{{ URL::to('admin/departments') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Departments</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/categories') }}">{{ trans('home.Categories') }}</a>
                <span class="breadcrumb-item active">{{ $data->name }}</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/categories/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
			    <div class="form-row">
			    	@foreach($langs as $lang)
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Name  In {{ $lang->name }}</label>
			            {{ Form::text('name_'.$lang->locale,$lang->locale_name,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        @endforeach
			        
			    </div>
			    @if($data->parent_id)
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">{{ trans('home.Category') }}</label>
			           {{ Form::select('parent_id',$items,$data->parent_id,['class'=>'form-control','placeholder'=>trans('home.Choose Category')]) }}
			        </div>
			    </div>
			    @else
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">Department</label>
			            <ul class="departments_ul">
			            	@foreach($departments as $dep)
			            	<li>
			            	    <input type="checkbox" name="department_id[]" value="{{ $dep->id }}" {{  ($dep->checked)?'checked':'' }}>	{{ $dep->name }}
			            	</li>
			            	@endforeach
			            </ul>
			            
			        </div>
			    </div>
			    
			    @endif
			    <div class="form-row">
			        <div class="form-group col-md-10">
			            <label for="inputEmail4">{{ trans('home.Icon') }}</label>
			            {{ Form::file('image',['class'=>'form-control']) }}
			        </div>
			        <div class="form-group col-md-2">
			        	<img src="{{ URL::to($data->image) }}" class="img-responsive img-thumbnail" width="150">
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop