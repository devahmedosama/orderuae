@extends('site.content.layout')
@section('content')
<section class="content">
        <div class="white-bg">
            <section class="product-gallary">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @foreach($paths as $path)
                            <li class="breadcrumb-item"><a href="{{ URL::to($lang.'/single/category/'.$path->slug) }}">{{ $path->name }}</a></li>
                            @endforeach
                            <li class="breadcrumb-item active" aria-current="page"> {{ $data->name }}</li>
                        </ol>
                    </nav>
                    <div class="row justify-content-center product-info">
                        <div class="col-12 col-md-6">
                            <div class="owl-carousel owl-theme product-img-slide">
                                <?php $i =  0; ?>
                            	@foreach($data->metas as $meta)
		                            	@foreach($meta->image as $img)
		                                <div class="item">
		                                    <img src="{{ URL::to($img) }}" alt="{{ $data->name }}">
		                                </div>
                                        <?php $i++; ?>
		                                @endforeach
                                @endforeach
                            </div>
    
                            <div class="owl-carousel owl-theme product-imgs-slide">
                                @if($i > 1)
                                	@foreach($data->metas as $meta)
    		                            	@foreach($meta->image as $key=>$img)
    		                                <div class="item">
    		                                    <img src="{{ URL::to('uploads/products/thumbs/'.$key.'_'.$meta->id.'.jpg') }}" alt="{{ $data->name }}">
    		                                	
    		                                </div>
    		                                @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 cart-side">
                            <p class="title">
                                {{ $data->name }}
                            </p>
                            <!-- <p class="desc">
                                {{ $data->text }}
                            </p> -->
                            <p class="model">
                               
                                <span class="rate">
                                    {{ $data->rate }}
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="count">
                                    {{  $data->reviews->count() }} {{ trans('home.Rating') }}
                                </span>
                            </p>
                            @if($data->discount)
                            <p class="price">
                                {{ trans('home.Was') }} : 
                                <span class="before">
                                    {{ trans('home.AED') }}  {{ $data->price }}
                                </span>
                            </p>
                            <p class="price">
                                {{ trans('home.Now') }} : 
                                <span class="val">
                                {{ $data->price_after_discount }}    {{ trans('home.AED') }} 
                                </span>
                               
                            </p>
                            @else
                            <p class="price">
                                {{ trans('home.Price') }} : 
                                <span class="val">
                                   {{ $data->price }}   {{ trans('home.AED') }}
                                </span>
                            </p>
                            @endif
                            @if($data->brand))
                            <p class="price">
                                {{ trans('home.Brand') }} : 
                                <a href="{{ URL::to($lang.'/single/brand/'.$data->brand->slug) }}" class="brand-title">
                                   {!! $data->brand->name !!}
                                </a>
                            </p>
                            @endif
                            <div class="delivery">
                                <span class="time">
                                    {{ trans('home.order in') }} {{ $data->delivery_time }} {{ trans('home.hrs') }}
                                </span>
                                <p class="free-delivery">
                                    <span class="left">
                                        <span class="date">
                                        </span>
                                    </span>
                                    @if($data->delivery_time <= 24)
                                     <img src="{{ URL::to('assets/site/') }}/img/express.svg" alt=""> 
                                    @endif
                                </p>
                                <!-- <p class="free-delivery">

                                    <img src="{{ URL::to('assets/site/') }}/img/express.svg" alt="">
                                </p> -->
                               
                            </div>
                            <p class="cart-row-title">
                                {{ trans('home.Quantity') }}
                            </p>

                            <div class="cart-row">
                                 <div class="quantity">
                                    <i class="fas fa-minus min"></i>
                                    <input class="item-quantity" data-id="{{ $data->id }}" type="number" id="quantity" min="1" max="1000" value="1">
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
            </section>
    
            <section class="product-info">
                <div class="container">
                    <div class="row">
                        
                    </div>
                </div>
            </section>
            @if($data->ads)
            <div class="container">
                <img src="{{ URL::to($data->ads->image) }}" alt="" class="w-100 mb-4">
            </div>
            @endif
            <section class="overview-tabs">
                <div class="container">
                    <ul class="nav" id="pills-tab" role="tablist">
                        <li class="" role="presentation">
                            <a class="active" data-toggle="pill" href="#overview">
                                {{ trans('home.Overview') }}
                            </a>
                        </li>
                        @if($data->specifications)
                        <li class="" role="presentation">
                            <a class="" data-toggle="pill" href="#specific">
                                {{ trans('home.Specifications') }}
                            </a>
                        </li>
                        @endif
                        <li class="" role="presentation">
                            <a class="" data-toggle="pill" href="#reviews">
                                {{ trans('home.Reviews') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="overview">
                           {{ $data->text }}
                        </div>
                        <div class="tab-pane fade" id="specific">
                            {{ $data->specifications }}
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <div class="row align-items-center rating-row">
                                <div class="col-12 col-md-12">
                                    <div class="rating-side">
                                        <div class="row align-items-center">
        
                                            <div class="col-12 col-sm-6">
                                                <div class="rates">
                                                    <p class="title">
                                                        {{ trans('home.Overall Rating') }}
                                                    </p>
            
                                                    <p class="percent">
                                                        {{ $data->rate }}/5
                                                    </p>
            
                                                    <div class="stars">
                                                        <i class="fas fa-star active"></i>
                                                        <i class="fas fa-star active"></i>
                                                        <i class="fas fa-star active"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
            
                                                    <p class="count">
                                                        {{ trans('home.Based on') }} {{ $data->reviews->count() }} {{ trans('home.rating') }}
                                                    </p>
                                                </div>
                                            </div>
        
                                            <div class="col-12 col-sm-6">
                                                <div class="progress-side">
                                                    <div class="progress-row">
                                                        <span class="star">5</span>
                                                        <div class="progress-bar">
                                                            <div class="bar" style="width:{{ $data->rate_5  }}%;"></div>
                                                        </div>
                                                        <span class="count">{{  $data->reviews->where('rate',5)->count() }}</span>
                                                    </div>
            
                                                    <div class="progress-row">
                                                        <span class="star">4</span>
                                                        <div class="progress-bar">
                                                            <div class="bar" style="width: {{ $data->rate_4 }}%;"></div>
                                                        </div>
                                                        <span class="count">{{  $data->reviews->where('rate',4)->count() }}</span>
                                                    </div>
            
                                                    <div class="progress-row">
                                                        <span class="star">3</span>
                                                        <div class="progress-bar">
                                                            <div class="bar" style="width: {{ $data->rate_3}}%;"></div>
                                                        </div>
                                                        <span class="count">{{  $data->reviews->where('rate',3)->count() }}</span>
                                                    </div>
            
                                                    <div class="progress-row">
                                                        <span class="star">2</span>
                                                        <div class="progress-bar">
                                                            <div class="bar" style="width:{{$data->rate_2}}%;"></div>
                                                        </div>
                                                        <span class="count">{{  $data->reviews->where('rate',2)->count() }}</span>
                                                    </div>
            
                                                    <div class="progress-row">
                                                        <span class="star">1</span>
                                                        <div class="progress-bar">
                                                            <div class="bar" style="width: {{ $data->rate_1}}%;"></div>
                                                        </div>
                                                        <span class="count">{{  $data->reviews->where('rate',5)->count() }}</span>
                                                    </div>
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- start products-slider -->
        <div class="container mb-5">
            <div class="white-bg p-3 p-md-5">
                <section class="products-slider p-0">
                    <div class="title-head">
                        <p class="section-title">
                            {{ trans('home.Recommended Products') }}
                        </p>
                    </div>
                    <div class="owl-carousel owl-theme products-slide">
                        @foreach($data->recommends as $item)
                        <div class="item">
                            <a href="{{ URL::to($lang.'/single/product/'.$item->id.'/'.$item->slug.'?id='.$item->id) }}" class="product-box category-item">
                                    <img src="{{ URL::to($item->item_thumb) }}" loading="lazy" alt="" class="img">
                                    <div class="product-info">
                                        <span class="title">
                                            {{ $item->name }}
                                        </span>
                                        
                                        <span class="price">
                                            {{ trans('home.AED') }} 
                                            <span>{{ $item->price }}</span>
                                        </span>
                                        @if($item->discount)
                                        <span class="offer">
                                            <span class="before">
                                                {{ trans('home.AED') }}  {{ $item->price_after_discount }}
                                            </span>
                                            {{ $item->discount }}% Off
                                        </span>
                                        @endif
                                        <span class="delivery-date">
                                            Arrives 
                                            <span>Tomorrow, Jan 2</span>
                                        </span>
                                        <span class="peoduct-foot">
                                            <span class="rate">
                                                <span class="number">
                                                    <i class="fas fa-star"></i>
                                                    {{  $item->rate }}
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </a>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
	</section>
@stop