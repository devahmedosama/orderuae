@extends('site.content.layout')
@section('content')
<section class="content">
	<section class="signup-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"> 
                    	<h2 class="text-center">{{  trans('home.Sign Up') }}</h2>
                        
                        {{ Form::open([$lang.'/login','class'=>'login-form']) }}
                           @if(session('no'))
                            <h3 class="error-msg">
                                {{ session('no') }}
                            </h3>
                            @endif

                            
                            {{ Form::text('email',null,['class'=>'form-control','required','placeholder'=>trans('home.E-mail')]) }}
                            {{ Form::password('password',['class'=>'form-control','required','placeholder'=>'*****']) }}
                            <button> {{ trans('home.Sign In') }} </button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </section>
</section>
@stop