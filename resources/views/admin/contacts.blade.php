@extends('admin.content.layout')
@section('content')
	<div class="page-header">
        <h2 class="header-title">{{ trans('home.All Sliders') }}</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ URL::to('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ trans('home.Home') }}</a>
                <span class="breadcrumb-item active">Sliders</span>
            </nav>
        </div>
    </div>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			    <table class="table">
			        <thead>
			            <tr>
			                <th scope="col">#</th>
			                <th scope="col">{{ trans('home.Name') }}</th>
			                <th scope="col">{{ trans('home.Phone') }}</th>
			                <th scope="col">{{ trans('home.E-mail') }}</th>
			                <th scope="col">{{ trans('home.Options') }}</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($allData as $data)
			            <tr>
			                <th scope="row">{{ $data->id }}</th>
			                <td>{{ $data->fname }} {{ $data->lname }}</td>
			                <td>{{ $data->phone }}</td>
			                <td>{{ $data->email }}</td>
			                <td>
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalshow{{ $data->id }}">
								  Show
								</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalshow{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        {{ $data->text }}
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('home.Close') }}</button>
								      </div>
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
								        <a href="{{ URL::to('admin/contacts/delete/'.$data->id) }}" class="btn btn-danger">{{ trans('home.Confirm') }}</a>
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
@stop