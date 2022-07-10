@extends('admin.layouts.layouts')
@section('content')

<div class="content-wrapper pb-0">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0);" id="addProduct" class="float-right btn btn-outline-success btn-sm"><span class="mdi mdi-plus"></span>&nbsp;Add</a>
                </div>
            </div>
        </div>

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
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-info editProduct" _id="{{$list->_id}}"><span class="mdi mdi-pencil-box-outline"></span></a>
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
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeading">Add Product</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="cover-loader d-none">
                <div class="loader"></div>
            </div>


            <div class="modal-body h-body">
                <form id="product" action="" method="post">
                    @csrf
                    <div id="put"></div>
                    <div class="form-group">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label>SKU<span class="text-danger">*</span></label>
                        <input type="text" name="sku" id="sku" class="form-control form-control-sm" placeholder="Enter SKU" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control form-control-sm" id="category_id" name="category_id">
                            <option>select</option>
                            @foreach($categories as $show)
                            <option value="{{ $show->_id }}">{{ ucwords($show->category)}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sub Category</label>
                        <select class="form-control form-control-sm" id="sub_category_id" name="sub_category_id">
                           
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Unit</label>
                        <select class="form-control form-control-sm" id="unit_id" name="unit_id">
                            <option>select</option>
                            @foreach($units as $show)
                            <option value="{{ $show->_id }}">{{ ucwords($show->unit)}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control form-control-sm" id="brand_id" name="brand_id">
                            <option>select</option>
                            @foreach($brands as $show)
                            <option value="{{ $show->_id }}">{{ ucwords($show->brand)}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control form-control-sm" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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

        $('#addProduct').click(function() {
            $('#modalHeading').html('Add Product');
            $('#submitproduct').html('Submit');
            $('form#product').attr('action', '{{url("admin/product")}}');
            $('form#product')[0].reset();
            $('#put').html('');
            $('#productModal').modal('show');
        });

        $('form#product').submit(function(e) {
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
                        $('form#product')[0].reset();
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
        $('.editProduct').click(function() {

            let id = $(this).attr('_id');

            let url = `{{url('admin/product')}}/${id}/edit`;

            axios.get(url).then(resp => {
                response = resp.data.data.res;
               
                $('#title').val(response.title);
                $('#sku').val(response.sku);
                $('#category_id').val(response.category_id);
                $('#sub_category_id').val(response.sub_category_id);
                $('#unit_id').val(response.unit_id);
                $('#brand_id').val(response.brand_id);
                $('#status').val(response.status);
                if (response.sub_category_id) {
                    $('#sub_category_id').val(response.sub_category_id);
                    $('select[name="sub_category_id"]').append('<option value="' + response.sub_category_id + '">' + response.sub_category[0].toUpperCase() + response.sub_category.slice(1) + '</option>');
                }
                $('form#product').attr('action', '{{url("admin/product")}}/' + id);
                $('#put').html('<input type="hidden" name="_method" value="PUT">');

                $('#modalHeading').html('Edit Product');
                $('#submitproduct').html('Update');
                $('#productModal').modal('show');

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

            let url = `{{url('admin/product')}}/${id}/edit`;

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

    $(document).ready(function() {
        $('#category_id').on('change', function() { 
            var cat_id = $(this).val();
            $.ajax({
                url: 'getSubCategory/' + cat_id,
                type: "GET",
                data: '',
                dataType: "json",
                success: function(data) {

                    if (data) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="" hidden>Select</option>');
                        data.forEach(function(e) {
                            $('select[name="sub_category_id"]').append('<option value="' + e._id + '" >' + e.sub_category[0].toUpperCase() + e.sub_category.slice(1) + '</option>');
                        });
                    } else {
                        $('#sub_category_id').empty();
                    }

                }
            });
        });
    });
</script>
@endpush
@endsection