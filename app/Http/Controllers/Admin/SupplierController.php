<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Str;

class SupplierController extends Controller
{
    public function index()
    {
        $data['lists'] = Supplier ::paginate(5);
        return view('admin.supplier.index',$data);
    }

    public function create(Request $request)
    {
        $data['users'] = User::where('status', 1)->get();
        return view('admin.supplier.create',$data);
    }

    public function edit($id)
    {
        $data['res'] = Supplier::find($id);
        $data['users'] = User::where('status', 1)->get();
        return view('admin.supplier.edit', $data);
    }

    public function store(Request $request)
    {
        $save = new Supplier();
        $save->users           = $request->users;
        $save->store_name      = $request->store_name;
        $save->store_email  = $request->store_email;
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
        $save->users           = $request->users;
        $save->store_name      = $request->store_name;
        $save->store_email  = $request->store_email;
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