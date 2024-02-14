@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ $data->name }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/pages') }}">{{ trans('home.Pages') }}</a>
                <span class="breadcrumb-item active">{{ $data->name }}</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url'=>'admin/pages/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
			    
			    <div class="form-row">
			        <div class="form-group col-md-10">
			            <label for="inputEmail4">{{ trans('home.Icon') }}</label>
			            {{ Form::file('image',['class'=>'form-control']) }}
			        </div>
			        <div class="form-group col-md-2">
			        	<img src="{{ URL::to($data->image) }}" class="img-responsive img-thumbnail" width="150">
			        </div>
			        @foreach($langs as $lang )
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Name In {{ $lang->name }}</label>
			            {{ Form::text('name_'.$lang->locale,$lang->page_name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
			        </div>
			        @endforeach
			        @foreach($langs as $lang )
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Text In {{ $lang->name }}</label>
			            {{ Form::textarea('text_'.$lang->locale,$lang->page_text,['class'=>'form-control','placeholder'=>'Text In '.$lang->name,'required','rows'=>3,'id'=>'editor_'.$lang->locale]) }}
			        </div>
			        @endforeach
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