@extends('site.restaurant_content.layout')
@section('content')
<section class="content">
        <section class="home-slider">
            <div class="owl-carousel owl-theme main-slide">
            	@foreach($sliders as $slide)
                <div class="item">
                    <a href="{{ $slide->link }}">
                        <img src="{{ URL::to($slide->image) }}" alt="" class="w-100">
                    </a>
                </div>
                @endforeach
            </div> 
        </section>

        <section class="r-category">
            <div class="container">
                <h2 class="block-title">
                    {{ trans('home.Popular Brands Near To You') }}
                </h2>
                <div class="row justify-content-center">
                    @foreach($stores as $store)
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

        <section class="r-products-slider mb-5">
            <div class="container">
                <h2 class="block-title">
                    {{ trans('home.50 % Off - Super Saver') }}
                </h2>
                <div class="owl-carousel owl-theme r-product-slide">
                    @foreach($products as $item)
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
        @if($full_ads)
        <img src="{{ URL::to($full_ads->image) }}" alt="" class="w-100 mb-5">
        @endif
        <section class="r-products-slider mb-5">
            <div class="container">
                <h2 class="block-line-title">
                    {{ trans('home.Free Delivery') }}
                </h2>
                <div class="owl-carousel owl-theme r-product-slide">
                    @foreach($free_delivery as $item)
                    <div class="item">
                        <a href="" class="r-product-box">
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
        @if($full_ads2)
        <img src="{{ URL::to($full_ads2->image) }}" alt="" class="w-100 mb-5">
        @endif
        <section class="r-products-slider mb-5">
            <div class="container">
                <h2 class="block-center-title">
                    <span>{{ trans('home.Most Popular') }}</span>
                </h2>
                <div class="owl-carousel owl-theme r-product-slide">
                     @foreach($free_delivery as $item)
                    <div class="item">
                        <a href="" class="r-product-box">
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