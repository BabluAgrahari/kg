<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\Warehouse;
use App\Models\User;
use Str;

class WarehouseController extends Controller
{
    public function index()
    {
        $data['lists'] = Warehouse ::paginate(5);
        return view('admin.warehouse.index',$data);
    }

    public function create(Request $request)
    {
        $data['users'] = User::where('status', 1)->get();
        return view('admin.warehouse.create',$data);
    }

    public function edit($id)
    {
        $data['res'] = Warehouse::find($id);
        $data['users'] = User::where('status', 1)->get();
        return view('admin.warehouse.edit', $data);
    }

    public function store(Request $request)
    {
        $save = new Warehouse();
        $save->users           = $request->users;
        $save->store_name      = $request->store_name;
        $save->store_mobile    = $request->store_mobile;
        $save->store_email     = $request->store_email;
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
        $save->users           = $request->users;
        $save->store_name      = $request->store_name;
        $save->store_mobile    = $request->store_mobile;
        $save->store_email     = $request->store_email;
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