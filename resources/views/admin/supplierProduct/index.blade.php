@extends('admin.layouts.layouts')
@section('content')

<div class="content-wrapper pb-0">

    <div class="card shadow mb-4">

        <!-- <x-page-head title="Supplier List " url="admin/supplier" type="list" /> -->
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-10">
                    <h6 class="m-0 font-weight-bold text-primary">Supplier Products</h6>
                </div>
                <div class="col-md-2">
                    <label>Supplier</label>
                    <select class="form-control form-control-sm" id="selectSupplier">
                        <option value="">Select</option>
                        @foreach($suppliers as $list)
                        <option value="{{ $list->_id }}" {{ (app('request')->input('supplier_id')==$list->_id)?"selected":"" }}>{{ ucwords($list->store_name)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-hovered">
                    <!-- <thead> -->
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Supplier Name</th>
                        <th>Assign Date</th>
                        <th>Price</th>
                        <th>Date Range</th>
                        <th>Action</th>
                    </tr>
                    <!-- </thead> -->
                    <tbody>
                        @foreach($productLists as $key => $plist)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{!empty($plist->Product->title) ? ucwords($plist->Product->title): ''}}</td>
                            <td>{{!empty($plist->Supplier->store_name) ? ucwords($plist->Supplier->store_name): ''}}</td>
                            <td>{{ $plist->dformat($plist->created)}}</td>
                            <td>{{ !empty($plist->price) ? $plist->price : '' }}</td>
                            <td>{{ !empty($plist->start_date) ? $plist->start_date:'' }} To {{ !empty($plist->end_date) ? $plist->end_date: ''}}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-info editSupplierProduct" _id="{{$plist->_id}}"><span class="mdi mdi-pencil-box-outline"></span></a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger remove"><span class="mdi mdi-delete"></span></a>
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
<div class="modal fade" id="editSupplierProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeading">Edit Product</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="cover-loader d-none">
                <div class="loader"></div>
            </div>


            <div class="modal-body h-body">
                <form id="supplier_product" action="" method="post">
                    @csrf
                    <div id="put"></div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" id="price" class="form-control form-control-sm" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label>Date Range</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" id="start_date" class="form-control form-control-sm" name="start_date">
                            </div>
                            <div class="col-md-6">
                                <input type="date" id="end_date" class="form-control form-control-sm" name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" id="submitproduct">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush
@push('script')
<script>
    $('#selectSupplier').on('load change', function() {
        var id = $(this).val();
        window.location.href = window.location.origin + '/admin/supplier_product' + '? supplier_id=' + id;
    })

    $(document).ready(function() {

        $('form#supplier_product').submit(function(e) {
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
                        $('form#supplier_product')[0].reset();
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


        //for edit
        $('.editSupplierProduct').click(function() {

            let id = $(this).attr('_id');

            let url = `{{url('admin/supplier_product')}}/${id}/edit`;

            axios.get(url).then(resp => {
                response = resp.data.data;

                $('#price').val(response.price);
                $('#start_date').val(response.start_date);
                $('#end_date').val(response.end_date);

                $('form#supplier_product').attr('action', '{{url("admin/supplier_product")}}/' + id);
                $('#put').html('<input type="hidden" name="_method" value="PUT">');
                $('#editSupplierProductModal').modal('show');

            }).catch(function(error) {
                console.log(error);
                error = error ?? '';
                Swal.fire(
                    `Error!`,
                    error,
                    `error`,
                );
            });
        })


        //for delete
        $('.remove').click(function() {

            let id = $(this).attr('_id');

            let url = `{{url('admin/sub_category')}}/${id}/edit`;

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    })
</script>
@endpush
@endsection