@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.Add New Slider') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/sliders') }}">{{ trans('home.Sliders') }}</a>
                <span class="breadcrumb-item active">{{ trans('home.Add New Slider') }}</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/sliders/add','files'=>true,'enctype'=>'multipart']) }}
			    
			    <div class="form-row">
			    	<div class="form-group col-md-12">
			            <label for="inputEmail4">Department</label>
			            {{ Form::select('department_id',$items,null,['class'=>'form-control']) }}
			        </div>
			    	<div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Link') }}</label>
			            {{ Form::url('link',null,['class'=>'form-control','placeholder'=>trans('home.Link')]) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Image') }} (1092x557)</label>
			            {{ Form::file('image',['class'=>'form-control','required']) }}
			        </div>
			    </div>

			    <div class="form-row">
			    	@foreach($langs as $lang )
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Name In {{ $lang->name }}</label>
			            {{ Form::text('name_'.$lang->locale,null,['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
			        </div>
			        
			        @endforeach
			        @foreach($langs as $lang )
			        
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Text In {{ $lang->name }}</label>
			            {{ Form::textarea('text_'.$lang->locale,null,['class'=>'form-control','placeholder'=>'Text In '.$lang->name,'required','rows'=>3]) }}
			        </div>
			        @endforeach
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop