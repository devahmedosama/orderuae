<!DOCTYPE html>
<html lang="en">
<?php $setting =  App\Models\Setting::first(); ?>
<head>
    <meta charset="UTF-8">
    <title>{{ $setting->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/main.css" />
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">
                            <p class=" text-white h2">Order DashBoard</p>
                        </div>
                        <div class="form-side">
                            <a href="">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4">Login</h6>
                            @if(session('no'))
                            <div class="alert alert-danger">
                                {{ session('no') }}
                            </div>
                            @endif
                            {{  Form::open(['url'=>'admin/login']) }}
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="email" />
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="password" type="password" placeholder="" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            {{ Form::token() }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        var base_url = '{{ URL::to("/") }}';
    </script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/dore.script.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/scripts.js"></script>
</body>

</html>