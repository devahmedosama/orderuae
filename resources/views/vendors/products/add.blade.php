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
                {{ Form::open(['url'=>'vendors/dashboard/products/add/'.$id,'files'=>true,'enctype'=>'multipart']) }}
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
                        <div class="{{ (count($brands))?'col-md-6':'col-md-12' }}">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Category </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('category_id',$categories,old('category_id'),['class'=>'form-control js-example-basic-single','required','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($store->department_id  == 2 || $store->department_id  == 1)
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Images </span>
                            </div>
                            <input type="hidden" name="color_id[]" value="{{\App\Models\Color::first()->id}}">
                            <div class="custom-file">
                               {{ Form::file('color_images_0[]',['class'=>'form-control','required']) }}
                            </div>
                        </div>
                    @else
                    <div id="colors">
                        <h3 >Colors</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Color  </span>
                                    </div>
                                    <div class="custom-file">
                                       {{ Form::select('color_id[]',$colors,null,['class'=>'form-control','required']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Images </span>
                                    </div>
                                    <div class="custom-file">
                                       {{ Form::file('color_images_0[]',['class'=>'form-control','required','multiple']) }}
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="text-right">
                        <a id="add_color"  class="btn btn-primary add_btn btn-md">
                            Add Color
                        </a>
                    </div>
                    @endif
                    @if($store->department_id  == 1)
                    <div id="sizes">
                        <h3 >add sizes  if it exists</h3>
                        
                    </div>
                    <div class="text-right">
                        <a id="add_size"  class="btn btn-primary add_btn btn-md">
                            Add Size
                        </a>
                    </div>
                    @endif
                    <div id="options">
                        <h3 >add options  if it exists</h3>
                        
                    </div>
                    <div class="text-right">
                        <a id="add_option"  class="btn btn-primary add_btn btn-md">
                            Add Option
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
                            <div class="input-group mb-3">
                                <h3> Specifications In {{ $lang->name }}</h3>
                                {{ Form::textarea('specifications_'.$lang->locale,$lang->locale_specifications,['class'=>'form-control','placeholder'=>'Specifications In '.$lang->name,'required','id'=>'editor_'.$lang->locale]) }}
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
<script src="https://cdn.ckeditor.com/4.5.7/full-all/ckeditor.js"></script>
<script type="text/javascript">
        @foreach($langs as $lang)
            var editor  =  'editor_{{ $lang->locale }}';
            CKEDITOR.replace('editor_{{ $lang->locale }}', {
              skin: 'moono',
              language:'{{ $lang->locale }}',
              toolbar: [
                      { name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', 'StrikeThrough', "-", 'TextColor', 'BGColor' ] },
                      { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                      { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
                      { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                      { name: 'links', items: [ 'Link', 'Unlink' ] },
                      { name: 'spell', items: [ 'jQuerySpellChecker' ] },
                      { name: 'table', items: [ 'Table' ] }
                    ],
              enterMode: CKEDITOR.ENTER_BR,
              shiftEnterMode:CKEDITOR.ENTER_P              
            });
        @endforeach
        var no =  1;
    $('#add_color').click(function(){

         $('#colors').append("<div class='row color_item'>\
            <a class='close_color'>x</a>\
            <div class='col-md-6'>\
                <div class='input-group mb-3'>\
                <div class='input-group-prepend'>\
                    <span class='input-group-text'> Color  </span>\
                </div>\
                <div class='custom-file'>\
                <div class='custom-file'>\
                  <select name='color_id[]' class='form-control'>\
                  @foreach($colors as $key=>$value)\
                  <option value='{{ $key }}'>{{ $value }}</option>\
                  @endforeach\
                  </select>\
                </div>\
                </div>\
                </div>\
            </div>\
            <div class='col-md-6'>\
                <div class='input-group mb-3'>\
                    <div class='input-group-prepend'>\
                        <span class='input-group-text'> Images </span>\
                    </div>\
                    <div class='custom-file'>\
                       <input type='file' name='color_images_"+no+"[]' multiple class='form-control' >\
                    </div>\
                </div>\
            </div>\
            </div>");
         no++;
         console.log(no);
         $('.close_color').click(function(){
                $(this).parent().remove();
            })

    })
    $('.close_color').click(function(){
        $(this).parent().remove();
    })
    </script>
@stop