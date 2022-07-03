@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- <h1 class="h3 mb-2 text-gray-800">Shopkeeper</h1> -->
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Brand List</h6>
                </div>
                <div class="col-md-6">
                    <a href="javascript:;">
                        <button style="float: right;" class="btn btn-sm btn-primary">
                            Add
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>State Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$value->state_name}}</td>
                            <td>
                                <a href="{{route('shopkeeper-details-edit',$value->id)}}" class="btn btn-sm btn-warning fa fa-edit"></a>
                                <a onclick="return confirm('Are you sure to detele this?')" href="{{route('shopkeeper-details-delete',$value->id)}}" class="btn btn-sm btn-danger fa fa-trash-alt"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection