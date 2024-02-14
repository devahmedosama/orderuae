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
                {{ Form::open(['url'=>'vendors/dashboard/restaurant/items/add/'.$id,'files'=>true,'enctype'=>'multipart']) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Price </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::number('price',old('price'),['class'=>'form-control','required','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Partner SKU </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::text('partner_sku',old('partner_sku'),['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                        @if($menu)
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Type </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('menu_id',$menu,old('brand_id'),['class'=>'form-control js-example-basic-single','required','min'=>0,'placeholder'=>'Choose Type ']) }}
                                </div>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="category_id" value="{{ $store->category_id }}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Images </span>
                        </div>
                        <input type="hidden" name="color_id" value="{{\App\Models\Color::first()->id}}">
                        <div class="custom-file">
                           {{ Form::file('images[]',['class'=>'form-control','required','multiple']) }}
                        </div>
                    </div>
                    <div id="sizes">
                        <h3 >add sizes  if it exists</h3>
                        
                    </div>
                    <div class="text-right">
                        <a id="add_size"  class="btn btn-primary add_btn btn-md">
                            Add Size
                        </a>
                    </div>
                    <div id="options">
                        <h3 >add options  if it exists</h3>
                        
                    </div>
                    <div class="text-right">
                        <a id="add_option"  class="btn btn-primary add_btn btn-md">
                            Add Option
                        </a>
                    </div>
                    <div id="upon">
                        <h3 >add upon  if it exists</h3>
                        
                    </div>
                    <div class="text-right">
                        <a id="add_upon"  class="btn btn-primary add_btn btn-md">
                            Add Upon
                        </a>
                    </div>
                    <div class="row">
                        @foreach($langs as $lang)
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                                </div>
                                {{ Form::text('name_'.$lang->locale,old('name_'.$lang->locale),['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
                            </div>
                             <div class="input-group mb-3">
                                {{ Form::textarea('text_'.$lang->locale,old('text_'.$lang->locale),['class'=>'form-control','placeholder'=>'text In '.$lang->name,'required']) }}
                            </div>
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
<script type="text/javascript">
   $('.js-example-basic-single').select2();
    
</script>
@stop