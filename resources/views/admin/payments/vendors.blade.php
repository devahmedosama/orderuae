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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Refund</th>
                                <th scope="col">Already Transfered </th>
                                <th scope="col">Due  Payment </th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($allData as $data)
                            <tr>
                                <th scope="row">{{ $data->id  }}</th>
                                <td>{{ $data->name }}</td>
                                <td> 
                                    <a href="{{ URL::to('admin/vendor/orders/'.$data->id.'?state=2') }}" class="btn btn-xs btn-primary">
                                        {{ round($data->total_payment,2)  }}
                                    </a> 
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/vendor/refunds/'.$data->id) }}" class="btn btn-xs btn-success">
                                        {{ round($data->refund,2)  }}
                                    </a>
                                </td>
                                <td>0</td>
                                <td>
                                    {{  $data->due_payment  }}
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