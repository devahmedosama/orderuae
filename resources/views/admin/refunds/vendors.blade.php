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
                    {{ Form::open(['url'=>'admin/vendor/refunds/'.$vendor->id,'method'=>'GET']) }}
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
                                <th scope="col">Product Name </th>
                                <th scope="col">Address</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
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
                                    <a href="{{ URL::to('admin/refunds?name='.$data->user->first_name.' '.$data->user->last_name) }}" title="all  user`s refunds">
                                        {{ $data->user->first_name }} {{ $data->user->last_name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $data->item->product->store->name }}
                                </td>
                                <td>
                                    {{ $data->item->product->name }}
                                </td>
                                <td>
                                    {{ $data->item->order->address->address }}
                                </td>
                                <td>
                                    {{ $data->quantity }}
                                </td>
                                <td>
                                    {{ round($data->total_price,3) }} Dhs
                                </td>
                                <td>
                                    {{ $data->state_name }}
                                </td>
                                <td>
                                    {{ date('Y-m-d',strtotime($data->created_at)) }}
                                </td>
                                <td>
                                    @if($data->state == 0)
                                    <a href="{{ URL::to('admin/refunds/confirm/'.$data->id) }}" class="btn btn-md btn-primary">Confirm reciving</a>
                                    @endif
                                    <a href="{{ URL::to('admin/orders/view/'.$data->item->order_id) }}" class="btn btn-md btn-primary">View Order</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">
   $('.basic-select').select2();
</script>
@stop