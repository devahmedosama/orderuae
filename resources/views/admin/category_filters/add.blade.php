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
                    <a href="{{ URL::to('admin/categories?parent_id='.$category->parent_id) }}">{{ ($category->parent)?$category->parent->name:' All Categories' }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }} Add Filter</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                {{ Form::open(['url'=>'admin/category/filters/add/'.$category->id,'files'=>true,'enctype'=>'multipart']) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,old('name_'.$lang->locale),['class'=>'form-control','placeholder'=>'Name In '.$lang->name]) }}
                    </div>
                    @endforeach
                    <div id="filter_items">
                        <h3 >Filter  Items</h3>
                        
                    </div>
                    <div class="text-right">
                        <a id="add_filter_item"  class="btn btn-primary add_btn btn-md">
                            Add Item
                        </a>
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