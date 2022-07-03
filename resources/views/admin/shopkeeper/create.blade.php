@extends('admin.layouts.layouts')
@section('content')
<div class="content-wrapper pb-0">
    <div class="card shadow mb-4">

        <x-page-head title="Shopkeeper List" url="admin/shopkeeper" type="create" />

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <!-- <input type="hidden" name="userType" value="shopkeeper"> -->
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6><span class="mdi mdi-account-check"></span>&nbsp;Persional Details</h6>
                                <hr>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Name&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Name">
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


                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label>Store Name</label>
                                <input type="text" class="form-control form-control-sm" name="store_name" placeholder="Enter Store name">
                                <span id="store_name_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Store Email</label>
                                <input type="email" class="form-control form-control-sm" name="store_email" placeholder="Enter Store email">
                                <span id="store_email_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Mobile</label>
                                <input type="text" class="form-control form-control-sm" name="store_mobile" placeholder="Enter Store Mobile">
                                <span id="store_mobile_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>GST No</label>
                                <input type="text" class="form-control form-control-sm" name="gst_no" placeholder="Enter GST No.">
                                <span id="gst_no_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Country</label>
                                <select class="form-select form-control form-control-sm" name="country">
                                    <option value="">-Select Here-</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                </select>
                                <span id="country_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>State</label>
                                <select class="form-select form-control form-control-sm" name="state">
                                    <option value="">-Select Here-</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="UP">UP</option>
                                </select>
                                <span id="state_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>City</label>
                                <input type="text" name="city" class="form-control form-control-sm" placeholder="Enter City">
                                <span id="city_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Pincode</label>
                                <input type="text" class="form-control form-control-sm" name="pincode" placeholder="Enter Pincode">
                                <span id="pincode_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Store Address</label>
                                <textarea class="form-control form-control-sm" name="store_address" rows="4" cols="50" placeholder="Store Address"></textarea>
                                <span id="store_address_msg" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Verified Store</label>
                                <select class="form-select form-control form-control-sm" name="verified">
                                    <option value="1">Verified</option>
                                    <option value="0">Non Verified</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Status</label>
                                <select class="form-select form-control form-control-sm" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control form-control-sm" accept="image/*,.pdf">

                            </div>
                            <div class="form-group">
                                <label>Store Cover Photo</label>
                                <input type="file" name="store_cover_photo" class="form-control form-control-sm" accept="image/*,.pdf">

                            </div>
                            <div class="form-group">
                                <label>GST Certificate</label>
                                <input type="file" name="gst_certificate" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>
                            <div class="form-group">
                                <label>Udyam Aadhar (MSME Certificate)</label>
                                <input type="file" name="u_a_msme_certificate" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>
                            <div class="form-group">
                                <label>Shop & Establishment License</label>
                                <input type="file" name="shop_licence" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>
                            <div class="form-group">
                                <label>Trade Certificate/Licence</label>
                                <input type="file" name="trade_licence" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>
                            <div class="form-group">
                                <label>FSSAI Registration</label>
                                <input type="file" name="fssai_registration" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>
                            <div class="form-group">
                                <label>Drug Licence</label>
                                <input type="file" name="drug_licence" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>
                            <div class="form-group">
                                <label>Current Account Cheque</label>
                                <input type="file" name="current_account_cheque" class="form-control form-control-sm" accept="image/*,.pdf">
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-2" style="float: right;">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection