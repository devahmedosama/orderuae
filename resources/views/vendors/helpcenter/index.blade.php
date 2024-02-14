@extends('vendors.content.layout')
@section('content')

<div class="row">
    <div class="col-12">
        <h1>Dashboard</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('vendors/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">DashBoard</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
    <div class="col-lg-12 col-xl-12">
        <div class="icon-cards-row">
            <div class="glide dashboard-numbers">
                 <div class="glide__track" data-glide-el="track">
                   <ul class="glide__slides">
                        @foreach($allData as $data)
                        <li class="glide__slide">
                            <a href="{{ URL::to('vendors/dashboard/helpcenter/single/'.$data->id) }}" class="card">
                                <div class="card-body text-center">
                                    <img src="{{ URL::to($data->image) }}" class="icon_img">
                                    <p class="card-text mb-0">{{ $data->name }}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

 
    </div>

    
</div>

  
@stop