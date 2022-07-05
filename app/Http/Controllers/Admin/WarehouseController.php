<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\Warehouse;
use Str;

class WarehouseController extends Controller
{
    public function  index(Request $request)
    {
        $data['lists'] = Warehouse::get();
        return view('admin.warehouse.index', $data);
    }

    public function create(Request $request)
    {
        return view('admin.warehouse.create');
    }

    public function edit(Request $request, $id)
    {
        $data['res'] = UserDetails::find($id);
        return view('admin.warehouse.edit', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->id != '') {
            $this->validate($request, [
                'userType'                  => 'required',
                'store_owner'               => 'required',
                'store_name'                => 'required',
                'business_email'            => 'required',
                'gst_no'                    => 'required',
                'phone'                     => 'required|digits:10',
                'mobile'                    => 'required|digits:10',
                'country'                   => 'required',
                'state'                     => 'required',
                'city'                      => 'required',
                'pincode'                   => 'required|digits:6',
                'store_address'             => 'required',
                'store_description'         => 'required|max:100',
                'logo'                      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);
        } else {
            $this->validate($request, [
                'userType'                  => 'required',
                'store_owner'               => 'required|unique:user_details,store_owner',
                'store_name'                => 'required',
                'business_email'            => 'required|unique:user_details,business_email',
                'gst_no'                    => 'required',
                'phone'                     => 'required|digits:10',
                'mobile'                    => 'required|digits:10',
                'country'                   => 'required',
                'state'                     => 'required',
                'city'                      => 'required',
                'pincode'                   => 'required|digits:6',
                'store_address'             => 'required',
                'store_description'         => 'required|max:100',
                'logo'                      => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);
        }

        if ($request->id != '') {

            $saveData                       = UserDetails::find($request->id);
            $saveData->userType             = $request->userType;
            $saveData->store_owner          = $request->store_owner;
            $saveData->store_name           = $request->store_name;
            $saveData->business_email       = $request->business_email;
            $saveData->gst_no               = $request->gst_no;
            $saveData->phone                = $request->phone;
            $saveData->mobile               = $request->mobile;
            $saveData->country              = $request->country;
            $saveData->state                = $request->state;
            $saveData->city                 = $request->city;
            $saveData->pincode              = $request->pincode;
            $saveData->store_address        = $request->store_address;
            $saveData->store_description    = $request->store_description;
            $saveData->status               = $request->status == 1 ? 1 : 0;
            $saveData->verified_store       = $request->verified_store == 1 ? 1 : 0;

            if ($request->hasFile('logo')) {
                $file           = $request->file('logo');
                $timestamp      = Str::slug(substr('logo' . $request->store_name, 0, 30));
                $filename       = time() . '.' . $file->getClientOriginalExtension();
                $name           = $timestamp . '-' . $filename;
                if ($file->move('uploads/', $name)) {
                    $saveData->logo = $name;
                }
            }
            if ($request->hasFile('store_cover_photo')) {
                $file           = $request->file('store_cover_photo');
                $timestamp      = Str::slug(substr('store_cover_photo' . $request->store_name, 0, 30));
                $filename       = time() . '.' . $file->getClientOriginalExtension();
                $name           = $timestamp . '-' . $filename;
                if ($file->move('uploads/', $name)) {
                    $saveData->store_cover_photo = $name;
                }
            }
            $saveData->save();
            return redirect()->route('warehouse-details')->with('success', 'Data updated successfully.');
        } else {

            $saveData                       = new UserDetails;
            $saveData->userType             = $request->userType;
            $saveData->store_owner          = $request->store_owner;
            $saveData->store_name           = $request->store_name;
            $saveData->business_email       = $request->business_email;
            $saveData->gst_no               = $request->gst_no;
            $saveData->phone                = $request->phone;
            $saveData->mobile               = $request->mobile;
            $saveData->country              = $request->country;
            $saveData->state                = $request->state;
            $saveData->city                 = $request->city;
            $saveData->pincode              = $request->pincode;
            $saveData->store_address        = $request->store_address;
            $saveData->store_description    = $request->store_description;
            $saveData->status               = $request->status == 1 ? 1 : 0;
            $saveData->verified_store       = $request->verified_store == 1 ? 1 : 0;

            if ($request->hasFile('logo')) {
                $file           = $request->file('logo');
                $timestamp      = Str::slug(substr('logo' . $request->store_name, 0, 30));
                $filename       = time() . '.' . $file->getClientOriginalExtension();
                $name           = $timestamp . '-' . $filename;
                if ($file->move('uploads/', $name)) {
                    $saveData->logo = $name;
                }
            }
            if ($request->hasFile('store_cover_photo')) {
                $file           = $request->file('store_cover_photo');
                $timestamp      = Str::slug(substr('store_cover_photo' . $request->store_name, 0, 30));
                $filename       = time() . '.' . $file->getClientOriginalExtension();
                $name           = $timestamp . '-' . $filename;
                if ($file->move('uploads/', $name)) {
                    $saveData->store_cover_photo = $name;
                }
            }
            $saveData->save();
            return redirect()->route('warehouse-details')->with('success', 'Data saved successfully.');
        }
    }

    public function warehouseDetailsDelete($id)
    {
        $data = UserDetails::find($id);
        $data->delete();
        return redirect()->route('warehouse-details')->with('success', 'Data deleted successfully.');
    }
}
