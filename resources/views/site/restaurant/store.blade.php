@extends('site.restaurant_content.layout')
@section('content')
<section class="content">
    <section class="restaurant-details">
		<div class="container">
			<div class="restaurant-img">
				<img src="{{ URL::to($data->image) }}" alt="">
			</div>
			<div class="restaurant-info">
				<p class="status">
					<span class="open">
						{{ trans('home.Open') }}
					</span>
					<!-- <span class="closed">
						Closed
					</span> -->
				</p>
				<p class="title">
					<span class="tit">
						
					</span>
					<span class="stars">
						@for($i=0 ; $i < 4 ;$i++)
						<i class="fas fa-star {{ ($i < $data->rate)?'active':'' }}"></i>
						@endfor
					</span>
					<span class="review">
						<i class="far fa-smile"></i>
						{{ trans('home.Good') }}
					</span>
				</p>
				<p class="desc">
					{{ $data->name }}
					<br>
					{{  $data->address }}
					<br>
					{{ trans('home.MIN . Order') }} : {{ $data->minimum_order }} {{ trans('home.AED') }} 
				</p>
				<div class="payments">
					<img src="{{ URL::to('assets/site') }}/img/visa.png" alt="">
					<img src="{{ URL::to('assets/site') }}/img/mastercard.png" alt="">
					<img src="{{ URL::to('assets/site') }}/img/money.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="overview-tabs">
						<ul class="nav" id="pills-tab" role="tablist">
							<li class="" role="presentation">
								<a class="active" data-toggle="pill" href="#menu">
									<i class="fas fa-list"></i>
									{{ trans('home.Menu') }}
								</a>
							</li>
							<li class="" role="presentation">
								<a class="" data-toggle="pill" href="#reviews">
									<i class="fas fa-star"></i>
									{{ trans('home.Reviews') }}
								</a>
							</li>
							@if($data->locale)
							<li class="" role="presentation">
								<a class="" data-toggle="pill" href="#specific">
									<i class="fas fa-info-circle"></i>
									{{ trans('home.Info') }}
								</a>
							</li>
							@endif
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="menu">
								<div class="row">
									<div class="col-12 col-md-4">
										<div class="checkout-summary restaurant-summary mb-4">
											<p class="title">
												{{ trans('home.Categroies') }}
											</p>
											@foreach($data->menus as $item)
											<a href="#category-{{ $item->id }}" class="info-row">
												<p class="tit">
												    {{ $item->name }}
												</p>
											</a>
											@endforeach
											
										</div>
									</div>
									<div class="col-12 col-md-8">
										<div class="menu-groups">
											@foreach($data->menus as $menu)
											<div class="menu-group" id="category-{{ $menu->id }}">
												<button class="head" type="button" data-toggle="collapse" data-target="#collapse-{{ $menu->id }}">
													{{ $menu->name }}
													<i class="fas fa-chevron-down"></i>
												</button>
										
												<div id="collapse-{{ $menu->id }}" class="body show">
													<div class="inner">
														@foreach($menu->menu_items as $item)
														<div class="menu-item">
															<div class="info meal_info">
																<a href="{{ URL::to($lang.'/single/meal/'.$item->id.'/'.$item->slug) }}" class="title">
																	@foreach($item->locales as $locale)
																	{{ $locale->name }} {{  ($locale->locale == 'en')?'-':' '}}  
																	@endforeach
																	
																</a>
																<p class="desc">
																	@foreach($item->locales as $locale)
																	 {{ $locale->text }}
																     </br>
																	@endforeach
																</p>
																<p class="price">
																	{{ trans('home.AED') }} {{ $item->price }}
																	
																</p>
															</div>
															<div class="img">
																<a href="{{ URL::to($lang.'/single/meal/'.$item->id.'/'.$item->slug) }}" class="title">
																	<img src="{{ URL::to($item->item_thumb) }}" alt="">
																</a>
															</div>
														</div>
														@endforeach
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
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
	                                                    	@for($i=0 ; $i < 5;$i++)
	                                                        <i class="fas fa-star {{ ($i<$data->rate)?'active':'' }}"></i>
	                                                        @endfor
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
							@if($data->info)
							<div class="tab-pane fade" id="specific">
								{!! $data->info !!}
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
@stop