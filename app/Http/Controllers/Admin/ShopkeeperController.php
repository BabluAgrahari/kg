<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Str;

class ShopkeeperController extends Controller
{

    public function index()
    {
        $user_details = Shopkeeper::where('userType', 'shopkeeper')->get();
        return view('admin.shopkeeper.index', compact('user_details'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Request $request)
    {
        return view('admin.shopkeeper.create');
    }

    public function edit($id)
    {
        $data['res'] = Shopkeeper::find($id);

        return view('admin.shopkeeper.edit', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // if ($request->id != '') {
        //     $this->validate($request, [
        //         'userType'                  => 'required',
        //         'store_owner'               => 'required',
        //         'store_name'                => 'required',
        //         'business_email'            => 'required',
        //         'gst_no'                    => 'required',
        //         'phone'                     => 'required|digits:10',
        //         'mobile'                    => 'required|digits:10',
        //         'country'                   => 'required',
        //         'state'                     => 'required',
        //         'city'                      => 'required',
        //         'pincode'                   => 'required|digits:6',
        //         'store_address'             => 'required',
        //         'store_description'         => 'required|max:100',
        //         'logo'                      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        //     ]);
        // } else {
        //     $this->validate($request, [
        //         'userType'                  => 'required',
        //         'store_owner'               => 'required|unique:user_details,store_owner',
        //         'store_name'                => 'required',
        //         'business_email'            => 'required|unique:user_details,business_email',
        //         'gst_no'                    => 'required',
        //         'phone'                     => 'required|digits:10',
        //         'mobile'                    => 'required|digits:10',
        //         'country'                   => 'required',
        //         'state'                     => 'required',
        //         'city'                      => 'required',
        //         'pincode'                   => 'required|digits:6',
        //         'store_address'             => 'required',
        //         'store_description'         => 'required|max:100',
        //         'logo'                      => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        //     ]);
        // }

        $save = new Shopkeeper();
        $save->userType        = 'shopkeeper';
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->store_name      = $request->store_name;
        $save->store_mobile    = $request->store_mobile;
        $save->store_email     = $request->store_email;
        $save->gst_no          = $request->gst_no;
        $save->country         = $request->country;
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->store_address   = $request->store_address;
        $save->status          = (int)$request->status;
        $save->verified        = (int)$request->verified;

        if ($request->hasFile('logo')) {
            $file           = $request->file('logo');
            $timestamp      = Str::slug(substr('logo' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->logo = $name;
            }
        }
        if ($request->hasFile('store_cover_photo')) {
            $file           = $request->file('store_cover_photo');
            $timestamp      = Str::slug(substr('store_cover_photo' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->store_cover_photo = $name;
            }
        }
        if ($request->hasFile('gst_certificate')) {
            $file           = $request->file('gst_certificate');
            $timestamp      = Str::slug(substr('gst_certificate' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->gst_certificate = $name;
            }
        }
        if ($request->hasFile('u_a_msme_certificate')) {
            $file           = $request->file('u_a_msme_certificate');
            $timestamp      = Str::slug(substr('u_a_msme_certificate' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->u_a_msme_certificate = $name;
            }
        }
        if ($request->hasFile('shop_licence')) {
            $file           = $request->file('shop_licence');
            $timestamp      = Str::slug(substr('shop_licence' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->shop_licence = $name;
            }
        }
        if ($request->hasFile('trade_licence')) {
            $file           = $request->file('trade_licence');
            $timestamp      = Str::slug(substr('trade_licence' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->trade_licence = $name;
            }
        }
        if ($request->hasFile('fssai_registration')) {
            $file           = $request->file('fssai_registration');
            $timestamp      = Str::slug(substr('fssai_registration' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->fssai_registration = $name;
            }
        }
        if ($request->hasFile('drug_licence')) {
            $file           = $request->file('drug_licence');
            $timestamp      = Str::slug(substr('drug_licence' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->drug_licence = $name;
            }
        }
        if ($request->hasFile('current_account_cheque')) {
            $file           = $request->file('current_account_cheque');
            $timestamp      = Str::slug(substr('current_account_cheque' . $request->store_name, 0, 30));
            $filename       = time() . '.' . $file->getClientOriginalExtension();
            $name           = $timestamp . '-' . $filename;
            if ($file->move('uploads/', $name)) {
                $save->current_account_cheque = $name;
            }
        }
        $save->save();
        return redirect()->route('shopkeeper');
        // }
    }

    public function destroy($id)
    {
        $data = Shopkeeper::find($id);
        $data->delete();
        return redirect()->route('shopkeeper-details')->with('success', 'Data deleted successfully.');
    }
}
