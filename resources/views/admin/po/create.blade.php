@extends('admin.layouts.layouts')
@section('content')
<style>
    .disable-row {
        background-color: #ececec;
        color: #b9b9b9;
    }

    .a-disabled {
        pointer-events: none;
        background-color: #ececec;
        color: #b9b9b9;
    }
</style>
<div class="content-wrapper pb-0">
    <div class="card shadow mb-4">

        <div class="cover-loader d-none">
            <div class="loader"></div>
        </div>
        <x-page-head title="Create Purchase Order" url="admin/po" type="create"/>

        <div class="card-body h-body">
            <div class="row">

                <div class="col-lg-12">
                    <form id="po" action="{{url('admin/po')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>PO No</label>
                                <input type="text" name="po_no" value="{{time()}}" id="po_no" class="form-control form-control-sm" placeholder="Enter PO No">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Select Supllier</label>
                                <select class="form-control form-control-sm" name="supplier_id" id="supplier">
                                    <option value="">Select</option>
                                    @foreach($suppliers as $list)
                                    <option value="{{$list->_id}}">{{ ucwords($list->store_name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sku</th>
                                            <th>Product</th>
                                            <th>Remaning Qty</th>
                                            <th>Pending Qty</th>
                                            <th>Requested Qty</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <tr>
                                                <td colspan="8" class="text-center">Select A Supplier!</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
    $('#supplier').change(function() {
        let id = $(this).val();
        let url = "{{ url('admin/get-supplier-product') }}/" + id;
        axios.get(url).then(function(response) {
            res = response.data.data;
            if (res) {
                var i = 1;
                if (res) {
                    let tr = '';
                    res.forEach((e) => {
                        tr += `<tr>
                    <td>
                      ${i++}
                    <input type="checkbox" class="checkbox d-none" name="item_details[${i}][ids]" value="${e._id}">
                  </td>
                    <td>${e.product.sku}</td>
                    <td>${e.product.title}</td>
                    <td>0</td>
                    <td>0</td>
                    <td><input type="number" class="input form-control form-control-sm" name="item_details[${i}][req_qty]"></td>
                    <td>${e.unit}</td>
                    <td><a href="javascript:void(0);" class="btn btn-sm btn-success add-btn"><span class="mdi mdi-check-all"></span></a></td>
                    </tr>`;
                    });
                    $('#table-body').html(tr);
                } else {
                    $('#table-body').html(`<tr>  <td colspan="8" class="text-center">Not Found Any Record!</td></tr>`);
                }
            } else {
                $('#sub_category_id').empty();
            }
        });
    });


    $(document).on('click', '.add-btn', function() {
        var tr = $(this).closest('tr');
        $(tr).addClass('disable-row');
        $(tr.find('td').find('.checkbox').prop('checked', true));
        $(tr.find('td').find('.input')).addClass('a-disabled');
        $(tr.find('td').find('a')).html('<span class="mdi mdi-close"></span>');
        $(tr.find('td').find('a')).removeClass('btn-success add-btn').addClass('btn-warning remove-btn');
    });

    $(document).on('click', '.remove-btn', function() {
        var tr = $(this).closest('tr');
        $(tr).removeClass('disable-row');
        $(tr.find('td').find('.input')).addClass('a-disabled');
        $(tr.find('td').find('.checkbox').prop('checked', false));
        $(tr.find('td').find('a')).html('<span class="mdi mdi-check-all"></span>');
        $(tr.find('td').find('a')).removeClass('btn-warning remove-btn').addClass('btn-success add-btn');
    })

    $('form#po').submit(function(e) {
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
    });
</script>
@endpush
@endsection