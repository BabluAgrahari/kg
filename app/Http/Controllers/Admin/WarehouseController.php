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
    public function index()
    {
        $data['lists'] = Warehouse ::get();
        return view('admin.warehouse.index',$data);
    }

    public function create(Request $request)
    {
        return view('admin.warehouse.create');
    }

    public function edit($id)
    {
        $data['res'] = Warehouse::find($id);

        return view('admin.warehouse.edit', $data);
    }

    public function store(Request $request)
    {
        $save = new Warehouse();
        $save->userType        = 'warehouse';
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->password          = $request->password;
        $save->store_name      = $request->store_name;
        $save->business_email  = $request->business_email;
        $save->gst_no          = $request->gst_no;
        $save->store_mobile    = $request->store_mobile;
        $save->country         = $request->country;
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->store_address   = $request->store_address;
        $save->status          = (int)$request->status;
        $save->verified        = (int)$request->verified;

        if (!empty($request->file('files')))
            $save->attachments     = multipleFile($request->file('files'), 'warehouse');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'warehouse not Created']);

        return response(['status' => 'success', 'msg' => 'warehouse Created Successfully!']);
    }


    public function update(Request $request, $id)
    {
        $save = Warehouse::find($id);
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->password        = $request->password;
        $save->store_name      = $request->store_name;
        $save->business_email  = $request->business_email;
        $save->gst_no          = $request->gst_no;
        $save->store_mobile    = $request->store_mobile;
        $save->country         = $request->country;
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->store_address   = $request->store_address;
        $save->status          = (int)$request->status;
        $save->verified        = (int)$request->verified;

        if (!empty($request->file('files')))
            $save->attachments     = multipleFile($request->file('files'), 'warehouse');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'warehouse not Created']);

        return response(['status' => 'success', 'msg' => 'warehouse Updated Successfully!']);
    }


    public function destroy($id)
    {
        $res = Warehouse::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'warehouse not Created']);

        return response(['status' => 'success', 'msg' => 'Supplier Updated Successfully!']);
    }
}