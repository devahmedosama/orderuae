<!doctype html>
<html lang="{{ $lang }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{!! (isset($title))?$title:'Order' !!} </title>
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
	<!-- CSS Links -->
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/bootstrap.min.css">
	@if($lang == 'ar')
		<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
	@endif
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/font-awesome-5all.css"><!-- font awsome 5.4 -->
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/animate.css">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/select2.min.css">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/style.css?v=1.02">
	<link rel="stylesheet" href="{{ URL::to('assets/site') }}/css/my.css?v=1.03">
</head>

<body>

	<!-- start header -->

	<header class="header">
		<div class="left">
			<!-- logo link -->
			<a href="{{ URL::to($lang.'/restaurant') }}" class="logo">
				<img src="{{ URL::to('assets/site') }}/img/logo.png" alt="">
			</a>
	
			<!-- language dropdown -->
			<div class="dropdown lang-dropdown">
				<button class="" type="button" id="lang_dropdown" data-toggle="dropdown" aria-expanded="false">
					<img src="{{ URL::to('assets/site') }}/img/country-ae.png" alt="">
					<i class="fas fa-chevron-down"></i>
				</button>
				<div class="dropdown-menu" aria-labelledby="lang_dropdown">
					<a class="dropdown-item" href="{{ URL::to('ar/restaurant') }}">
						<img src="{{ URL::to('assets/site') }}/img/country-ae.png" alt="">
						AR
					</a>
					<a class="dropdown-item" href="{{ URL::to('en/restaurant') }}">
						<img src="{{ URL::to('assets/site') }}/img/en.png" alt="">
						EN
					</a>
				</div>	
			</div>
		</div>

		<!-- search form -->
		<div  class="search-form">
			<i class="fas fa-times close-search"></i>
			<input type="text" id="restaurantBar" placeholder="{{ trans('home.What are you looking for ?') }}">
			<button class="search-btn hide">x</button>
			<div class="search-holder hide">
				<div  class="row">
					<div class="col-md-12" id="products-search">
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
			<a href="{{ URL::to($lang.'/cart/restaurant') }}" class="cart-link">
				<span>
					{{  trans('home.Cart') }}
				</span>
				<i class="fas fa-shopping-cart"></i> 
				<span id="cart_count"></span>
			</a>
		</div>
	</header>
	<div class="bg-white position-sticky border-b" style="top: 0; z-index: 9">
		<div class="container">
			<nav class="main-nav">
				<ul class="list">

					@foreach($categories->take(6) as $category)
						<li class="list-item">
							<a href="{{ URL::to($lang.'/restaurant/category/'.$category->slug) }}">
								{{ $category->name }}
							</a>

						</li>
					@endforeach

				</ul>
			</nav>
		</div>
	</div>
