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
			{{ Form::open(['url'=>'admin/users/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
			    <div class="form-row">
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Name') }}</label>
			            {{ Form::text('first_name',$data->first_name,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Last Name</label>
			            {{ Form::text('last_name',$data->last_name,['class'=>'form-control','placeholder'=>'last_name','required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.E-mail') }}</label>
			            {{ Form::email('email',$data->email,['class'=>'form-control','placeholder'=>trans('home.E-mail'),'required']) }}
			        </div>
			    
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Phone') }}</label>
			            {{ Form::text('phone',$data->phone,['class'=>'form-control']) }}
			        </div>
			       
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop