@extends('admin.layouts.layouts')
@section('content')

<div class="content-wrapper pb-0">
    <div class="card shadow mb-4">

        <div class="cover-loader d-none">
            <div class="loader"></div>
        </div>
        <x-page-head title="Add Product " url="admin/product" type="create" />

        <div class="card-body h-body">
            <div class="row">

                <div class="col-lg-12">
                    <form id="product" action="{{url('admin/product')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Enter Title" >
                                <span id="title_msg" class="c-text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>SKU<span class="text-danger">*</span></label>
                                <input type="text" name="sku" id="sku" class="form-control form-control-sm" placeholder="Enter SKU" >
                                <span id="sku_msg" class="c-text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Category</label>
                                <select class="form-control form-control-sm" id="category_id" name="category">
                                    <option value="">Select</option>
                                    @foreach($categories as $list)
                                    <option value="{{ $list->_id }}">{{ ucwords($list->name)}}</option>
                                    @endforeach
                                </select>
                                <span id="category_msg" class="c-text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Sub Category</label>
                                <select class="form-control form-control-sm" id="sub_category_id" name="sub_category">
                                </select>
                                <span id="sub_category_msg" class="c-text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Unit</label>
                                <select class="form-control form-control-sm" id="e3" name="unit">
                                    <option value="">select</option>
                                    @foreach($units as $a)
                                    <option value="{{ $list->_id }}">{{ ucwords($list->unit)}}</option>
                                    @endforeach
                                </select>
                                <span id="unit_msg" class="c-text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Brand</label>
                                <select class="form-control form-control-sm" id="brand_id" name="brand">
                                    <option value="">select</option>
                                    @foreach($brands as $list)
                                    <option value="{{ $list->_id }}">{{ ucwords($list->brand)}}</option>

                                    @endforeach
                                </select>
                                <span id="brand_msg" class="c-text-danger"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Status</label>
                                <select class="form-control form-control-sm" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span id="status_msg" class="c-text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="submit" value="Submit" class="btn btn-success">
                                <button type="reset" class="btn btn-warning"><span class="mdi mdi-rotate-left"></span>&nbsp;Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
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
                        // location.reload();
                    }, 1000);
                }

            })
            .catch(function(error) {
                console.log(error);
                Swal.fire(
                    `Error!`,
                    error,
                    `error`,
                );
            });
    })

    $(document).ready(function() {
        $('#category_id').on('click', function() {
            var cat_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/getSubCategory') }}/" + cat_id,
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