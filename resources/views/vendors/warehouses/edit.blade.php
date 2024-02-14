@extends('vendors.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ $data->name }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('vendors/dashboard/warehouses') }}">Ware Houses</a>
                <span class="breadcrumb-item active"> {{ $data->name }} </span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'vendors/dashboard/warehouses/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
			    <div class="form-row">
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">{{ trans('home.Name') }} </label>
			            {{ Form::text('name',$data->name,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4"> contact person </label>
			            {{ Form::text('contact_person',$data->contact_person,['class'=>'form-control','placeholder'=>'contact person','required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Contact E-mail</label>
			            {{ Form::text('contact_email',$data->contact_email,['class'=>'form-control','placeholder'=>'E-mail','required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Contact Phone</label>
			            {{ Form::text('contact_no',$data->contact_no,['class'=>'form-control','placeholder'=>'Contact Phone','required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4"> Address </label>
			            {{ Form::text('address',$data->address,['class'=>'form-control','placeholder'=>'Address','required']) }}
			        </div>
			        <div class="form-group col-md-6">
			            <label for="inputEmail4"> Default process time </label>
			            {{ Form::select('default_process_time',$days,$data->default_process_time,['class'=>'form-control','placeholder'=>'default process time','required']) }}
			        </div>
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">City</label>
			            {{ Form::select('city_id',$cities,$data->city_id,['class'=>'form-control','placeholder'=>'choose city','required']) }}
			        </div>
			    </div> 
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4"> Stores </label>
			            <ul class="departments_ul">
			            	@foreach($stores as $store)
			            	<li>
			            	    <input type="checkbox" name="store_id[]" value="{{ $store->id }}" {{ in_array($store->id, $ids)?'checked':' '}} >{{ $store->name }} 
			            	</li>
			            	@endforeach
			            </ul>
			            
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop