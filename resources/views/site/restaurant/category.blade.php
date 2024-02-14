@extends('site.restaurant_content.layout')
@section('content')
<section class="content">
        <section class="restaurant-category">
            <div class="container">
                <div class="search-title">
                    <p class="title">
                        {{ trans('home.All Resturant') }} - {{  $category->name }}
                    </p>
                    <input type="text" class="search" placeholder="{{ trans('home.Search Resturant') }}">
                </div>
                <div class="row">
                	@foreach($allData as $item)
	                    <div class="col-12 col-md-4 col-lg-3">
	                        <a href="{{ URL::to($lang.'/single/restaurant/'.$item->slug) }}" class="restaurant-box" title="{{ $item->name }}">
	                            <div class="img">
	                                <img src="{{ URL::to('uploads/stores/thumbs_'.$item->id.'.jpg') }}" alt="">
	                            </div>
	                            <div class="info">
	                                <p class="title">{{ $item->name }}</p>
	                                <p class="desc">{{ $item->address }}</p>
	                            </div>
	                        </a>
	                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
	</section>
@stop