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
                    <a href="{{ URL::to('vendors/dashboard/products/'.$data->store_id) }}">products</a>
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
                 {{ Form::open(['url'=>'vendors/dashboard/restaurant/items/edit/'.$data->id,'files'=>true,'enctype'=>'multipart']) }}
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
                        @if($menu)
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Type </span>
                                </div>
                                <div class="custom-file">
                                   {{ Form::select('menu_id',$menu,$data->menu_id,['class'=>'form-control js-example-basic-single','required','min'=>0,'placeholder'=>'Choose Type ']) }}
                                </div>
                            </div>
                        </div>
                        @endif
                       
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Images </span>
                        </div>
                        <div class="custom-file">
                           {{ Form::file('images[]',['class'=>'form-control','multiple']) }}
                        </div>
                    </div>
                    @if(count($data->metas))
                    <div class="input-group mb-3">
                        <ul class="imgs_ul">
                            @foreach($data->metas[0]->image as $image)
                                <li>
                                    <a class="close_img">X</a>
                                    <input type="hidden" name="old_imgs[]" value="{{ $image }}">
                                    <img src="{{ URL::to($image) }}" height="120">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
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
                    <div id="upon">
                        <h3 >add upon  if it exists</h3>
                        @foreach($data->upons as $upon)
                        <input type="hidden" name="upon_id[]" value="{{ $upon->id }}">
                        <div class="row color_item">
                           <a class="close_color">x</a>  
                           @foreach($langs as $lang)  
                           <?php $locale = App\Models\UponLocale::where('locale',$lang->locale)->where('upon_id',$upon->id)->first(); ?>      
                           <div class="col-md-4">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">               
                                    <span class="input-group-text">{{ $lang->name }} title   </span>
                                 </div>
                                 <div class="custom-file">
                                    <div class="custom-file">
                                        <input type="text" value="{{ ($locale)?$locale->name:'' }}" placeholder="enter the title in {{  $lang->name }} " class="form-control" required="" name="old_upon_name_{{ $lang->locale }}[]">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           <div class="col-md-4">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">                  
                                    <span class="input-group-text"> Price  </span>
                                 </div>
                                 <div class="custom-file">
                                    <div class="custom-file">                
                                        <input type="number" value="{{ $upon->price }}" class="form-control" required="" name="old_upon_price[]">              
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
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
                                {{ Form::text('name_'.$lang->locale,$lang->locale_name,['class'=>'form-control','placeholder'=>'Name In '.$lang->name,'required']) }}
                            </div>
                             <div class="input-group mb-3">
                                {{ Form::textarea('text_'.$lang->locale,$lang->locale_text,['class'=>'form-control','placeholder'=>'text In '.$lang->name,'required','id'=>'editor_en']) }}
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
<script src="{{ URL::to('assets/vendors/dashboard') }}/js/vendor/ckeditor5-build-classic/ckeditor.js"></script>
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