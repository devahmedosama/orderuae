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
                           {{ trans('home.Previous Orders') }} 
                        </p>
                        
                        <table class="table orders-table">
                          <thead>
                            <tr>
                              <th scope="col">{{ trans('home.Order No') }}</th>
                              <th scope="col">{{ trans('home.Order State') }}</th>
                              <th scope="col">{{ trans('home.Total Price') }}</th>
                              <th scope="col">{{ trans('home.Date') }}</th>
                              <th scope="col">{{ trans('home.Options') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($allData as $data)
                            <tr>
                              <th scope="row">  {{ $data->id }} </th>
                              <td>  {{ $data->state_name }} </td>
                              <td>  {{ $data->total_price }} </td>
                              <td>  {{ date('Y-m-d',strtotime($data->created_at)) }} </td>
                              <td> 
                                    <a href="{{ URL::to($lang.'/order/details/'.$data->id) }}" class="btn btn-primary btn-md">
                                        {{ trans('home.View') }}
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
    </section>
</section>
@stop