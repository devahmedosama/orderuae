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
                    <a href="{{ URL::to('admin/stores/'.$id) }}">{{ $store->name }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin/restaurant/menu/'.$id) }}">Menu</a>
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
                {{ Form::open(['url'=>'admin/restaurant/menu/add/'.$id,'files'=>true,'enctype'=>'multipart']) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,old('name_'.$lang->locale),['class'=>'form-control','placeholder'=>'Name In '.$lang->name]) }}
                    </div>
                    @endforeach
                    <div class="input-group mb-3 text-right">
                        <button type="submit" class="btn btn-lg  btn-primary">Save</button>
                    </div>
                {{ Form::token() }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop