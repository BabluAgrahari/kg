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
                    <select class="form-control form-control-sm" name="supplier_id">
                        <option value="">Select</option>
                        @foreach($suppliers as $list)
                        <option value="{{ $list->_id }}">{{ ucwords($list->store_name)}}</option>
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
                        <th>Price</th>
                        <th>Assigned</th>
                        <th>Action</th>
                    </tr>
                    <!-- </thead> -->
                    <tbody>
                        @foreach($productLists as $key => $plist)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{!empty($plist->Product->title) ? ucwords($plist->Product->title): ''}}</td>
                            <td>{{!empty($plist->Supplier->store_name) ? ucwords($plist->Supplier->store_name): ''}}</td>
                            <td>{{ !empty($plist->price) ? $plist->price : '' }}</td>
                            <td>{{ $plist->dformat($plist->created)}}</td>
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
    $(document).ready(function() {

        //for edit
        $('.editSupplierProduct').click(function() {

            let id = $(this).attr('_id');

            let url = `{{url('admin/supplier_product')}}/${id}/edit`;

            axios.get(url).then(resp => {
                response = resp.data.data;
                $('#price').val(response.name);
                $('#date').val(response.category_id);

                $('form#supplier_product').attr('action', '{{url("admin/supplier_product")}}/' + id);
                $('#put').html('<input type="hidden" name="_method" value="PUT">');
                $('#submitproduct').html('Update');
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