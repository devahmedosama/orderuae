@extends('admin.content.layout')

@section('content')

	<div class="page-header">

        <h2 class="header-title">{{ trans('home.My Profile') }}</h2>

        <div class="header-sub-title">

            <nav class="breadcrumb breadcrumb-dash">

                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>

                <span class="breadcrumb-item active">{{ $data->name }}</span>

            </nav>

        </div>

    </div>

	<div class="card">

		<div class="card-body">

			{{ Form::open(['url'=>'admin/users/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}

			    <div class="form-row">

			        <div class="form-group col-md-6">

			           {{ trans('home.Services') }} : {{ $data->service_name }}

			        </div>

			       

			    </div>

			    <div class="form-row">
			    	@foreach($langs as $lang)
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">Name In {{ $lang->name }}</label>
			            {{ Form::text('name_'.$lang->locale,$lang->user_name,['class'=>'form-control','placeholder'=>trans('home.Name'),'required']) }}
			        </div>
			        @endforeach
			    </div>

			    @if($data->type == 2)

			    <div class="form-row">

			        <div class="form-group col-md-6">

			            <label for="inputEmail4">{{ trans('home.Status') }}</label>

			            <input  type="radio" class="status_check_box" name="show" value="1" {{ ($data->show == 1)?'checked':'' }} > Activate  

			            <input type="radio" class="status_check_box"  name="show" value="0" {{ ($data->show != 1)?'checked':'' }} > Stop  

			        </div>

			    </div>

			    @endif

			    <div class="form-row">

			        <div class="form-group col-md-6">

			            <label for="inputEmail4">{{ trans('home.E-mail') }}</label>

			            {{ Form::email('email',$data->email,['class'=>'form-control','placeholder'=>trans('home.E-mail'),'required']) }}

			        </div>

			        <div class="form-group col-md-6">

			            <label for="inputEmail4">{{ trans('home.Phone') }}</label>

			            {{ Form::text('phone',$data->phone,['class'=>'form-control','placeholder'=>trans('home.Phone'),'required']) }}

			        </div>

			    </div>

			    <div class="form-row">

			        <div class="form-group col-md-12">

			            <label for="inputEmail4">{{ trans('home.Review') }}</label>

			            {{ Form::number('rate',$data->rate,['class'=>'form-control','min'=>'1','max'=>5]) }}

			        </div>

			    </div>

			    @if($data->type ==  2)

			    <div class="form-grp">

                    <label for="uea">{{ trans('home.Image') }} </label>

                    <div class="row">

                        <div class="col-lg-10">

                            {{ Form::file('image',['class'=>'form-control ','id'=>'user_image_file']) }}

                        </div>

                        <div class="col-lg-2">

                            <img src="{{ URL::to($data->image) }}" class="img-responsive img-thumbnail" id="user_image">

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label  for"uea">
                        {{ trans('home.Documents') }}

                    </label>

                     {{ Form::file('documents[]',['accept'=>"image/png, image/gif, image/jpeg" ,'class'=>'form-control ','id'=>'user_documents','multiple']) }}

                </div>
                <div class="form-group">

                  <ul id="documents_ul">

                    @foreach($data->documents as $document)

                    <li> <a class="close_img">X</a>

                      <input type="hidden" name="old_imgs[]" value="{{ $document }}">

                      <img src="{{ URL::to($document) }}" class="img-responsive">

                    </li>

                    @endforeach

                  </ul>

                </div>

			    <div class="form-row">
			    	@foreach($langs as $lang)
			        <div class="form-group col-md-6">
			            <label for="inputEmail4">About In {{ $lang->name }}</label>

			            {{ Form::textarea('text_'.$lang->locale,$lang->text,['class'=>'form-control','id'=>'editor_'.$lang->locale]) }}
			        </div>
			        @endforeach
					
			    </div>

			    <div class="form-row">
					@foreach($langs as $lang)
			        <div class="form-group col-md-6">

			            <label for="inputEmail4">Descriptrion</label>

			            {{ Form::textarea('description_'.$lang->locale,$lang->description,['class'=>'form-control','id'=>'editor_description_'.$lang->locale]) }}

			        </div>
			        @endforeach
					
			    </div>

			    @endif

			    <div class="form-row">

			        <div class="form-group col-md-6">

			            <label for="inputEmail4">{{ trans('home.Password') }}</label>

			            {{ Form::password('password',['class'=>'form-control']) }}

			        </div>

			        <div class="form-group col-md-6">

			            <label for="inputEmail4">{{ trans('home.Confirm Password') }}</label>

			            {{ Form::password('confirm_password',['class'=>'form-control']) }}

			        </div>

			    </div>

			    <button type="submit" class="btn btn-primary">{{ trans('home.Save') }}</button>

			{{ Form::token() }}

			{{ Form::close() }}

		</div>

	</div>

	<script src="https://cdn.ckeditor.com/4.5.7/full-all/ckeditor.js"></script>

	<script type="text/javascript">
	        @foreach($langs as $lang)
	        CKEDITOR.replace('editor_{{$lang->locale}}', {

	                  skin: 'moono',

	                  language:'{{$lang->locale}}',

	                  enterMode: CKEDITOR.ENTER_BR,

	                  shiftEnterMode:CKEDITOR.ENTER_P,
	                });
	        @endforeach
			CKEDITOR.replace('editor_description_en', {

	          skin: 'moono',

	          enterMode: CKEDITOR.ENTER_BR,

	          shiftEnterMode:CKEDITOR.ENTER_P,

	           toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },

	                     { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },

	                     { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },

	                     { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },

	                     { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },

	                     { name: 'links', items: [ 'Link', 'Unlink' ] },

	                     { name: 'insert', items: [ 'Image'] },

	                     { name: 'spell', items: [ 'jQuerySpellChecker' ] },

	                     { name: 'table', items: [ 'Table' ] }

	                     ],
	        });
	        CKEDITOR.replace('editor_description_ar', {

	                  skin: 'moono',

	                  language:'ar',

	                  enterMode: CKEDITOR.ENTER_BR,

	                  shiftEnterMode:CKEDITOR.ENTER_P,

	                   toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },

	                             { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },

	                             { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },

	                             { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },

	                             { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },

	                             { name: 'links', items: [ 'Link', 'Unlink' ] },

	                             { name: 'insert', items: [ 'Image'] },

	                             { name: 'spell', items: [ 'jQuerySpellChecker' ] },

	                             { name: 'table', items: [ 'Table' ] }

	                             ],
	                });
	</script>

@stop