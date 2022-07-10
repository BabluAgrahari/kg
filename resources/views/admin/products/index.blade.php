@extends('admin.layouts.layouts')
@section('content')

<div class="content-wrapper pb-0">

    <div class="card shadow mb-4">

        <x-page-head title="Product List" url="admin/product/create" type="list" />

        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ ucwords($list->category_id ? $list->categoryName->category : '')}}</td>
                            <td>{{ ucwords($list->sub_category_id ? $list->subCategoryName->sub_category : '')}}</td>
                            <td>{!!$list->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">In Active</span>'!!}</td>
                            <td>
                            <a href="{{ url('admin/product/'.$list->_id.'/edit') }}" class="btn btn-sm btn-outline-info"><span class="mdi mdi-pencil-box-outline"></span></a>
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