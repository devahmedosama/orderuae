@extends('admin.content.layout')
@section('content') 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                    {{ Form::open(['url'=>'admin/orders','method'=>'GET']) }}
                    <div class="row">
                            <div class="col-md-4 form-group">
                                {{ Form::text('name',app('request')->input('name'),['class'=>'form-control','placeholder'=>'client name']) }}
                            </div>
                            <div class="col-md-4 form-group">
                                {{ Form::select('state',$states,app('request')->input('state'),['class'=>'form-control','placeholder'=>'order state']) }}
                            </div>
                            <div class="col-md-4 form-group">
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
                   <!--  </br> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Store</th>
                                <th scope="col">PayWay</th>
                                <th scope="col">Delivery Way</th>
                                <th scope="col">Address</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Refund Items</th>
                                <th scope="col">Refund Amount</th>
                                <th scope="col">State</th>
                                <th scope="col">Date</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $data)
                            <tr>
                                <th scope="row">{{ $data->id  }}</th>
                                <td>
                                    <a href="{{ URL::to('admin/orders?name='.$data->user->first_name.' '.$data->user->last_name) }}" title="all  user`s orders">
                                      {{ $data->user->first_name }} {{ $data->user->last_name }}  
                                    </a>
                                </td>
                                <td>
                                    {{ $data->store->name }}
                                </td>
                                <td>
                                    {{ $data->paymentway->name }}
                                </td>
                                <td>
                                    {{ $data->delivery->name }}
                                </td>
                                <td>
                                    {{ $data->address->address }}
                                </td>
                                <td>
                                    {{ round($data->total_price,3) }} Dhs
                                </td>
                                <td>
                                    {{ $data->refunds->count() }}
                                </td>
                                <td>
                                    {{ $data->refunds->sum('total_price') }}
                                </td>
                                <td>
                                    {{ $data->state_name }}
                                </td>
                                <td>
                                    {{ date('Y-m-d',strtotime($data->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/orders/view/'.$data->id) }}" class="btn btn-md btn-primary">View</a>
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