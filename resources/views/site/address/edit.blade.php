@extends('site.content.layout')
@section('content')
<section class="content" id="address">
        <section class="checkout-page">
            <div class="checkout-progress">
                <div class="container">
                    <ul class="list">
                        <li class="active">
                            <span class="count">1</span>
                            <span class="tit">{{ trans('home.Your Location') }}</span>
                        </li>
                        <li class="">
                            <span class="count">2</span>
                            <span class="tit">{{ trans('home.Address Details') }}</span>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="container checkout-steps">
                <div class="step active">
                    <form action="" class="update-data-box">
                        <p class="box-head">
                            Edit Address
                        </p>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class="address-radio">
                                        <input type="radio" name="address" class="d-none" checked>
                                        <div class="address-box">
                                            <span class="icon"></span>
                                            <div class="left">
                                                <p class="title">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    Set from map
                                                </p>
                                                <p class="desc">
                                                    outside zoom store ,Eppco satation , Al Wasel Road , 192 jumeriah Dubai
                                                </p>
                                            </div>
                                            <img src="img/map.png" alt="" class="img">
                                        </div>
                                    </label>
    
                                    <label class="address-radio">
                                        <input type="radio" name="address" class="d-none">
                                        <div class="address-box">
                                            <span class="icon"></span>
                                            <div class="left">
                                                <p class="title">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    Set from map
                                                </p>
                                                <p class="desc">
                                                    outside zoom store ,Eppco satation , Al Wasel Road , 192 jumeriah Dubai
                                                </p>
                                            </div>
                                            <img src="img/map.png" alt="" class="img">
                                        </div>
                                    </label>
    
                                    <a href="" class="submit mb-4">
                                        Add Address
                                    </a>
    
                                    <div class="radio-row">
                                        <label class="custom-radio">
                                            <input type="radio" name="address-type" class="d-none" checked>
                                            <span class="icon"></span>
                                            Home
                                        </label>
                                        <label class="custom-radio">
                                            <input type="radio" name="address-type" class="d-none">
                                            <span class="icon"></span>
                                            Work
                                        </label>
                                    </div>
                                    <label class="custom-check mb-3">
                                        <input type="checkbox" class="d-none">
                                        <i class="fas fa-check"></i>
                                        Set as a default address
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="label">
                                        Phone Input
                                    </label>
                                
                                
    
                                    <label class="label">
                                        First Name
                                    </label>
                                    <input type="text" class="input" placeholder="type...">
    
                                    <label class="label">
                                        Last Name
                                    </label>
                                    <input type="text" class="input" placeholder="type...">
    
                                    <label class="label">
                                        Address
                                    </label>
                                    <input type="text" class="input" placeholder="Apartment/flat Number , Tower Number , Building Name">
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="submit next-step">
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="step">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <button class="next-step">Next</button>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="checkout-summary">
                                    <p class="title">
                                        Order Summary
                                    </p>
                                    <div class="info-row">
                                        <p class="tit">
                                            Subtotal
                                        </p>
                                        <p class="val">
                                            180,00 AED
                                        </p>
                                    </div>
                                    <div class="info-row">
                                        <p class="tit">
                                            Shipping
                                        </p>
                                        <p class="free-ship">
                                            Free
                                        </p>
                                    </div>
                                    <div class="info-row total">
                                        <p class="tit">
                                            Total
                                        </p>
                                        <p class="val">
                                            180,00 AED
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step">
                    <div class="checkout-success update-data-box">
                        <div class="container">
                            <div class="box-body pt-5 pb-5">
                                <i class="fas fa-check-circle"></i>
                                <p class="desc">
                                    Checkout Success
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop