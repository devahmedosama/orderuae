@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ $data->name }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/vendors') }}">Vendors</a>
                <span class="breadcrumb-item active">{{ $data->name }} </span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/vendors/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
			    <div class="form-row">
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Name') }} </label>
			            {{ Form::text('name',$data->name,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4"> Phone </label>
			            {{ Form::text('phone',$data->phone,['class'=>'form-control','placeholder'=>'Phone','required']) }}
			        </div>
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">E-mail</label>
			            {{ Form::text('email',$data->email,['class'=>'form-control','placeholder'=>'E-mail','required']) }}
			        </div>
			    </div> 
			    <input type="hidden" name="dep_id" value="{{ app('request')->input('department_id') }}">
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">Department</label>
			            <ul class="departments_ul">
			            	@foreach($departments as $dep)
			            	<li>
			            	    <input type="checkbox" name="department_id[]" value="{{ $dep->id }}"  {{ ($dep->status == 1)?'checked':'' }}>	{{ $dep->name }}
			            	</li>
			            	@endforeach
			            </ul>
			            
			        </div>
			    </div>
			    <div class="form-row">
			        <div class="form-group col-md-6">
			            <label for="inputEmail4"> Password </label>
			            {{ Form::password('password',['class'=>'form-control','placeholder'=>'******']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4"> Password </label>
			            {{ Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'******']) }}
			        </div>
			    </div> 
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop