@extends('site.content.layout')
@section('content')
<section class="content">
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-3">
                    @include('site.content.profile_side')
                </div>
                <div class="col-12 col-sm-9">
                    <div class="profile-updates">
                        <p class="title">
                           {{ trans('home.Order Details') }} 
                        </p>
                        <div class="as-talk-details">
                          <ul>
                            <li>
                                {{ trans('home.Order Details') }} : {{ $data->state_name }}
                            </li>
                            <li>
                                {{ trans('home.Store') }} : {{ ($data->store)?$data->store->name:' ' }}
                            </li>
                            <li>
                                {{ trans('home.Payment Way') }} : {{ ($data->paymentway)?$data->paymentway->name:'' }}
                            </li>
                            <li>
                                {{ trans('home.Delivery Type') }} : {{ ($data->delivery)?$data->delivery->name:' ' }}
                            </li>
                            <li class="full-width-li">
                                {{ trans('home.Shipping') }}  : {{ ($data->address)?$data->address->address:'' }}
                            </li>
                            <li>
                                {{ trans('home.Sub Total') }}  : {{ $data->total_price }} {{ trans('home.AED') }}
                            </li>
                            <li>
                                {{ trans('home.Delivery') }}  : {{ $data->delivery_price }} {{ trans('home.AED') }}
                            </li>
                            <li  class="full-width-li">
                                {{ trans('home.Total Price') }}  : {{ ($data->total_price+$data->delivery_price) }} {{ trans('home.AED') }}
                            </li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@stop