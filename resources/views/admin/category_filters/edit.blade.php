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
                    <a href="{{ URL::to('admin/category/filters/'.$data->category_id) }}">category filters</a>
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
                {{ Form::open(['url'=>'admin/category/filters/edit/'.$data->id,'files'=>true]) }}
                    @foreach($langs as $lang)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                        </div>
                        {{ Form::text('name_'.$lang->locale,$lang->locale_name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name]) }}
                    </div>
                    @endforeach
                    <div id="filter_items">
                        <h3 >Filter  Items</h3>
                        @foreach($data->items as $item)
                        <div class="row gurantee_item">
                           <a class="close_item">X</a>
                           <input type="hidden" name="item_id[]" value="{{ $item->id }}">
                           @foreach($langs as $lang)
                           <?php $locale =  \App\Models\CategoryFilterItemLocale::where('locale',$lang->locale)->where('category_filter_item_id',$item->id)->first(); ?> 
                            <div class="col-md-6">          
                                <input name="old_item_{{ $lang->locale }}[]" placeholder="name in {{ $lang->name }}" value="{{ $locale->name }}" class="form-control">       
                            </div>
                            @endforeach
                        </div>
                        @endforeach
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
@stop