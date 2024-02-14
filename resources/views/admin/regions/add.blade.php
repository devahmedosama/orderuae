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
                    <a href="{{ URL::to('admin/regions') }}">Regions</a>
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
                {{ Form::open(['url'=>'admin/regions/add','files'=>true,'enctype'=>'multipart']) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,old('name_'.$lang->locale),['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
                    </div>
                    @endforeach
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Counytry  </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('country_id',$countries,(old('country_id'))?old('country_id'):$country_id,['class'=>'form-control','required','id'=>'country_id']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> City</span>
                        </div>
                        <div class="custom-file" id="city" data-city="{{ (old('city_id'))?old('city_id'):app('request')->input('city_id') }}">
                           {{ Form::select('city_id',$items,(old('city_id'))?old('city_id'):app('request')->input('city_id'),['class'=>'form-control','required']) }}
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
@stop