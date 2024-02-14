@extends('admin.content.layout')
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>Countries</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> {{ $title }} </li>
            </ol>
        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ URL::to('admin/stores/add/'.$id) }}" class="btn btn-md btn-primary add_btn">Add New Store</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Products </th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $data)
                            <tr>
                                <th scope="row">{{ $data->id  }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ ($data->category)?$data->category->name:'' }}</td>
                                <td> <a href="{{ URL::to('admin/products/'.$data->id) }}" class="btn btn-xs btn-info">{{ $data->products_count }} products</a> </td>
                                <td>
                                    <a href="{{ URL::to('admin/stores/edit/'.$data->id) }}" class="btn btn-md btn-primary">Edit</a>
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