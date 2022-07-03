@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    
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
                    <h6 class="m-0 font-weight-bold text-primary">Warehouse Details List</h6>
                </div>
                <div class="col-md-6">
                    <a href="{{route('warehouse-details-add')}}">
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
                            <th>Store Owner</th>
                            <th>Store Name</th>
                            <th>Phone</th>
                            <th>GST No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_details as $key => $value)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$value->store_owner}}</td>
                            <td>{{$value->store_name}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->gst_no}}</td>
                            <td>{{$value->status == 1 ? 'Active' : 'Deactive'}}</td>
                            <td>
                                <a href="{{route('warehouse-details-edit',$value->id)}}" class="btn btn-sm btn-warning fa fa-edit"></a>
                                <a onclick="return confirm('Are you sure to detele this?')" href="{{route('warehouse-details-delete',$value->id)}}" class="btn btn-sm btn-danger fa fa-trash-alt"></a>
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