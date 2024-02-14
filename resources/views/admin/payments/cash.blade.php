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
                    <h3>Total Amount  :  {{ $amount }} Dhs</h3>
                    {{ Form::open(['url'=>'admin/payments/cash','method'=>'GET']) }}
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
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Order</th>
                                <th scope="col"> Total Amount</th>
                                <th scope="col">Date </th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $key=>$data)
                            <tr>
                                <th scope="row">{{ $key+1  }}</th>
                                <td> 
                                    <a href="{{ URL::to('admin/users/single/'.$data->user_id) }}" class="btn btn-xs btn-primary">
                                        {{ $data->user->first_name  }} {{ $data->user->last_name  }}
                                    </a> 
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/orders/view/'.$data->id) }}" class="btn btn-xs btn-success">
                                      Order No {{ $data->id  }}
                                    </a>
                                </td>
                                <td>{{ $data->total_price }} .Dhs</td>
                                <td>
                                    {{ date('Y-m-d H:i A',strtotime($data->created_at)) }}
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