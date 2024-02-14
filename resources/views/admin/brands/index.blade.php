@extends('admin.content.layout')
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>Brands</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Brands</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                    {{ Form::open(['url'=>'admin/brands','method'=>'GET']) }}
                    <div class="row">
                            <div class="col-md-10 form-group">
                                {{ Form::text('name',app('request')->input('name'),['class'=>'form-control','placeholder'=>'client name']) }}
                            </div>
                            <div class="col-md-2 form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg btn_block">Search</button>
                            </div>
                    </div>
                    {{ Form::close() }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $data)
                            <tr>
                                <th scope="row">{{ $data->id  }}</th>
                                <td>{{ $data->name }}</td>
                                <td> {{ ($data->category)?$data->category->name:' ' }} </td>
                                <td>
                                    <a href="{{ URL::to('admin/brands/edit/'.$data->id) }}" class="btn btn-md btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                                      {{ trans('home.Delete') }} 
                                    </button>
                                    <!-- Modal -->
                                   <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('home.Alert') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            {{ trans('home.Are You Sure You Want to Delete This ?') }}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('home.Close') }}</button>
                                            <a href="{{ URL::to('admin/brands/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }}</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"> {{ $allData->links() }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
    
@stop