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
                    <a href="{{ URL::to('admin/vendors') }}">Vendors</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin/stores/'.$store->vendor_id) }}">{{ $store->vendor->name }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin/products/'.$data->store_id) }}">products</a>
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
                 {{ Form::open(['url'=>'admin/products/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Price </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::number('price',$data->price,['class'=>'form-control','required','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Partner SKU </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::text('partner_sku',$data->partner_sku,['class'=>'form-control','required']) }}
                                </div>
                            </div>
                        </div>
                        @if(count($brands))
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Brand   </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('brand_id',$brands,$data->brand_id,['class'=>'form-control js-example-basic-single','min'=>0,'placeholder'=>'Choose Brand ']) }}
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class=" {{ (count($brands))?'col-md-6':'col-md-12' }} ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Category  </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('category_id',$categories,$data->category_id,['class'=>'form-control js-example-basic-single','required','min'=>0]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($store->department_id  == 2  || $store->department_id == 1)
                        @if(count($data->metas))
                           @foreach($data->metas as $key=>$meta)
                            <?php  $name =  'old_color_images_'.$key; ?>
                            <div class="row color_item">
                                <div class="col-md-12">
                                    <input type="hidden" name="old_colors[]" value="{{ $meta->id }}">
                                    <input type="hidden" name="old_color_id[]" value="{{ $meta->color_id }}">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> Images </span>
                                        </div>
                                        <div class="custom-file">
                                           {{ Form::file($name.'[]',['class'=>'form-control','multiple']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="imgs_ul">
                                        @foreach($meta->image as $img)
                                            <li>
                                                <a class="close_img">X</a>
                                                <input type="hidden" name="old_imgs_{{$key}}[]" value="{{ $img }}">
                                                <img src="{{ URL::to($img) }}" height="120">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                           @endforeach
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="color_id[]" value="{{\App\Models\Color::first()->id}}">
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
                        @endif
                    @else
                    <div id="colors">
                        <h3 >Colors</h3>
                        @if(count($data->metas))
                           @foreach($data->metas as $key=>$meta)
                            <?php  $name =  'old_color_images_'.$key; ?>
                            <div class="row color_item">
                                <a class='close_color'>x</a>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> Color  </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="hidden" name="old_colors[]" value="{{ $meta->id }}">
                                           {{ Form::select('old_color_id[]',$colors,$meta->color_id,['class'=>'form-control','required']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> Images </span>
                                        </div>
                                        <div class="custom-file">
                                           {{ Form::file($name.'[]',['class'=>'form-control','multiple']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="imgs_ul">
                                        @foreach($meta->image as $img)
                                            <li>
                                                <a class="close_img">X</a>
                                                <input type="hidden" name="old_imgs_{{$key}}[]" value="{{ $img }}">
                                                <img src="{{ URL::to($img) }}" height="120">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                           @endforeach
                        @else
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
                        @endif
                    </div>
                    <div class="text-right">
                        <a id="add_color"  class="btn btn-primary add_btn btn-md">
                            Add Color
                        </a>
                    </div>
                    @endif
                    @if($store->department_id  == 2  || $store->department_id == 1)
                    <div id="sizes">
                        <h3 >add sizes  if it exists</h3>
                        @foreach($data->sizes as $size)
                        <div class="row color_item">
                            <a class="close_color">x</a>  
                            <input type="hidden" name="size_id[]" value="{{ $size->id }}">
                            @foreach($langs as $lang)   
                               <?php $locale =  App\Models\ProductSizeLocale::where('locale',$lang->locale)->where('product_size_id',$size->id)->first();  ?>     
                               <div class="col-md-4">
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">                  
                                        <span class="input-group-text"> Name  </span>              
                                       </div>
                                     <div class="custom-file">
                                        <div class="custom-file">
                                             <input type="text" value="{{ ($locale)?$locale->name:'' }}" class="form-control" required="" name="old_size_name_{{ $lang->locale }}[]">              
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            @endforeach
                            <div class="col-md-4">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">                     
                                  <span class="input-group-text"> Price </span>               
                                </div>
                                <div class="custom-file">
                                    <input type="number" value="{{ $size->price }}" required="" min="0" class="form-control" name="old_size_price[]">
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-right">
                        <a id="add_size"  class="btn btn-primary add_btn btn-md">
                            Add Size
                        </a>
                    </div>
                    @endif
                    <div id="options">
                        <h3 >add options  if it exists</h3>
                        @foreach($data->options as $option)
                        <div class="row color_item">
                           <a class="close_color">x</a> 
                           <input type="hidden" name="option_id[]" value="{{$option->id}}">
                           @foreach($langs as $lang)     
                           <?php $locale =  App\Models\ProductOptionLocale::where('locale',$lang->locale)->where('product_option_id',$option->id)->first(); ?>    
                           <div class="col-md-6">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">                  
                                    <span class="input-group-text"> Name In {{ $lang->name }}  </span>              
                                 </div>
                                 <div class="custom-file">
                                    <div class="custom-file">                
                                        <input type="text" value="{{ ($locale)?$locale->name:'' }}" placeholder="enter the question title in {{ $lang->name }} " class="form-control" required="" name="option_name_{{ $lang->locale }}[]">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           <div class="col-md-6">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">                 
                                  <span class="input-group-text"> Minimum Options  </span>
                                 </div>
                                 <div class="custom-file">
                                    <div class="custom-file">                
                                        <input type="number" value="{{ $option->minimum }}" min="0" class="form-control" required="" name="old_min_option[]">              
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">                  
                                    <span class="input-group-text"> maximum Options  </span>
                                 </div>
                                 <div class="custom-file">
                                    <div class="custom-file">                
                                        <input type="number" value="{{ $option->minimum }}" min="0" class="form-control" required="" name="old_max_option[]">              
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 option_items">
                                <a class="btn btn-primary add_option btn-xs add_option_item2" data-id="{{ $option->id }}"> add item</a>              
                              <h3> Options </h3>
                              @foreach($option->items as $item)
                              <div class="row choose_item">
                                <input type="hidden" name="old_option_item[]" value="{{ $item->id }}">
                                <a class="close_color">x</a>
                                 @foreach($langs as $lang)
                                 <?php $locale =  App\Models\OptionItemLocale::where('locale',$lang->locale)->where('option_item_id',$item->id)->first(); ?>
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> option in {{ $lang->name }} </span>
                                    </div>
                                    <div class="custom-file">   
                                        <input type="text" value="{{ ($locale)?$locale->name:'' }}" require="" placeholder="first option" class="form-control" name="option_items_{{ $item->id }}_{{$lang->locale}}">
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                              @endforeach
                           </div>
                        </div>
                        @endforeach
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
                                {{ Form::text('name_'.$lang->locale,$lang->locale_name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
                            </div>
                             <div class="input-group mb-3">
                                {{ Form::textarea('text_'.$lang->locale,$lang->locale_text,['class'=>'form-control','placeholder'=>'text In '.$lang->name,'required']) }}
                            </div>
                            <div class="input-group mb-3">
                                <h3> Specifications In {{ $lang->name }}</h3>
                                {{ Form::textarea('specifications_'.$lang->locale,$lang->locale_specifications,['class'=>'form-control','placeholder'=>'Specifications In '.$lang->name,'required','id'=>'editor_'.$lang->locale]) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @foreach($data->gurantees as $gurantee)
                    <div class="row gurantee_item">
                         <a class="close_item">X</a> 
                         @foreach($langs as $lang)
                         <?php  
                             $name = '';
                             $text = '';
                             $locale = App\Models\ProductGuranteeLocale::where('locale',$lang->locale)->where('product_gurantee_id',$gurantee->id)->first();
                             if ($locale) {
                                 $name =  $locale->name;
                                 $text =  $locale->text;
                             }
                          ?>
                         <div class="col-md-6">
                            <div class="input-group mb-3">
                               <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Name In {{ $lang->name }}</span>
                                
                               </div>
                               {{ Form::text('old_gurantee_'.$lang->locale.'[]',$name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
                            </div>
                            <div class="input-group mb-3">
                               <label class="label-control">text in {{ $lang->name }}</label>
                               {{ Form::textarea('old_gurantee_text_'.$lang->locale.'[]',$text,['class'=>'form-control ck-gurantee','placeholder'=>'text in'.$lang->name,'required']) }}
                            </div>
                         </div>
                         @endforeach
                         <div class="col-md-10">
                             <input type="hidden" name="old_gurantee[]" value="{{ $gurantee->id }}">
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Icon </span>
                                </div>
                              <div class="custom-file">
                                 <input class="form-control" name="old_gurantee_image[]" type="file">
                              </div> 
                             </div>
                         </div>
                         <div class="col-md-2">
                            <img src="{{ URL::to($gurantee->image) }}" class="img-thumbnail img-responsive" height="80">
                         </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div id="gurantees">
                                <h3 >add  item gurantee</h3>
                            </div>
                            <div class="text-right">
                                <a id="add_gurantee"  class="btn btn-primary add_btn btn-md">
                                    Add Gurantee
                                </a>
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
        var no =  0;
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