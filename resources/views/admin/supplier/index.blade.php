@extends('admin.layouts.layouts')
@section('content')

<div class="content-wrapper pb-0">

    <div class="card shadow mb-4">
    <x-page-head title="Supplier List " url="admin/supplier/create" type="list" />
       
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Store Name</th>
                            <th>Store Address</th>
                            <th>Verified</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $lsit)
                        <tr>
                        <td>{{ ++$key }}</td>
                            <td>{{$lsit->name}}</td>
                            <td>{{$lsit->email}}</td>
                            <td>{{$lsit->mobile}}</td>
                            <td>{{$lsit->store_name}}</td>
                            <td>{{$lsit->store_address}}</td>
                            <td>{!! $lsit->verified == 1? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>' !!}</td>
                            <td>{!!$lsit->status == 1 ? '<span class="badge badge-success">Avtive</span>' : '<span class="badge badge-warning">In Active</span>'!!}</td>
                            <td>
                                <a href="{{ url('admin/supplier/'.$lsit->_id.'/edit') }}" class="btn btn-sm btn-outline-info"><span class="mdi mdi-pencil-box-outline"></span></a>
                                <a onclick="return confirm('Are you sure to detele this?')" href="" class="btn btn-sm btn-outline-danger"><span class="mdi mdi-delete"></span></a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection