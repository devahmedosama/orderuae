@extends('site.content.layout')
@section('content')
<section class="content">
    <section class="checkout-page">
        <div class="container ">
            
            <div class="row cart-loader" id="cart_loader">
                <div class="dot-elastic"></div>
                <div class="col-12 col-md-8" id="cart-items">
                </div>
                <div class="col-12 col-md-4">
                    <div class="checkout-summary">
                        <p class="title">
                            {{ trans('home.Order Summary') }}
                        </p>
                        <div class="info-row">
                            <p class="tit">
                               {{ trans('home.Subtotal') }} 
                            </p>
                            <p class="val" id="subtotal_price">
                               
                            </p>
                        </div>
                        <div class="info-row">
                            <p class="tit">
                               {{ trans('home.Delivery Charge') }} 
                            </p>
                            <p class="val" id="delivery_price">
                               
                            </p>
                        </div>
                        <div class="info-row total">
                            <p class="tit">
                                {{ trans('home.Total') }}
                            </p>
                            <p class="val" id="total_price">
                                
                            </p>
                        </div>
                        <div class="ship-to">
                            <p class="tit">
                                Ship To
                            </p>
                            <button class="edit prev-step">Edit</button>
                        </div>
                        <div class="address">
                            <p class="tit">
                                Eman Fawaz
                            </p>
                            <div class="desc">
                                outside zoom store ,Eppco satation , Al Wasel Road , 192 jumeriah Dubai
                            </div>
                        </div>
                        <a href="" class="submit mt-4 w-100 text-center">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@stop