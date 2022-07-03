@extends('admin.layouts.layouts')
@section('content')
<div class="content-wrapper pb-0">

    <div class="card shadow mb-4">

        <x-page-head title="Shopkeeper List" url="admin/shopkeeper/create" type="list" />

        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Store Owner</th>
                            <th>Store Name</th>
                            <th>MObile</th>
                            <th>GST No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_details as $key => $value)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->store_name}}</td>
                            <td>{{$value->mobile}}</td>
                            <td>{{$value->gst_no}}</td>
                            <td>{{$value->status == 1 ? 'Active' : 'Deactive'}}</td>
                            <td>
                                <a href="{{ url('admin/shopkeeper/'.$value->_id.'/edit') }}" class="btn btn-sm btn-outline-info"><span class="mdi mdi-pencil-box-outline"></span></a>
                                <a onclick="return confirm('Are you sure to detele this?')" href="" class="btn btn-sm btn-outline-danger"><span class="mdi mdi-delete"></span></a>
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