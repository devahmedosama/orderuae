@extends('vendors.content.layout')
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>{{ $title }}</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('vendors/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('vendors/dashboard/products/'.$product->store_id) }}">Store Product</a>
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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Discount Percentage</th>
                                <th scope="col">Start Day</th>
                                <th scope="col">End Day</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $key=>$data)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $data->discount_percentage }}%</td>
                                <td>{{ $data->start_day }}</td>
                                <td>{{ $data->end_day }}</td>
                                <td>
                                    <a class="btn btn-md btn-primary cursor" data-toggle="modal" data-target="#exampleModal_offer_{{ $data->id }}">Edit</a>
                                    <div class="modal fade" id="exampleModal_offer_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Offer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          {{ Form::open(['url'=>'vendors/dashboard/edit/product/offer/'.$data->id,'class'=>'ajax_form edit_form']) }}
                                          <h2 class="form_error"></h2>
                                          <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> Discount Percentage </span>
                                                </div>
                                                <div class="custom-file">
                                                   {{ Form::number('discount_percentage',$data->discount_percentage,['class'=>'form-control','required','min'=>1]) }}
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> Start Day  </span>
                                                </div>
                                                <div class="custom-file">
                                                   {{ Form::date('start_day',$data->start_day,['class'=>'form-control','required','min'=>date('Y-m-d')]) }}
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> End Day </span>
                                                </div>
                                                <div class="custom-file">
                                                   {{ Form::date('end_day',$data->end_day,['class'=>'form-control','required','min'=>date('Y-m-d')]) }}
                                                </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            {{ Form::token() }}
                                            <button  type="submit" class="btn btn-primary">{{ trans('home.Confirm') }} </button>
                                          </div>
                                          {{ Form::close() }}
                                        </div>
                                      </div>
                                    </div>
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
                                            <a href="{{ URL::to('vendors/dashboard/offers/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }} </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
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