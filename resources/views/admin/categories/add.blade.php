@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.Add New Category') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/categories') }}">{{ trans('home.Categories') }}</a>
                <span class="breadcrumb-item active">{{ trans('home.Add New Category') }}</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/categories/add','files'=>true,'enctype'=>'multipart']) }}
			    <div class="form-row">
			    	@foreach($langs as $lang)
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Name') }} {{ trans('home.In '.$lang->name) }}</label>
			            {{ Form::text('name_'.$lang->locale,null,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        @endforeach
			    </div> 
			    @if(app('request')->input('parent_id'))
			    <input type="hidden" name="parent_id" value="{{ app('request')->input('parent_id')  }}"> 
			    @else
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">Department</label>
			            <ul class="departments_ul">
			            	@foreach($departments as $dep)
			            	<li>
			            	    <input type="checkbox" name="department_id[]" value="{{ $dep->id }}">	{{ $dep->name }}
			            	</li>
			            	@endforeach
			            </ul>
			            
			        </div>
			    </div>
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">{{ trans('home.Category') }}</label>
			           {{ Form::select('parent_id',$items,null,['class'=>'form-control'
			           					,'placeholder'=>trans('home.Choose Category')]) }}
			        </div>
			    </div>
			    @endif
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">{{ trans('home.Icon') }}</label>
			            {{ Form::file('image',['class'=>'form-control'],'required') }}
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop