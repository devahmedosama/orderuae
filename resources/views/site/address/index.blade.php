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
                           {{ trans('home.manage your shipping addresses') }} 
                        </p>
                        <table class="table orders-table">
                          <thead>
                            <tr>
                              <th scope="col">{{ trans('home.Order No') }}</th>
                              <th scope="col">{{ trans('home.Address') }}</th>
                              <th scope="col">{{ trans('home.City') }}</th>
                              <th scope="col">{{ trans('home.Options') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($allData as $data)
                            <tr>
                              <th scope="row">  {{ $data->id }} </th>
                              <td>  {{ $data->address }} </td>
                              <td>  {{ $data->city }} </td>
                              <td> 
                                    <a href="{{ URL::to($lang.'/edit/addresses/'.$data->id) }}" class="btn btn-primary btn-md">
                                        {{ trans('home.Edit') }}
                                    </a> 
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
                                            <a href="{{ URL::to($lang.'/delete/addresses/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }} </a>
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
    </section>
</section>
@stop