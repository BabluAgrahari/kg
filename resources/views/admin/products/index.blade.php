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
                            <th>Assign To</th>
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
                            <td><a href="javascript:void(0);" class="btn btn-sm btn-outline-info assignSupplier" _id="{{$list->_id}}">Assign</a></td>
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

@push('modal')
<!-- Modal -->
<div class="modal fade" id="AssignSupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeading">Assign Supplier</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="cover-loader d-none">
                <div class="loader"></div>
            </div>


            <div class="modal-body h-body">
                <form id="assignSupplier" action="{{url('admin/assignSupplier')}}" method="post">
                    @csrf
                    <div id="put"></div>
                    <input type="hidden" id="productId" name="productId">
                    <div class="form-group">
                        <label>Supplier<span class="text-danger">*</span></label>
                        <select class="form-control" id="supplier_id" name="supplier_id"  required>
                            <option disabled>select</option>
                            @foreach($suppliers as $show)
                            <option value="{{ $show->_id }}">{{ ucwords($show->name)}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="supplierMsg"></span>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" id="Assign">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush
@push('script')
<script>
    $(document).ready(function() {

        $('.assignSupplier').click(function() {
            $('form#assignSupplier')[0].reset();
            let id = $(this).attr('_id');
            $('#productId').val(id);
            $('#AssignSupplierModal').modal('show');
        });

        $('form#assignSupplier').submit(function(e) {
            
            e.preventDefault();
            formData = new FormData(this);
            let url = $(this).attr('action');
            $('.cover-loader').removeClass('d-none');
            $('.h-body').addClass('d-none');
            axios.post(url, formData)
                .then(function(response) {
                    res = response.data;

                    $('.cover-loader').addClass('d-none');
                    $('.h-body').removeClass('d-none');

                    /*Start Validation Error Message*/
                    $('span.custom-text-danger').html('');
                    $.each(res.validation, (index, msg) => {
                        $(`#${index}_msg`).html(`${msg}`);
                    })
                    /*Start Validation Error Message*/

                    /*Start Status message*/
                    if (res.status == 'success' || res.status == 'error') {
                        Swal.fire(
                            `${res.status}!`,
                            res.msg,
                            `${res.status}`,
                        )
                    }
                    /*End Status message*/

                    //for reset all field
                    if (res.status == 'success') {
                        $('form#assignSupplier')[0].reset();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }

                })
                .catch(function(error) {
                    console.log(error);
                    error = error ?? '';
                    Swal.fire(
                        `Error!`,
                        error,
                        `error`,
                    );
                });
        });
    })
</script>
@endpush
@endsection