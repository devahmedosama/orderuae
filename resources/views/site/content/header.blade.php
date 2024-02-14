<!doctype html>
<html lang="{{ $lang }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{!! (isset($title))?$title:'Order' !!} </title>
	<link rel="icon" href="{{ URL::to('assets/site/img/logo.png') }}" type="image/x-icon" />
	<!-- CSS Links -->
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/bootstrap.min.css">
	@if($lang == 'ar')
		<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
	@endif
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/font-awesome-5all.css"><!-- font awsome 5.4 -->
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/animate.css">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/select2.min.css">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/style.css?v=1.03">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/my.css?v=1.04">
    <meta property="og:description" content="{!! (isset($title))?$title:'Order' !!}">
    <meta property="og:title" content="{!! (isset($title))?$title:'Order' !!}">
    
</head>

<body>
	<div class="loader"></div>
	<!-- start header -->

	<header class="header">
		<div class="left">
			<!-- logo link -->
			<a href="{{ URL::to($lang) }}" class="logo">
				<img src="{{ URL::to('assets/site') }}/img/logo.png" alt="">
			</a>
	
			<!-- language dropdown -->
			<div class="dropdown lang-dropdown">
				<button class="" type="button" id="lang_dropdown" data-toggle="dropdown" aria-expanded="false">
					<img src="{{ URL::to('assets/site') }}/img/country-ae.png" alt="">
					<i class="fas fa-chevron-down"></i>
				</button>
				<div class="dropdown-menu" aria-labelledby="lang_dropdown">
					<a class="dropdown-item" href="{{ URL::to('ar') }}">
						<img src="{{ URL::to('assets/site') }}/img/country-ae.png" alt="">
						AR
					</a>
					<a class="dropdown-item" href="{{ URL::to('en') }}">
						<img src="{{ URL::to('assets/site') }}/img/en.png" alt="">
						EN
					</a>
				</div>	
			</div>
		</div>

		<!-- search form -->
		<div  class="search-form">
			<i class="fas fa-times close-search"></i>
			<input type="text" id="searchBar" placeholder="{{ trans('home.What are you looking for ?') }}">
			<button class="search-btn hide">x</button>
			<div class="search-holder hide">
				<div  class="row">
					<div class="col-md-8" id="products-search">
						<ul class="search-ul">
							
						</ul>
					</div>
					<div class="col-md-4" id="brands-search">
						<h5 class="search-brand-title">{{ trans('home.Matching Brands') }}</h5>
						<ul class="search-ul">
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="right">
			<i class="fas fa-search open-search"></i>
			<!-- user dropdown -->
			@if(Auth::check())
			<div class="dropdown user-dropdown">
				<button class="" type="button" id="user_dropdown" data-toggle="dropdown" aria-expanded="false">
					{{ $user->first_name }}
					<i class="fas fa-chevron-down"></i>
				</button>
				<div class="dropdown-menu" aria-labelledby="user_dropdown">
					<a class="dropdown-item" href="{{ URL::to($lang.'/myprofile') }}">
						<i class="fas fa-user-alt"></i>
						{{ trans('home.My Profile') }}
					</a>
					<a class="dropdown-item" href="{{ URL::to($lang.'/logout') }}">
						<i class="fas fa-sign-out-alt"></i>
						{{ trans('home.Log Out') }}
					</a>
				</div>	
			</div>
			@else
			<div class="dropdown user-dropdown">
				<a href="{{ URL::to($lang.'/login') }}" class="" type="button">
					Login
				</a>
			</div>
			@endif
			<!-- cart link -->
			<a href="{{ URL::to($lang.'/cart') }}" class="cart-link">
				<span>
					{{  trans('home.Cart') }}
				</span>
				<i class="fas fa-shopping-cart"></i> 
				<span id="cart_count"></span>
			</a>
		</div>
	</header>
	<div class="main-overlay"></div>
	<nav class="main-nav">
		<ul class="list">
			<li class="all">
				<a href="{{ URL::to($lang.'/all/products') }}" class="item">
					{{ trans('home.All Categories') }}
				</a>
				<div class="all-cat-menu">
					<ul class="tab-list">
						<li class="item">
							<a class="link active" href="{{ URL::to($lang) }}">{{ trans('home.Home') }}</a>
						</li>
						@foreach($categories as  $category)
						<li class="item">
							<a class="link" href="{{ URL::to($lang.'/single/category/'.$category->slug) }}" data-target="#category_{{  $category->id }}">{{ $category->name }}</a>
						</li>
						@endforeach
						<li class="item">
							<a class="link" href="{{ URL::to($lang.'/contcat') }}">{{ trans('home.Contact') }}</a>
						</li>
					</ul>
					<div class="content-list" id="myTabContent">
						@foreach($categories as $category)
						<div class="tab show" id="category_{{  $category->id }}">
							<p class="title">
								{{ $category->name }}
							</p>
							<div class="row">
								<div class="col-12 col-md-6">
									<p class="list-title">
										Most Popular
									</p>
									<div class="links">
										@foreach($category->sub_categories as $cat)
										<a href="{{ URL::to($lang.'/single/category/'.$cat->slug) }}"> {{ $cat->name }} </a>
										@endforeach
									</div>
								</div>
								<div class="col-12 col-md-6">
									<p class="list-title">
										Top Brands
									</p>
									<div class="links">
										@foreach($category->brands as $key=>$brand)
										<a href="{{ URL::to($lang.'/single/brand/'.$brand->slug) }}"> {{ $brand->name }} </a>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</li>
			@foreach($categories->take(6) as $category)
			<li class="list-item">
				<a href="{{ URL::to($lang.'/single/category/'.$category->slug) }}">
					{{ $category->name }}
				</a>
				<div class="mega-menu">
					<div class="row">
						<div class="col-12 col-md-2">
							<div class="links-title">
								CATEGORIES
							</div>
							<div class="links">
								@foreach($category->sub_categories as $cat)
								<a href="{{ URL::to($lang.'/single/category/'.$cat->slug) }}">{{ $cat->name }}</a>
								@endforeach
							</div>
						</div>
						<div class="col-12 col-md-10">
							<div class="row">
								<div class="col-12 col-md-5">
									<p class="title">
										Top Brands
									</p>
									<div class="menu-brands">
										@foreach($category->brands->take(9) as $brand)
										<a href="{{ URL::to($lang.'/single/brand/'.$brand->slug) }}" title="{{ $brand->name }}">
											<img src="{{ URL::to($brand->image) }}" alt="{{ $brand->name }}">
										</a>
										@endforeach
									</div>
								</div>
								<div class="col-12 col-md-7">
									<div class="row">
										<div class="col-12 col-md-7">
											@if($category->big_ads)
											<a href="{{ URL::to($category->big_ads->link) }}">
												<img src="{{ URL::to($category->big_ads->image) }}" alt="" class="w-100 menu-banner">
											</a>
											@endif
										</div>
										<div class="col-12 col-md-5">
											@if($category->small_ads)
											<a href="{{ URL::to($category->small_ads->link) }}">
												<img src="{{ URL::to($category->small_ads->image) }}" alt="" class="w-100 menu-banner">
											</a>

											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			@endforeach

		</ul>
	</nav>