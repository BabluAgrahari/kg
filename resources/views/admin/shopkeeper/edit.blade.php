@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Shopkeeper Details Edit</h6></div>
                <div class="col-md-6">
                    <a href="">
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
                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="userType" value="shopkeeper">
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Owner</label>
                                <input readonly type="email" class="form-control" id="email" name="store_owner" placeholder="Store owner" value="{{$data->store_owner}}">
                                @error('store_owner')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Name</label>
                                <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Store name" value="{{$data->store_name}}">
                                @error('store_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Business Email</label>
                                <input readonly type="email" class="form-control" id="business_email" name="business_email" placeholder="Business email" value="{{$data->business_email}}">
                                @error('business_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">GST No</label>
                                <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="GST no." value="{{$data->gst_no}}">
                                @error('gst_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$data->phone}}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{$data->mobile}}">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Country</label>
                                <select class="form-select form-control" name="country">
                                  <option value="">-Select Here-</option>
                                  <option value="India" @if($data->country == 'India') selected @endif>India</option>
                                  <option value="USA" @if($data->country == 'USA') selected @endif>USA</option>
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">State</label>
                                <select class="form-select form-control" name="state">
                                  <option value="">-Select Here-</option>
                                  <option value="Delhi" @if($data->state == 'Delhi') selected @endif>Delhi</option>
                                  <option value="Goa" @if($data->state == 'Goa') selected @endif>Goa</option>
                                  <option value="UP" @if($data->state == 'UP') selected @endif>UP</option>
                                </select>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">City</label>
                                <select class="form-select form-control" name="city">
                                  <option value="">-Select Here-</option>
                                  <option value="Delhi" @if($data->city == 'Delhi') selected @endif>Delhi</option>
                                  <option value="Noida" @if($data->city == 'Noida') selected @endif>Noida</option>
                                  <option value="Agra" @if($data->city == 'Agra') selected @endif>Agra</option>
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Pincode</label>
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="pincode" value="{{$data->pincode}}">
                                @error('pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Address</label>
                                <textarea class="form-control" id="store_address" name="store_address" rows="4" cols="50" placeholder="Store Address">{{$data->store_address}}</textarea>
                                @error('store_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Description</label>
                                <textarea class="form-control" id="store_description" name="store_description" rows="4" cols="50" placeholder="Store Address">{{$data->store_description}}</textarea>
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
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->logo)}}" alt="logo"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Store Cover Photo</label>
                                <input type="file" name="store_cover_photo" class="form-control" accept="image/*,.pdf">
                                @error('store_cover_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->store_cover_photo)}}" alt="logo"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">GST Certificate</label>
                                <input type="file" name="gst_certificate" class="form-control" accept="image/*,.pdf">
                                @error('gst_certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->gst_certificate)}}" alt="gst_certificate"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Udyam Aadhar (MSME Certificate)</label>
                                <input type="file" name="u_a_msme_certificate" class="form-control" accept="image/*,.pdf">
                                @error('u_a_msme_certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->u_a_msme_certificate)}}" alt="u_a_msme_certificate"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Shop & Establishment License</label>
                                <input type="file" name="shop_licence" class="form-control" accept="image/*,.pdf">
                                @error('shop_licence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->shop_licence)}}" alt="shop_licence"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Trade Certificate/Licence</label>
                                <input type="file" name="trade_licence" class="form-control" accept="image/*,.pdf">
                                @error('trade_licence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->trade_licence)}}" alt="trade_licence"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">FSSAI Registration</label>
                                <input type="file" name="fssai_registration" class="form-control" accept="image/*,.pdf">
                                @error('fssai_registration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->fssai_registration)}}" alt="fssai_registration"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Drug Licence</label>
                                <input type="file" name="drug_licence" class="form-control" accept="image/*,.pdf">
                                @error('drug_licence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->drug_licence)}}" alt="drug_licence"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="">Current Account Cheque</label>
                                <input type="file" name="current_account_cheque" class="form-control" accept="image/*,.pdf">
                                @error('current_account_cheque')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <span><img height="50" width="50" src="{{url('/uploads',$data->current_account_cheque)}}" alt="current_account_cheque"></span>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="">Status</label>
                                <select class="form-select form-control" name="status">
                                  <option value="1" @if($data->status == '1') selected @endif>Active</option>
                                  <option value="0" @if($data->status == '0') selected @endif>Deactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="">Verified Store</label>
                                <select class="form-select form-control" name="verified_store">
                                  <option value="1" @if($data->verified_store == '1') selected @endif>Active</option>
                                  <option value="0" @if($data->verified_store == '0') selected @endif>Deactive</option>
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