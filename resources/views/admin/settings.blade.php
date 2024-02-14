@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.Settings') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <span class="breadcrumb-item active">{{ trans('home.Settings') }}</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/settings','files'=>true,'enctype'=>'multipart']) }}			   
			    <div class="form-row">
			    	@foreach($langs as $lang)
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Name In {{ $lang->name }}</label>
			            {{ Form::text('name_'.$lang->locale,$lang->setting_name,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        @endforeach
			        <div class="form-group col-md-12">
			        	<label>Refund Days</label>
			        	{{ Form::number('refund_days',$data->refund_days,['class'=>'form-control','placeholder'=>'Refound Days','required','min'=>0]) }}
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
@stop