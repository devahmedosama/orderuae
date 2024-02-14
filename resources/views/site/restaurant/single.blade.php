@extends('site.restaurant_content.layout')
@section('content')
<section class="content">
    <section class="rest-gallery">
        <div class="container">
            <div class="owl-carousel owl-theme rest-product-slide">
                    @foreach($data->metas as $meta)
                        @foreach($meta->image as $img)
                        <div class="item">
                            <img src="{{ URL::to($img) }}" alt="">
                        </div>
                        @endforeach
                    @endforeach
            </div>
        </div>
    </section>

    <section class="product-info">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class=" cart-side">
                        <p class="title">
                            {{ $data->name }}
                        </p>
                        <p class="desc">
                           {{ $data->text }}
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class=" cart-side">
                        @if($data->discount)
                        <p class="price">
                            Was :
                            <span class="before">
                                {{ trans('home.AED') }} {{ $data->price }}
                            </span>
                        </p>
                        <p class="price">
                            Now :
                            <span class="val">
                                {{ trans('home.AED') }} {{  $data->price_after_discount }}
                            </span>
                            <span class="hint">
                                {{ trans('home.Inclusive of VAT') }}
                            </span>
                        </p>
                        @else
                        <p class="price">
                            {{ trans('home.Price') }} :
                            <span>
                                {{ trans('home.AED') }} {{ $data->price_after_discount }}
                            </span>
                        </p>
                        @endif
                        <p class="cart-row-title">
                            {{ trans('home.Quantity') }}
                        </p>
                        <div class="cart-row">
                            <div class="quantity">
                                <i class="fas fa-minus min"></i>
                                <input class="item-quantity update-cart" data-id="{{ $data->id }}" type="number" id="quantity" min="1" max="1000" value="1">
                                <i class="fas fa-plus plus"></i>
                            </div>
                            
                            <button class="add-cart" data-id="{{ $data->id }}">
                                {{ trans('home.ADD TO CART') }}
                            </button>
                            @if(Auth::check())
                            <button class="fave add-fav {{ ($data->is_fav == 1)?'active':'' }}" data-id="{{ $data->id }}">
                                <i class="fas fa-heart"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="item-options">
        <div class="container">
            @if($data->sizes->count() > 0)
            <h2 class="block-line-title">
                {{ trans('home.Add Item Choices') }}
            </h2>
            @endif
            <input type="hidden" data-id="{{ $data->id }}" name="product_id" id="product_id">
            <div class="row">
                <div class="col-12 col-sm-5">
                    @if($data->sizes->count() > 0 || $data->upons->count() > 0 || $data->options->count() > 0)
                        <div class="title">
                            {{ trans('home.Size') }}
                        </div>
                        @foreach($data->sizes as $key=>$size)
                        <label class="custom-radio">
                            <div>
                                <input type="radio"  name="size" value="{{ $size->id }}" class="d-none product-size update-cart" {{ ($key==0)?'checked':'' }}>
                                <span class="icon"></span>
                                {{ $size->name }}
                            </div>
                            <p class="price">
                                <span class="after"> {{ $size->price }} {{  trans('home.AED') }}</span>
                            </p>
                        </label>
                        @endforeach
                    @endif
                    @if(count($data->upons))
                        <div class="title">
                            {{ trans('home.Upons') }}
                        </div>
                        @foreach($data->upons as $upon)
                        <label class="custom-radio">
                            <div>
                                <input type="checkbox" value="{{ $upon->id }}" name="upon[]" class="d-none product-upon update-cart">
                                <span class="icon"></span>
                                {{ $upon->name }}
                            </div>
                           <p class="price">
                            <span class="after"> {{ $upon->price }} {{  trans('home.AED') }}</span>
                            </p>
                        </label>
                        @endforeach
                    @endif

                    @if(count($data->options))
                            @foreach($data->options as $option)
                            <div class="title">
                                {{ $option->name }} 
                            </div>
                                @foreach($option->items as $item)
                                <label class="custom-radio">
                                    <div>
                                        <input type="checkbox" value="{{ $item->id }}" data-max="{{ $option->maximum }}" name="items[]" class="d-none product-option update-cart">
                                        <span class="icon"></span>
                                        {{ $item->name }}
                                    </div>
                                </label>
                                @endforeach
                            @endforeach
                    @endif
                   
                </div>
            </div>
        </div>
    </section>

    <section class="r-category">
        <div class="container">
            <h2 class="block-title">
                {{ trans('home.Popular Brands Near To You') }}
            </h2>
            <div class="row justify-content-center">
                @foreach($most_popular as $store)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ URL::to($lang.'/single/restaurant/'.$store->slug) }}" class="r-cat-box">
                        <img src="{{ URL::to('uploads/stores/thumbs_'.$store->id.'.jpg') }}" alt="{{ $store->name }}">
                        <p class="title">
                            {{ $store->name }} 
                        </p>
                        <span class="count">
                            {{ $store->delivery_time }} MIN
                        </span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    
    @if($full_ads)
    <img src="{{ URL::to($full_ads->image) }}" alt="" class="w-100 mb-5">
    @endif
    <section class="r-products-slider mb-5">
        <div class="container">
            <h2 class="block-title">
                {{ trans('home.Related Meals') }}
            </h2>
            <div class="owl-carousel owl-theme r-product-slide">
                @foreach($related as $item)
                <div class="item">
                    <a href="{{ URL::to($lang.'/single/meal/'.$item->id.'/'.$item->slug) }}" class="r-product-box">
                        <div class="img">
                            <img src="{{ URL::to($item->item_thumb) }}" alt="" class="">
                            @if($item->discount > 0)
                            <span class="offer">-{{ $item->discount }}%</span>
                            @endif
                        </div>
                        <div class="info">
                            <p class="title">
                                {{  $item->name }}
                            </p>
                            <p class="price">
                                {{ $item->price_after_discount }} {{ trans('home.AED') }}
                                @if($item->discount > 0)
                                <span class="before">
                                    {{ $item->price }} {{ trans('home.AED') }}
                                </span>
                                @endif
                            </p>
                            <p class="name">
                                {{ $item->store->name }}
                            </p>
                            <div class="icons">
                                <span class="icon">
                                    <i class="far fa-clock"></i>
                                    {{ $item->store->delivery_time }} {{ trans('home.mins') }}
                                </span>
                                <span class="icon">
                                    <i class="fas fa-truck"></i>
                                    {{ trans('home.AED') }} {{ $item->store->transportation_fee }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

   
</section>
@stop