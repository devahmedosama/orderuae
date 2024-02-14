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
                    <a href="{{ URL::to('admin/brands') }}">Brands</a>
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
                {{ Form::open(['url'=>'admin/brands/edit/'.$data->id,'files'=>true]) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,$lang->locale_name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name]) }}
                        
                    </div>
                    @endforeach
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           Icon
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        
                        <div class="custom-file">
                           {{ Form::file('image',['class'=>'form-control']) }}
                        </div>
                        <img src="{{ URL::to($data->image) }}"  height="120">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Category </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('category_id',App\Models\Category::all_cats(),$data->category_id,['class'=>'js-example-basic-single form-control']) }}
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