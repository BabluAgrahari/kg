@extends('admin.layouts.layouts')
@section('content')
<div class="content-wrapper pb-0">
    <div class="card shadow mb-4">
       
        <x-page-head title="Add Supplier " url="admin/supplier" type="create" />
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form id="supplier" method="POST" action="{{url('admin/supplier')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12">
                                <h6><span class="mdi mdi-account-check"></span>&nbsp;Persional Details</h6>
                                <hr>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Name&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm " name="name" placeholder="Enter Name">
                                <span id="name_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Email&nbsp;<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter Email">
                                <span id="email_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Mobile No&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="mobile" placeholder="Enter Mobile No">
                                <span id="mobile_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Password&nbsp;<span class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-sm" name="password" placeholder="Enter Password">
                                <span id="password_msg" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6><span class="mdi mdi-store "></span>&nbsp;Store Details</h6>
                                <hr>
                            </div>
                        </div>


                        <div class="form-group row">


                            <div class="form-group col-md-3">
                                <label for="">Store Name</label>
                                <input type="text" class="form-control form-control-sm" name="store_name" placeholder="Store name">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Business Email</label>
                                <input type="email" class="form-control form-control-sm" name="business_email" placeholder="Business email">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">GST No</label>
                                <input type="text" class="form-control form-control-sm" name="gst_no" placeholder="GST no.">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Mobile</label>
                                <input type="text" class="form-control form-control-sm" name="store_mobile" placeholder="Mobile">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Country</label>
                                <select class="form-select form-control form-control-sm" name="country">
                                    <option value="">-Select Here-</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">State</label>
                                <select class="form-select form-control form-control-sm" name="state">
                                    <option value="">-Select Here-</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="UP">UP</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">City</label>
                                <select class="form-select form-control form-control-sm" name="city">
                                    <option value="">-Select Here-</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Noida">Noida</option>
                                    <option value="Agra">Agra</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Pincode</label>
                                <input type="text" class="form-control form-control-sm" name="pincode" placeholder="pincode">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Store Address</label>
                                <textarea class="form-control form-control-sm" name="store_address" rows="4" cols="50" placeholder="Store Address"></textarea>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Status</label>
                                <select class="form-select form-control form-control-sm" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Verified Store</label>
                                <select class="form-select form-control form-control-sm" name="verified_store">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Logo</label>
                                <input type="file" name="flies[logo]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Store Cover Photo</label>
                                <input type="file" name="file[store_cover_photo]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">GST Certificate</label>
                                <input type="file" name="file[gst_certificate]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Udyam Aadhar (MSME Certificate)</label>
                                <input type="file" name="file[u_a_msme_certificate]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Shop & Establishment License</label>
                                <input type="file" name="file[shop_licence]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Trade Certificate/Licence</label>
                                <input type="file" name="file[trade_licence]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">FSSAI Registration</label>
                                <input type="file" name="file[fssai_registration]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Drug Licence</label>
                                <input type="file" name="file[drug_licence]" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Current Account Cheque</label>
                                <input type="file" name="file[current_account_cheque]" class="form-control form-control-sm" accept="image/*,.pdf">
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
    $('form#supplier').submit(function(e) {
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
                    $('form#supplier')[0].reset();
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
</script>
@endpush
@endsection