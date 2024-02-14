@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ $title }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a class="breadcrumb-item" href="{{ URL::to('admin/users') }}"> Users </a>
                <span class="breadcrumb-item active">{{ $title }}</span>
            </nav>
        </div>
    </div>
	<div class="card" style="padding-top:20px">
		<div class="col-12 col-lg-5 col-xl-4 col-left offset-sm-1">
		    <div class="card mb-4">
		        <img src="{{ URL::to('assets/admin') }}/img/avatar.png" alt="Detail Picture" class="card-img-top" />
		        <div class="card-body">
		            <p class="text-muted text-small mb-2">{{ $data->first_name.' '.$data->last_name  }}</p>
		            <p class="text-muted text-small mb-2">E-mail : {{ $data->email }}</p>
		            <p class="text-muted text-small mb-2">Phone : {{ $data->phone }}</p>
		        </div>
		    </div>
		    
		</div>
		<div class="col-12 col-lg-12 col-xl-12 col-right">

			<div class="row">

				<div class="card col-md-4 user_statistics_card offset-sm-1">
			        <div class="card-body ">
			            <div class="row">
			            	<div class="col-md-4">
			            		Order
			            	</div>
			            	<div class="col-md-4">
			            		{{ $data->refunds->sum('total_price') }} .Dhs
			            	</div>
			            	<div class="col-md-2">
			            		{{ $data->refunds->count() }} 
			            	</div>
			            	<div class="col-md-2">
			            		<a href="{{ URL::to('admin/orders?name='.$data->first_name.' '.$data->last_name) }}" class="circle_link" target="_blank">
			            			<i class="simple-icon-eye"></i>
			            		</a> 
			            	</div>
			            </div>
			        </div>
			    </div>
			    <div class="card  col-md-4 user_statistics_card offset-sm-1">
			        <div class="card-body ">
			            <div class="row">
			            	<div class="col-md-4">
			            		Refund Items
			            	</div>
			            	<div class="col-md-4">
			            		{{ $data->refunds->sum('total_price') }} .Dhs
			            	</div>
			            	<div class="col-md-2">
			            		{{ $data->refunds->sum('quantity') }} 
			            	</div>
			            	<div class="col-md-2">
			            		<a href="{{ URL::to('admin/refunds?name='.$data->first_name.' '.$data->last_name) }}" class="circle_link" target="_blank">
			            			<i class="simple-icon-eye"></i>
			            		</a> 
			            	</div>
			            </div>
			        </div>
			    </div>
			    <div class="card  col-md-4 user_statistics_card offset-sm-1">
			        <div class="card-body ">
			            <div class="row">
			            	<div class="col-md-4">
			            		Store Reviews
			            	</div>
			            	<div class="col-md-4">
			            	</div>
			            	<div class="col-md-2">
			            		{{ $data->reviews->count() }} 
			            	</div>
			            	<div class="col-md-2">
			            		<a href="{{ URL::to('admin/store/reviews?name='.$data->first_name.' '.$data->last_name) }}" class="circle_link" target="_blank">
			            			<i class="simple-icon-eye"></i>
			            		</a> 
			            	</div>
			            </div>
			        </div>
			    </div>
			    <div class="card  col-md-4 user_statistics_card offset-sm-1">
			        <div class="card-body ">
			            <div class="row">
			            	<div class="col-md-4">
			            		Product Reviews
			            	</div>
			            	<div class="col-md-4">
			            	</div>
			            	<div class="col-md-2">
			            		{{ $data->product_reviews->count() }} 
			            	</div>
			            	<div class="col-md-2">
			            		<a href="{{ URL::to('admin/product/reviews?name='.$data->first_name.' '.$data->last_name) }}" class="circle_link" target="_blank">
			            			<i class="simple-icon-eye"></i>
			            		</a> 
			            	</div>
			            </div>
			        </div>
			    </div>
			    <div class="card  col-md-4 user_statistics_card offset-sm-1">
			        <div class="card-body ">
			            <div class="row">
			            	<div class="col-md-5">
			            		Card Payments
			            	</div>
			            	<div class="col-md-5">
			            		{{ $data->payments->sum('amount') }} Dhs
			            	</div>
			            	<div class="col-md-2">
			            		<a href="{{ URL::to('admin/payments/processes?name='.$data->first_name.' '.$data->last_name) }}" class="circle_link" target="_blank">
			            			<i class="simple-icon-eye"></i>
			            		</a> 
			            	</div>
			            </div>
			        </div>
			    </div>
			    <div class="card  col-md-4 user_statistics_card offset-sm-1">
			        <div class="card-body ">
			            <div class="row">
			            	<div class="col-md-6 text-center">
			            		<a href="{{ URL::to('admin/users/edit/'.$data->id) }}" class="btn btn-md btn-primary">
			            			Edit
			            		</a>
			            	</div>
			            	<div class="col-md-6 text-center">
			            		<a href="{{ URL::to('admin/users/active/'.$data->id) }}" class="btn btn-md btn-primary">
			            			{{ ($data->active == 1)?'Stop':'Activate' }}
			            		</a>
			            	</div>
			            	
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
@stop