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
                    <a href="{{ URL::to('admin/stores/'.$vendor_id) }}">Stores</a>
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
                {{ Form::open(['url'=>'admin/stores/add/'.$vendor_id,'files'=>true,'enctype'=>'multipart']) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,old('name_'.$lang->locale),['class'=>'form-control','placeholder'=>'Name In '.$lang->name]) }}
                    </div>  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Address In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('address_'.$lang->locale,old('name_'.$lang->locale),['class'=>'form-control','placeholder'=>'Address In '.$lang->name]) }}
                    </div>
                    @endforeach
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Icon</span>
                        </div>
                        <div class="custom-file">
                           {{ Form::file('image',['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Country </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('country_id',$countries,(old('country_id'))?old('country_id'):null,['class'=>'form-control','required','id'=>'country_id']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">City </span>
                                </div>
                                <div class="custom-file" id="city" data-city="{{ (old('city_id'))?old('city_id'):app('request')->input('city_id') }}">
                                    {{ Form::select('city_id',$cities,(old('city_id'))?old('city_id'):app('request')->input('city_id'),['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Minmum Order </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::number('minimum_order',null,['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Transportation Fee </span>
                                </div>
                                <div class="custom-file" >
                                     {{ Form::number('transportation_fee',null,['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file departments">
                            <h3>Departments</h3>
                           @foreach($departments as $key=>$dep)
                           <input type="radio" name="department_id" value="{{ $key }}" class="departments_country"> {{ $dep }}
                           @endforeach
                        </div>
                    </div>
                    <div class="input-group mb-3 restaurant_inputs hidden">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Open From </span>
                                </div>
                                <div class="custom-file">
                                   <input type="time"  name="open_from"   class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Closed At </span>
                                </div>
                                <div class="custom-file">
                                   <input type="time"   name="close_at"   class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> delivery time in minutes </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::number('delivery_time',null,['class'=>'form-control','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" id="departments_countries">
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Latitude </span>
                                </div>
                                <div class="custom-file" >
                                     <input type="text" name="latitude"  id="latitude" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Longitude </span>
                                </div>
                                <div class="custom-file" >
                                     <input type="text"  name="longitude" id="longitude" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div id="map" style="width: 100%;height: 500px"></div>
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
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSdyoCcCy9NtfBk8vqS5EO3A_hlu17fIk&callback=initMap&libraries=&v=weekly"
  async
></script>
<script type="text/javascript" src="{{ URL::to('assets/admin/js/locations.js') }}"></script>
@stop