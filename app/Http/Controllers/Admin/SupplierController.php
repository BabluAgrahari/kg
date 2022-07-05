<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Str;

class SupplierController extends Controller
{
    public function index()
    {
        $data['lists'] = Supplier ::get();
        return view('admin.supplier.index',$data);
    }

    public function create(Request $request)
    {
        return view('admin.supplier.create');
    }

    public function edit($id)
    {
        $data['res'] = Supplier::find($id);

        return view('admin.supplier.edit', $data);
    }

    public function store(Request $request)
    {
        $save = new Supplier();
        $save->userType        = 'supplier';
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
            $save->attachments     = multipleFile($request->file('files'), 'supplier');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'supplier not Created']);

        return response(['status' => 'success', 'msg' => 'supplier Created Successfully!']);
    }


    public function update(Request $request, $id)
    {
        $save = Supplier::find($id);
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
            $save->attachments     = multipleFile($request->file('files'), 'supplier');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'supplier not Created']);

        return response(['status' => 'success', 'msg' => 'supplier Updated Successfully!']);
    }


    public function destroy($id)
    {
        $res = Supplier::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Supplier not Created']);

        return response(['status' => 'success', 'msg' => 'Supplier Updated Successfully!']);
    }
}