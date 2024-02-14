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
                <li class="breadcrumb-item active" aria-current="page">General Statistics</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
    <div class="col-lg-12 col-xl-8">
        <div class="icon-cards-row">
            <div class="glide dashboard-numbers">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <a href="#" class="card">
                                <div class="card-body text-center">
                                    <i class="iconsminds-clock"></i>
                                    <p class="card-text mb-0">New  Orders</p>
                                    <p class="lead text-center">{{ $new_order }}</p>
                                </div>
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="#" class="card">
                                <div class="card-body text-center">
                                    <i class="iconsminds-basket-coins"></i>
                                    <p class="card-text mb-0">Finished Orders</p>
                                    <p class="lead text-center">{{ $finished_order }}</p>
                                </div>
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="#" class="card">
                                <div class="card-body text-center">
                                    <i class="iconsminds-arrow-refresh"></i>
                                    <p class="card-text mb-0">Rejected Requests</p>
                                    <p class="lead text-center">{{ $rejected_order }}</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="position-absolute card-top-buttons">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Last 7 Day Orders</h5>
                        <div class="dashboard-line-chart chart">
                            <canvas id="salesChart" data-labels="{{ $labels }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 mb-4">
        <div class="card">
            <div class="position-absolute card-top-buttons">
                <button class="btn btn-header-light icon-button">
                    <!-- <i class="simple-icon-refresh"></i> -->
                </button>
            </div>

            <div class="card-body">
                <h5 class="card-title">Recent Products</h5>
                <div class="scroll dashboard-list-with-thumbs">
                    @foreach($recent as $item)
                    <div class="d-flex flex-row mb-3">
                        <a class="d-block position-relative" href="{{ URL::to('vendors/dashboard/products/edit/'.$item->id) }}" >
                            @if(count($item->images))
                            <img src="{{ URL::to($item->images[0]) }}" alt="Marble Cake"
                                class="list-thumbnail border-0" />
                            @endif
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="{{ URL::to('vendors/dashboard/products/edit/'.$item->id) }}">
                                <p class="list-item-heading">{{ $item->name }}</p>
                                <div class="text-primary text-small font-weight-medium d-none d-sm-block">
                                    {{ date('Y-m-d',strtotime($item->created_at)) }}</div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Order Statistics </h5>
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="chart-container chart">
                            <canvas id="productChartNoShadow" data-labels="{{ $months }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop