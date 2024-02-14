@extends('admin.content.layout')
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>{{ $title }}</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                    {{ Form::open(['url'=>'admin/product/reviews','method'=>'GET']) }}
                    <div class="row">
                            <div class="col-md-6 form-group">
                                {{ Form::text('name',app('request')->input('name'),['class'=>'form-control','placeholder'=>'client name']) }}
                            </div>
                            
                            <div class="col-md-6 form-group">
                                {{ Form::select('store_id',$stores,app('request')->input('store_id'),['class'=>'form-control basic-select','placeholder'=>'choose store']) }}
                            </div>
                            <div class="col-md-5 form-group">
                                <label class="lable-control">Date From</label>
                                {{ Form::date('date_from',app('request')->input('date_from'),['class'=>'form-control']) }}
                            </div>
                            <div class="col-md-5 form-group">
                                <label class="lable-control">Date To</label>
                                {{ Form::date('date_to',app('request')->input('date_to'),['class'=>'form-control']) }}
                            </div>
                            <div class="col-md-2 form-group text-center">
                                <label class="lable-control"> &nbsp</label>
                                <button type="submit" class="btn btn-primary btn-lg btn_block">Search</button>
                            </div>
                    </div>
                    {{ Form::close() }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Product</th>
                                <th scope="col">Store</th>                                <th scope="col">Text</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Date </th>
                                <th scope="col">Options </th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $data)
                            <tr>
                                <th scope="row">{{ $data->id  }}</th>
                                <td> 
                                    <a href="{{ URL::to('admin/users/single/'.$data->user_id) }}" class="btn btn-xs btn-primary">
                                        {{ $data->user->first_name  }} {{ $data->user->last_name  }}
                                    </a> 
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/products/edit/'.$data->product_id) }}" class="btn btn-xs btn-primary" target="_blank">
                                        {{ $data->product->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/stores/edit/'.$data->product->store_id) }}" class="btn btn-xs btn-primary" target="_blank">
                                        {{ $data->product->store->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $data->text }}
                                </td>
                                <td>
                                    {{ $data->rate }}
                                </td>
                                <td>
                                    {{ date('Y-m-d H:i A',strtotime($data->created_at)) }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                                      {{ trans('home.Delete') }} 
                                    </button>
                                    <!-- Modal -->
                                   <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('home.Alert') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            {{ trans('home.Are You Sure You Want to Delete This ?') }}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('home.Close') }}</button>
                                            <a href="{{ URL::to('admin/product/reviews/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }}</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
    
@stop