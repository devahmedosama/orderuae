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
                    <a href="{{ URL::to('admin/stores/'.$data->vendor_id) }}">Stores</a>
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
                {{ Form::open(['url'=>'admin/stores/edit/'.$data->id,'files'=>true]) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,$lang->locale_name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name]) }}
                        
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Address In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('address_'.$lang->locale,$lang->locale_address,['class'=>'form-control','placeholder'=>'Address In '.$lang->name]) }}
                        
                    </div>
                    @endforeach
                    <div class="row">
                        @foreach($langs as $lang)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="lable-control">Info In {{ $lang->name }}</label>
                               
                                {{ Form::textarea('info_'.$lang->locale,$lang->locale_info,['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'id'=>'editor_'.$lang->locale]) }}
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           Image
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                           {{ Form::file('image',['class'=>'form-control']) }}
                        </div>
                        <img src="{{ URL::to($data->image) }}" height="120" >
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Country </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('country_id',$countries,$data->country_id,['class'=>'form-control','required','id'=>'country_id']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">City </span>
                                </div>
                                <div class="custom-file" id="city" data-city="{{ (old('city_id'))?old('city_id'):app('request')->input('city_id') }}">
                                    {{ Form::select('city_id',$cities,$data->city_id,['class'=>'form-control','required']) }}
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
                                   {{ Form::number('minimum_order',$data->minimum_order,['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Transportation Fee </span>
                                </div>
                                <div class="custom-file" >
                                     {{ Form::number('transportation_fee',$data->transportation_fee,['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="input-group mb-3">
                        <div class="custom-file departments">
                            <h3>Departments</h3>
                           @foreach($departments as $key=>$dep)
                           <input type="radio" name="department_id" value="{{ $key }}" class="departments_country" {{ ($data->department_id ==  $key)?'checked':'' }} > {{ $dep }}
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
                                   <input type="time" value="{{ $data->open_from }}" name="open_from"   class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Closed At </span>
                                </div>
                                <div class="custom-file">
                                   <input type="time"   value="{{ $data->close_at }}"  name="close_at"   class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> delivery time in minutes </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::number('delivery_time',$data->delivery_time,['class'=>'form-control','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" id="departments_countries">
                        
                        @if($categories)
                            <h3>Categories</h3>
                            @foreach($categories as $key=>$category)
                               <span>
                                   <input type="checkbox" name="store_category[]" value="{{ $category->category_id }}" {{ ($category->state == 1)?'checked':'' }}> {{ $category->category->name }}
                               </span>
                            @endforeach
                        @endif
                        @if($data->department_id  == 4)
                            <h3>Countries</h3>
                            @foreach($countries as $key=>$country)
                              <span>
                                  <input type="radio" name="store_country" value="{{ $key }}"  {{ ($data->export_from == $key)?'checked':'' }}> {{ $country }}
                              </span>
                               
                            @endforeach
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Latitude </span>
                                </div>
                                <div class="custom-file" >
                                     <input type="text" name="latitude" value="{{ $data->latitude }}" id="latitude" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Longitude </span>
                                </div>
                                <div class="custom-file" >
                                     <input type="text" value="{{ $data->longitude }}" name="longitude" id="longitude" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div id="map" style="width: 100%;height: 500px"></div>
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