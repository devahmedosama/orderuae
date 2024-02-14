@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.All Categories') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <a href="{{ URL::to('admin/departments') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Departments</a>
                <a href="{{ URL::to('admin/categories') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Categories</a>
                @foreach($path as $key=>$value)
                       <a href="{{ URL::to('admin/categories?parent_id='.$key) }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ $value }}</a>
                @endforeach
                
            </nav>
        </div>
    </div>
    <div class="row list disable-text-selection" data-check-all="checkAll">
    	<div class="text-right col-md-12">
				<a href="{{ URL::to('admin/categories/add?parent_id='.app('request')->input('parent_id'))  }}" class="btn btn-primary pull-right add_btn">Add New </a>
		</div>
		@foreach($allData as $data)
        <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">
                <div class="position-relative category_div">
                    <a href="{{ URL::to('admin/categories?parent_id='.$data->id) }}"><img class="card-img-top" src="{{ URL::to($data->image) }}" height="200" 
                            alt="Card image cap"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                        	<h2 >{{ $data->name }}</h2>
                        </div>
                        <div class="col-12">
                           
                            <footer>
                                <a href="{{ URL::to('admin/categories/edit/'.$data->id) }}" class="btn btn-primary btn-md">
				                	{{ trans('home.Edit') }}
				                </a>
                                <a href="{{ URL::to('admin/category/filters/'.$data->id) }}" class="btn btn-primary btn-md">
                                    Filters
                                </a>
				                 <a href="{{ URL::to('admin/categories?parent_id='.$data->id) }}" class="pull-right btn btn-primary btn-md">{{ $data->sub_categories_count  }} child categories
		                         </a>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop