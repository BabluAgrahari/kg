@extends('admin.layouts.layouts')
@section('content')
<div class="content-wrapper pb-0">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Supplier Details Add</h6></div>
                <div class="col-md-6">
                    <a href="{{url('supplier')}}">
                        <button style="float: right;" class="btn btn-sm btn-primary">
                            Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form class="user" method="POST" action="{{url('supplier')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Owner</label>
                                <input type="email" class="form-control" id="email" name="store_owner" placeholder="Store owner">
                                @error('store_owner')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Name</label>
                                <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Store name">
                                @error('store_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Business Email</label>
                                <input type="email" class="form-control" id="business_email" name="business_email" placeholder="Business email">
                                @error('business_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">GST No</label>
                                <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="GST no.">
                                @error('gst_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Country</label>
                                <select class="form-select form-control" name="country">
                                  <option value="">-Select Here-</option>
                                  <option value="India">India</option>
                                  <option value="USA">USA</option>
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">State</label>
                                <select class="form-select form-control" name="state">
                                  <option value="">-Select Here-</option>
                                  <option value="Delhi">Delhi</option>
                                  <option value="Goa">Goa</option>
                                  <option value="UP">UP</option>
                                </select>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">City</label>
                                <select class="form-select form-control" name="city">
                                  <option value="">-Select Here-</option>
                                  <option value="Delhi">Delhi</option>
                                  <option value="Noida">Noida</option>
                                  <option value="Agra">Agra</option>
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Pincode</label>
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="pincode">
                                @error('pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Address</label>
                                <textarea class="form-control" id="store_address" name="store_address" rows="4" cols="50" placeholder="Store Address"></textarea>
                                @error('store_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Description</label>
                                <textarea class="form-control" id="store_description" name="store_description" rows="4" cols="50" placeholder="Store Address"></textarea>
                                @error('store_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Logo</label>
                                <input type="file" name="logo" class="form-control" accept="image/*,.pdf">
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Cover Photo</label>
                                <input type="file" name="store_cover_photo" class="form-control" accept="image/*,.pdf">
                                @error('store_cover_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">GST Certificate</label>
                                <input type="file" name="gst_certificate" class="form-control" accept="image/*,.pdf">
                                @error('gst_certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Udyam Aadhar (MSME Certificate)</label>
                                <input type="file" name="u_a_msme_certificate" class="form-control" accept="image/*,.pdf">
                                @error('u_a_msme_certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Shop & Establishment License</label>
                                <input type="file" name="shop_licence" class="form-control" accept="image/*,.pdf">
                                @error('shop_licence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Trade Certificate/Licence</label>
                                <input type="file" name="trade_licence" class="form-control" accept="image/*,.pdf">
                                @error('trade_licence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">FSSAI Registration</label>
                                <input type="file" name="fssai_registration" class="form-control" accept="image/*,.pdf">
                                @error('fssai_registration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Drug Licence</label>
                                <input type="file" name="drug_licence" class="form-control" accept="image/*,.pdf">
                                @error('drug_licence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Current Account Cheque</label>
                                <input type="file" name="current_account_cheque" class="form-control" accept="image/*,.pdf">
                                @error('current_account_cheque')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="">Status</label>
                                <select class="form-select form-control" name="status">
                                  <option value="1">Active</option>
                                  <option value="0">Deactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="">Verified Store</label>
                                <select class="form-select form-control" name="verified_store">
                                  <option value="1">Active</option>
                                  <option value="0">Deactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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