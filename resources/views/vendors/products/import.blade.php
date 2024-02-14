@extends('vendors.content.layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="row">
    <div class="col-12">

        <h1>{{ $title }}</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('vendors/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('vendors/dashboard/products/'.$id) }}">Products</a>
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
                {{ Form::open(['url'=>'vendors/dashboard/products/import/'.$id,'files'=>true,'enctype'=>'multipart']) }}
                    <div class="row">
                        @if($brands)
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Brand </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('brand_id',$brands,old('brand_id'),['class'=>'form-control js-example-basic-single','required','min'=>0,'placeholder'=>'Choose Brand ']) }}
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Category </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('category_id',$categories,old('category_id'),['class'=>'form-control js-example-basic-single','required','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> file </span>
                                </div>
                                <div class="custom-file">
                                   <input type="file" name="file" required class="form-control">
                                </div>
                            </div>
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
<script type="text/javascript">
    $('.js-example-basic-single').select2();
</script>
@stop