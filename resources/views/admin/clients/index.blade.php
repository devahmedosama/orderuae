@extends('admin.content.layout') 
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>{{ $title }}</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                    {{ Form::open(['url'=>'admin/users','method'=>'GET']) }}
                    <div class="row">
                            <div class="col-md-4 form-group">
                                {{ Form::text('name',app('request')->input('name'),['class'=>'form-control','placeholder'=>'client name']) }}
                            </div>
                            
                            <div class="col-md-4 form-group">
                                {{ Form::text('phone',app('request')->input('phone'),['class'=>'form-control','placeholder'=>'client phone']) }}
                            </div>
                            <div class="col-md-4 form-group">
                                {{ Form::text('email',app('request')->input('email'),['class'=>'form-control','placeholder'=>'client email']) }}
                            </div>
                            <div class="col-md-5 form-group">
                                <label class="lable-control">Date From</label>
                                {{ Form::date('date_from',app('request')->input('date_from'),['class'=>'form-control']) }}
                            </div>
                            <div class="col-md-5 form-group">
                                <label class="lable-control">Date To</label>
                                {{ Form::date('date_to',app('request')->input('date_to'),['class'=>'form-control']) }}
                            </div>
                            <div class="col-md-2 form-group text-center">
                                <label class="lable-control"> &nbsp</label>
                                <button type="submit" class="btn btn-primary btn-lg btn_block">Search</button>
                            </div>
                    </div>
                    {{ Form::close() }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $key=>$data)
                            <tr>
                                <th scope="row">{{ $key+1  }}</th>
                                <td>{{ $data->first_name.' '.$data->last_name }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <a href="{{ URL::to('admin/users/single/'.$data->id) }}" class="btn btn-md btn-primary">View</a>
                                    <a href="{{ URL::to('admin/users/active/'.$data->id) }}" class="btn btn-md btn-primary">
                                        {{ ($data->active == 1)?'Stop':'Activate' }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
    
@stop