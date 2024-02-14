@extends('admin.content.layout')
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>Reviews Report</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Reviews Report</li>
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
                                <th scope="col">#</th>
                                <th scope="col">reporter</th>
                                <th scope="col">user</th>
                                <th scope="col">comment </th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $key=>$data)
                            <tr>
                                <th scope="row">{{ $key+1  }}</th>
                                <td>
                                   <a href="{{ URL::to('admin/users/single/'.$data->user_id) }}">
                                       {{ ($data->reporter)?$data->reporter->first_name.' '.$data->reporter->last_name:' ' }}
                                   </a>
                                </td>
                                <td>
                                    @if($data->comment_user)
                                        <a href="{{ URL::to('admin/users/single/'.$data->comment_user->id) }}">
                                           {{ ($data->comment_user)?$data->comment_user->first_name.' '.$data->comment_user->last_name:' ' }}
                                       </a>
                                   @endif
                                </td>
                                <td>
                                    {{ $data->comment }}
                                </td>
                                <td>
                                    @if($data->state != 1)
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                                      Hide  
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
                                            Hide that Comment from the application
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('home.Close') }}</button>
                                            <a href="{{ URL::to('admin/review/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }}</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endif
                                    <a href="{{ URL::to('admin/users/active/'.$data->comment_user->id) }}" class="btn btn-md btn-primary">
                                        {{ ($data->comment_user->active == 1)?'Block User':'Activate User' }}
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