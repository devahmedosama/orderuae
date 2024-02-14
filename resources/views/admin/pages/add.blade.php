@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.Add New Page') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/pages') }}">{{ trans('home.Pages') }}</a>
                <span class="breadcrumb-item active">{{ trans('home.Add New Page') }}</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/pages/add','files'=>true,'enctype'=>'multipart']) }}
			    
			    <div class="form-row">
			        <div class="form-group col-md-12">
			            <label for="inputEmail4">{{ trans('home.Image') }}</label>
			            {{ Form::file('image',['class'=>'form-control'],'required') }}
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
			            {{ Form::textarea('text_'.$lang->locale,null,['class'=>'form-control','placeholder'=>'Text In '.$lang->name,'required','rows'=>3,'id'=>'editor_'.$lang->locale]) }}
			        </div>
			        @endforeach
			    </div>
			    </div>
			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>
			{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
    <script src="https://cdn.ckeditor.com/4.5.7/full-all/ckeditor.js"></script>
	<script type="text/javascript">
	        CKEDITOR.replace('editor_en', {
	          skin: 'moono',
	          enterMode: CKEDITOR.ENTER_BR,
	          shiftEnterMode:CKEDITOR.ENTER_P
	          
	          
	        });
	        CKEDITOR.replace('editor_ar', {
	                  skin: 'moono',
	                  language:'ar',
	                  enterMode: CKEDITOR.ENTER_BR,
	                  shiftEnterMode:CKEDITOR.ENTER_P
	                 
	                });
	</script>
@stop