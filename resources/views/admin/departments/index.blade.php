@extends('admin.content.layout')
@section('content') 
<div class="row">
    <div class="col-12">

        <h1>Departments</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL::to('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Departments</li>
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
                                <th scope="col">Name</th>
                                <th scope="col">Main Categories</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $data)
                            <tr>
                                <th scope="row">{{ $data->id  }}</th>
                                <td>{{ $data->name }}</td>
                                <td><a href="{{ URL::to('admin/categories?department_id='.$data->id) }}" class="btn-xs btn-primary btn ">
                                    {{ $data->categories_count }}
                                </a></td>
                                <td>
                                    <a href="{{ URL::to('admin/departments/edit/'.$data->id) }}" class="btn btn-md btn-primary">Edit</a>
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