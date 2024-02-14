@extends('admin.content.layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="row">
    <div class="col-12">

        <h1>{{ $title }}</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin/ads') }}">Ads</a>
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
                {{ Form::open(['url'=>'admin/ads/add','files'=>true,'enctype'=>'multipart']) }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">{{ trans('home.Image') }}</label>
                            {{ Form::file('image',['class'=>'form-control']) }}
                        </div>
                       
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Language </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('locale',$langs,null,['class'=>'js-example-basic-single form-control']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Department </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('department_id',App\Models\Department::items(),null,['class'=>'js-example-basic-single form-control','placeholder'=>'choose department']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ads Size </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('ads_size',$ads_sizes,null,['class'=>'js-example-basic-single form-control']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Category </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('category_id',App\Models\Category::all_cats(),null,['class'=>'js-example-basic-single form-control','placeholder'=>'choose category']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Store </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::select('store_id',App\Models\Store::all_stores(),null,['class'=>'js-example-basic-single form-control','placeholder'=>'choose store']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Product</span>
                        </div>
                        <div class="custom-file">
                           {{ Form::number('product_id',null,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Link</span>
                        </div>
                        <div class="custom-file">
                           {{ Form::url('link',null,['class'=>'form-control']) }}
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