@extends('site.content.layout')
@section('content')
<section class="content">
        <section class="filters-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="filter-head">
                            <p class="title">{{ trans('home.Filter') }}</p>
                            <i class="fas fa-filter open-filter"></i>
                        </div>
                        <form class="filter">
                            <i class="fas fa-times close-filter"></i>
                            <!-- Fullfillment filter -->
                            <div class="collapse-container">
                                <div class="custom-collapse main">
                                    <button class="action">
                                        {{ trans('home.Fullfillment') }}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="collapse-body show">
                                        <label class="custom-check">
                                            <input type="checkbox" class="d-none">
                                            <i class="fas fa-check"></i>
                                            <img src="{{ URL::to('assets/site/') }}/img/express.svg" alt="">
                                        </label>
                                    </div>
                                </div>

                                
                                
                                <!-- Price filter -->
                                <div class="custom-collapse main">
                                    <button class="action">
                                        {{ trans('home.Price(AED)') }}
                                        <i class="fas fa-chevron-down"></i>
                                        
                                    </button>
                                    <div class="collapse-body show">
                                        <div class="price-range">
                                            <input name="low_price" type="number" value="{{ $brand->low_price }}" placeholder="{{ $brand->low_price }}" class="filter_action">
                                            {{ trans('home.To') }}
                                            <input name="up_price" type="number" value="{{ $brand->up_price }}" placeholder="{{ $brand->up_price }}" class="filter_action">
                                        </div>
                                    </div>
                                </div>

                                <!-- Price filter -->
                                <div class="custom-collapse main">
                                    <button class="action">
                                        {{ trans('home.Rating') }}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="collapse-body show">
                                        <div class="average-slider">
                                            <span class="stars">
                                                <span class="count">23</span>
                                                {{ trans('home.Star Or More') }}
                                            </span>
                                            <input type="range" min="0" max="50" class="slider" value="{{ $rate }}" id="range_slider">
                                            <div class="minmax">
                                                <span>1 {{ trans('home.Star') }}</span>
                                        <span>5 {{ trans('home.Stars') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Arrivals filter -->
                                <div class="custom-collapse main">
                                    <button class="action">
                                        {{ trans('home.New Arrivals') }}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="collapse-body show">
                                        <label class="custom-check">
                                            <input type="radio" name="arrival" value="7" class="d-none filter_action" {{ (app('request')->input('arrival')==7)?'checked':'' }}>
                                            <i class="fas fa-check"></i>
                                            <span class="between">
                                                {{ trans('home.Last 7 days') }}
                                                <span>
                                                    ({{ $brand->last_7 }})
                                                </span>
                                            </span>
                                        </label>
                                        <label class="custom-check">
                                            <input type="radio" name="arrival" value="30" class="d-none filter_action" {{ (app('request')->input('arrival')==30)?'checked':'' }}>
                                            <i class="fas fa-check"></i>
                                            <span class="between">
                                                {{ trans('home.Last 30 days') }}
                                                <span>
                                                    ({{ $brand->last_30 }})
                                                </span>
                                            </span>
                                        </label>
                                        <label class="custom-check">
                                            <input type="radio" name="arrival" value="60" class="d-none filter_action" {{ (app('request')->input('arrival')==60)?'checked':'' }}>
                                            <i class="fas fa-check"></i>
                                            <span class="between">
                                                {{ trans('home.Last 60 days') }}
                                                <span>
                                                    ({{ $brand->last_60 }})
                                                </span>
                                            </span>
                                        </label>
                                        <input type="hidden" id="brand" value="{{ $brand->id }}">
                                    </div>
                                </div>
                                @if($brand->filters->count())
                                <!-- Color filter -->
                                <div class="custom-collapse main">
                                    <button class="action">
                                        {{ trans('home.Filter') }}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="collapse-body show">

                                        <div class="collapse-container">
                                            @foreach($brand->filters as $filter)
                                            <div class="custom-collapse sub">
                                                <button class="action">
                                                    <span class="plus"></span>
                                                    {{ $filter->name  }}
                                                </button>
                                                <div class="collapse-body show">
                                                    @foreach($filter->items as $filter_item)
                                                    <label class="custom-check">
                                                        <input type="checkbox" name="filter_id[]" data-type="arr"  value="{{ $filter_item->id }}" class="d-none filter_action" {{ (in_array($filter_item->id,$filters))?'checked':'' }}>
                                                        <i class="fas fa-check"></i>
                                                        {{ $filter_item->name }}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
    
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-lg-9">
                       
                        
                        <form action="" class="inner-filter">
                            <p class="total">
                                {{ $allData->total() }} {{ trans('home.Results for "Deals"') }}
                            </p>
                            <div class="right">
                                
                                <div class="filter-item">
                                    <span class="title">
                                        Display
                                    </span>
                                    {{ Form::select('order_type',$order_types,app('request')->input('order_type'),['class'=>'select-app filter_action']) }}
                                    
                                </div>
                                <div class="filter-item grid-item">
                                    <span class="title">
                                        Display
                                    </span>
                                    <button class="grid-transform">
                                        <i class="fas fa-list list"></i>
                                        <i class="fas fa-th-large grid d-none"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                <div class="row products-row" id="products_holder">
                        	@foreach($allData as  $item)
                            <div class="col-12 col-md-4 col-lg-6 col-xl-3 mb-3">
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
                        
                    </div>
                </div>
            </div>
        </section>
	</section>
@stop