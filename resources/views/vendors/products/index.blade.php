@extends('vendors.content.layout')
@section('content') 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="row">
    <div class="col-12">

        <h1>Products</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('vendors/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        {{ Form::open(['url'=>'vendors/dashboard/products/'.$id,'method'=>'GET']) }}
                        <div class="input-group typeahead-container">
                           <input type="text" class="form-control typeahead" name="name" id="query" placeholder="Search by product  name or partner sku  or order generated no ..." value="{{ app('request')->input('name') }}" data-provide="typeahead" autocomplete="off">
                           <div class="input-group-append ">
                              <button type="submit" class="btn btn-primary default">
                              <i class="simple-icon-magnifier"></i>
                              </button>
                           </div>
                        </div>
                        {{ form::close() }}
                      </div>
                      <div class="col-6 text-right">
                          <a href="{{ URL::to('vendors/dashboard/products/import/'.$id) }}" class="btn btn-md btn-primary add_btn">Import Product</a>
                          <a  class="btn btn-md btn-primary add_btn" data-toggle="modal" data-target="#exampleModal_offer">Add Offer </a>
                          <a  class="btn btn-md btn-primary add_btn" href="{{ URL::to('vendors/dashboard/store/offers/'.$id) }}">All Offer </a>
                          <a href="{{ URL::to('vendors/dashboard/products/add/'.$id) }}" class="btn btn-md btn-primary add_btn">Add New Product</a>
                      </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Order_GNO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Partner SKU</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Offers</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $key=>$data)
                            <tr>
                                <th scope="row"> 
                                    @if(count($data->images))
                                    <img src="{{ URL::to($data->images[0]) }}" alt="Marble Cake"
                                        class="list-thumbnail border-0" />
                                    @endif
                                </th>
                                <th > {{ $data->order_gno }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->partner_sku }}</td>
                                <td>{{ ($data->category)?$data->category->name:' ' }}</td>
                                <td>{{ ($data->brand)?$data->brand->name:' ' }}</td>
                                <td>
                                    <a href="{{ URL::to('vendors/dashboard/produt/offers/'.$data->id) }}" class="add_icon">
                                        <i class="glyph-icon simple-icon-list"></i>
                                    </a>
                                    <a class="add_icon" data-toggle="modal" data-target="#exampleModal_offer_{{ $data->id }}">
                                      <i class="glyph-icon simple-icon-plus"></i>
                                    </a>
                                    <div class="modal fade" id="exampleModal_offer_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Offer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          {{ Form::open(['url'=>'vendors/dashboard/product/offer/'.$data->id,'class'=>'ajax_form ']) }}

                                          <h2 class="form_error"></h2>
                                          <div class="modal-body">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> Discount Percentage </span>
                                                </div>
                                                <div class="custom-file">
                                                   {{ Form::number('discount_percentage',1,['class'=>'form-control','required','min'=>1]) }}
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> Start Day  </span>
                                                </div>
                                                <div class="custom-file">
                                                   {{ Form::date('start_day',null,['class'=>'form-control','required','min'=>date('Y-m-d')]) }}
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> End Day </span>
                                                </div>
                                                <div class="custom-file">
                                                   {{ Form::date('end_day',null,['class'=>'form-control','required','min'=>date('Y-m-d')]) }}
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
                                </td>
                                <td>
                                    <a href="{{ URL::to('vendors/dashboard/products/edit/'.$data->id) }}" class="btn btn-md btn-primary">Edit</a>
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
                                            <a href="{{ URL::to('vendors/dashboard/products/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }} </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="8">
                                  <div class="justify-content-center">
                                      {{ $allData->links() }}
                                  </div>  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="modal fade" id="exampleModal_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Offer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::open(['url'=>'vendors/dashboard/add/offer/'.$id,'class'=>'ajax_form']) }}
      <h2 class="form_error"></h2>
      <div class="modal-body">
        @if($brands)
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> Brand </span>
            </div>
            <div class="custom-file">
               {{ Form::select('brand_id',$brands,old('brand_id'),['class'=>'form-control js-example-basic-single','min'=>0,'placeholder'=>'Choose Brand ']) }}
            </div>
        </div>
        @endif
        @if($categories)
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> Categpry </span>
            </div>
            <div class="custom-file">
               {{ Form::select('category_id',$categories,old('brand_id'),['class'=>'form-control js-example-basic-single','min'=>0,'placeholder'=>'Choose Category']) }}
            </div>
        </div>
        @endif
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> Discount Percentage </span>
            </div>
            <div class="custom-file">
               {{ Form::number('discount_percentage',1,['class'=>'form-control','required','min'=>1]) }}
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> MiniMum Order </span>
            </div>
            <div class="custom-file">
               {{ Form::number('minimum_order',0,['class'=>'form-control','required','min'=>0]) }}
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> Start Day </span>
            </div>
            <div class="custom-file">
               {{ Form::date('start_day',null,['class'=>'form-control','required','min'=>date('Y-m-d')]) }}
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> End Day </span>
            </div>
            <div class="custom-file">
               {{ Form::date('end_day',null,['class'=>'form-control','required','min'=>date('Y-m-d')]) }}
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
<script type="text/javascript">
    $('.js-example-basic-single').select2();
</script>
@stop