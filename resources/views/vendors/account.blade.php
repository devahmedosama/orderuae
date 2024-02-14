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
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
    <div class="col-lg-12 col-xl-12">
        <div class="tab-content">
            <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
                    <div class="col-12 mb-5">
                        <img class="social-header card-img" src="{{ URL::to('assets/admin/') }}/img/social/header.jpg" />
                    </div>
                    <div class="col-12 col-lg-5 col-xl-4 col-left">
                        <a href="img/profiles/1.jpg" class="lightbox">
                            <img alt="Profile" src="{{ URL::to('assets/admin/') }}/img/profiles/l-1.jpg"
                                class="img-thumbnail card-img social-profile-img">
                        </a>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="text-center pt-4">
                                    <p class="list-item-heading pt-2">{{ $data->name }}</p>
                                </div>
                                <h3 class="mb-3">
                                    Vendor No : {{ $data->vendor_no }}
                                </h3>
                                <h3 class="mb-3">
                                    Phone : {{ $data->phone }}
                                </h3>
                                <h3 class="mb-3">
                                    E-mail : {{ $data->email }}
                                </h3>

                            </div>
                        </div>

                        
                    </div>

                    
                </div>
            </div>

            
        </div>
    </div>
</div>
@stop