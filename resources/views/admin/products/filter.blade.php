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
                    <a href="{{ URL::to('admin/products/'.$data->store_id) }}">{{ $data->store->name }}</a>
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
                {{ Form::open(['url'=>'admin/products/filters/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
                    <div class="row" >
                        @foreach($filters as $filter)
                        <div class="col-12 filter_item">
                            <h5>{{ $filter->name }}</h5>
                            <ul class="choose_ul">
                                @foreach($filter->items as $item)
                                <li>
                                    <input type="checkbox" name="category_filter_item_id[]"  value="{{ $item->id }}" {{ ($item->checked == 1)?'checked':'' }}> {{ $item->name }} 
                                </li>
                                @endforeach
                            </ul>
                            
                        </div> 
                        @endforeach
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