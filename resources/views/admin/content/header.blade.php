<!DOCTYPE html>
<html lang="en">
<?php 
    $setting =  App\Models\Setting::first();
 ?>
<head>
    <meta charset="UTF-8">
    <title>{{ $setting->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/font/simple-line-icons/css/simple-line-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/fullcalendar.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/glide.core.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/nouislider.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/main.css" />
     <script src="{{ URL::to('assets/admin') }}/js/vendor/jquery-3.3.1.min.js"></script>
</head>

<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
        </div>

        <a class="navbar-logo" href="{{ URL::to('admin') }}">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                
                <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="{{ URL::to('admin/settings') }}" class="icon-menu-item">
                            <i class="iconsminds-equalizer d-block"></i>
                            <span>Settings</span>
                        </a>

                        <a href="{{ URL::to('admin/vendors') }}" class="icon-menu-item">
                            <i class="iconsminds-shop-4 d-block"></i>
                            <span>Vendors</span>
                        </a>

                        <a href="{{ URL::to('admin/departments') }}" class="icon-menu-item">
                            <i class="simple-icon-layers d-block"></i>
                            <span>Departments</span>
                        </a>

                        <a href="{{ URL::to('admin/orders') }}" class="icon-menu-item">
                            <i class="iconsminds-shopping-cart d-block"></i>
                            <span>Orders</span>
                        </a>

                        <a href="{{ URL::to('admin/refunds') }}" class="icon-menu-item">
                            <i class="iconsminds-synchronize-2 d-block"></i>
                            <span>Refunds</span>
                        </a>

                        <a href="{{ URL::to('admin/payments/vendors') }}" class="icon-menu-item">
                            <i class="iconsminds-money-bag d-block"></i>
                            <span>V Payments</span>
                        </a>

                    </div>
                </div>

                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell"></i>
                        <span class="count">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ URL::to('assets/admin') }}/img/profiles/l-2.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ URL::to('assets/admin') }}/img/notifications/1.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ URL::to('assets/admin') }}/img/notifications/2.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 ">
                                <a href="#">
                                    <img src="{{ URL::to('assets/admin') }}/img/notifications/3.jpg" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">3 items just added to wish list by a user!
                                        </p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name">{{ Auth::guard('admin')->user()->name }}</span>
                    <span>
                        <img alt="Profile Picture" src="{{ URL::to('assets/admin') }}/img/profiles/l-1.jpg" />
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="{{ URL::to('admin/profile') }}">Account</a>
                    <a class="dropdown-item" href="{{ URL::to('admin/logout') }}">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
    
