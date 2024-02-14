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
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin/orders') }}">Order</a>
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
                <div class="row product_info">
                    <div class="col-md-4">
                     <span class="span_title"> User :   </span> {{ $data->user->first_name }} {{ $data->user->last_name }}
                    </div>
                    <div class="col-md-4">
                     <span class="span_title"> User Phone :   </span> {{ $data->user->phone }}
                    </div>
                     <div class="col-md-4">
                     <span class="span_title"> E-mail :   </span> {{ $data->user->email }}
                    </div>
                    <div class="col-md-4">
                     <span class="span_title">Total Price : </span> {{ round($data->total_price,2) }} Dhs
                    </div>
                    <div class="col-md-4">
                     <span class="span_title">Address : </span>{{ $data->address->address }}
                    </div>
                    <div class="col-md-4">
                     <span class="span_title">PayWay : </span>{{ $data->paymentway->name }}
                    </div>
                    <div class="col-md-4">
                     <span class="span_title">Delivery Way : </span>{{ $data->delivery->name }}
                    </div>
                    <div class="col-md-4">
                     <span class="span_title">Status : </span>{{ $data->state_name }}
                    </div>
                </div>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Upons</th>
                                <th scope="col">Options</th>
                                <th scope="col">Total Price</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ ($item->color)?$item->color->name:' ' }}</td>
                                <td>
                                    {{ ($item->product_size)?$item->product_size->name:' ' }}
                                </td>
                                <td>
                                    @foreach($item->upons as $upon)
                                    {{  $upon->name }} , 
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->options as $option)
                                    {{  $option->option_name }} , 
                                    @endforeach 
                                </td>
                                <td>
                                    {{ $item->total_price }} Dhs
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