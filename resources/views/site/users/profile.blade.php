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
                           {{ trans('home.Profile') }} 
                        </p>
                        <p class="subtitle">
                           {{ trans('home.Manage your profile details') }} 
                        </p>
                        {{ Form::open(['url'=>$lang.'/myprofile','class'=>'update-data-box ajax-form
                        ']) }}
                           <div class="dot-elastic"></div>
                           <div class="form-alert"></div>
                            <p class="box-head">
                                {{ trans('home.General Information') }}
                            </p>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="label">
                                           {{ trans('home.First Name') }} 
                                        </label>
                                        {{ Form::text('first_name',$data->first_name,['class'=>'input']) }}
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="label">
                                           {{ trans('home.Last Name') }} 
                                        </label>
                                        {{ Form::text('last_name',$data->last_name,['class'=>'input']) }}
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="label">
                                            {{ trans('home.Phone') }}
                                        </label>
                                        {{ Form::text('phone',$data->phone,['class'=>'input']) }}
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="label">
                                            {{ trans('home.E-mail') }}
                                        </label>
                                        {{ Form::email('email',$data->email,['class'=>'input']) }}
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="submit">
                                      {{ trans('home.Save') }}  
                                    </button>
                                </div>
                            </div>
                         {{ Form::token() }}
                        {{ Form::close() }}
                        {{ Form::open(['url'=>$lang.'/change/password','class'=>'update-data-box ajax-form
                        ']) }}
                           <div class="dot-elastic"></div>
                           <div class="form-alert"></div>
                            <p class="box-head">
                                {{ trans('home.Change Password') }} ..
                            </p> 
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <label class="label">
                                          {{ trans('home.Old Password') }}  
                                        </label>
                                        {{ Form::password('old_password',['required','class'=>'input','placeholder'=>'*****']) }}
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label class="label">
                                           {{ trans('home.New Password') }} 
                                        </label>
                                        {{ Form::password('password',['required','class'=>'input','placeholder'=>'*****']) }}
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label class="label">
                                           {{ trans('home.Confirm Password') }} 
                                        </label>
                                       {{ Form::password('confirm_password',['required','class'=>'input','placeholder'=>'*****']) }}
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="submit">
                                        {{ trans('home.Save') }}
                                    </button>
                                </div>
                            </div>
                        {{ Form::token() }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@stop