@extends('site.content.layout')
@section('content')
<section class="content">
	<div class="container">
		<!-- start main slider -->
		<section class="main-slider">
			<div class="owl-carousel owl-theme home-slide">
				@foreach($sliders as $slide)
				<div class="item">
					<a href="{{ $slide->link }}">
						<img src="{{ URL::to($slide->image) }}" alt="{{ $slide->name }}" class="w-100">
					</a>
				</div>
				@endforeach
				
			</div>
		</section>

		<!-- start categories -->
		<section class="categories-section">
			@foreach($categories as $category)
			<a href="{{ URL::to($lang.'/single/category/'.$category->slug) }}" class="category-box">
				<img src="{{ URL::to($category->image) }}" alt="{{ $category->name }}">
				<span class="title">
					{{ $category->name }}
				</span>
			</a>
			@endforeach
			
		</section>
		<!-- ads  section -->
		<section class="top-banners">
			<div class="container">
				<div class="row">
				@foreach($ads as $ads)
				<div class="col-lg-3 col-xs-6">
					<div class="adsholder"> 
						<a href="{{ $ads->link }}">
							<img src="{{ $ads->image }}" >
						</a>
					</div>
				</div>
				@endforeach
				
			</div>
			</div>
			
		</section>
		<!-- start products-slider -->
		<section class="products-slider">
			<div class="title-head">
				<p class="section-title">
					{{ trans('home.Hot Deals') }}
				</p>
				<a href="" class="seemore-btn">
					{{ trans('home.Shop Now') }}
				</a>
			</div>
			<div class="owl-carousel owl-theme products-slide">
				@foreach($offers as $item)
				<div class="item">
					<a href="{{ URL::to($lang.'/single/product/'.$item->id.'/'.$item->slug) }}" class="product-box">
						<img src="{{ URL::to($item->item_thumb) }}" alt="{{ $item->name }}" class="img">
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
					</a>
				</div>
				@endforeach
			</div>
		</section>
		@if($full_ads)
		<section class="linerads">
			<a href="{{ $full_ads->link }}">
				<img src="{{ $full_ads->image }}">
			</a>
		</section>
		@endif
		<section class="products-slider">
			<div class="title-head">
				<p class="section-title">
					{{  trans('home.Latest Products') }}
				</p>
				<a href="{{ URL::to($lang.'/latest/products') }}" title="{{ trans('home.Latest Products') }}" class="seemore-btn">
					{{ trans('home.Shop Now') }}
				</a>
			</div>
			<div class="owl-carousel owl-theme products-slide">
				@foreach($latests as $item)
				<div class="item">
					<a href="{{ URL::to($lang.'/single/product/'.$item->id.'/'.$item->slug) }}" title="{{ $item->name }}" class="product-box">
						<img src="{{ URL::to($item->item_thumb) }}" alt="{{ $item->name }}" class="img">
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
					</a>
				</div>
				@endforeach
			</div>
		</section>
		<!-- start offers section -->
		@if(count($last_ads))
		<section class="offers-section">
			<div class="head">
				<a  class="title">
					Women's Fashion - 
					<span>
						Up To 70% Off
					</span>
				</a>
				
			</div>
			<div class="row">
				@foreach($last_ads as $ads)
				<div class="col-6 col-sm-4 col-lg-2">
					<a href="{{ URL::to($ads->link) }}" class="offer-box">
						<img src="{{ URL::to($ads->image) }}" alt="">
						<span class="title">
							TOPS
						</span>
					</a>
				</div>
				@endforeach
				
			</div>
		</section>
		@endif
		<!-- start brands -->
		@if(count($brands))
		<section class="brands">
			<p class="section-title text-center">
				{{ trans('home.YOUR FAVORITE BRANDS') }}
			</p>
			<div class="brands-row">
				@foreach($brands->take(18) as $brand)
				<a href="{{ URL::to($lang.'/single/brand/'.$brand->slug) }}" title="{{ $brand->name }}">
					<img src="{{ URL::to($brand->image) }}" alt="{{ $brand->name }}" class="brand">
				</a>
				@endforeach
				
		</section>
		@endif
	</div>

</section>
@stop
