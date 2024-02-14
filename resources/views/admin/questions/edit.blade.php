@extends('admin.content.layout')
@section('content')
<div class="row">
    <div class="col-12">

        <h1>{{ $title }}</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin/questions') }}">Common Questions </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                {{ Form::open(['url'=>'admin/questions/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Title</span>
                                </div>
                                {{ Form::text('name',$data->name,['class'=>'form-control','placeholder'=>'Name','required']) }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                   {{ Form::file('image',['class'=>'form-control']) }}
                                </div>
                                <img src="{{ URL::to($data->image) }}"  height="120">
                            </div>
                            {{ Form::textarea('text',$data->text,['class'=>'form-control','placeholder'=>'text','required','id'=>'editor_en']) }}
                            <div class="input-group mb-3"></div>
                        </div>
                    </div>
                    <div class="input-group mb-3 text-right">
                        <button type="submit" class="btn btn-lg  btn-primary">Save</button>
                    </div>
                {{ Form::token() }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.5.7/full-all/ckeditor.js"></script>
<script type="text/javascript">
        CKEDITOR.replace('editor_en');
</script>
@stop