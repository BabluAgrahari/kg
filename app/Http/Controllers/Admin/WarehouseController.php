<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\Warehouse;
use App\Models\User;
use Str;

class WarehouseController extends Controller
{
    public function index()
    {
        $data['lists'] = Warehouse::desc()->paginate(5);
        return view('admin.warehouse.index', $data);
    }

    public function create(Request $request)
    {
        $data['users'] = User::where('status', 1)->get();
        $data['suppliers'] = Supplier::where('status', 1)->get();
        return view('admin.warehouse.create', $data);
    }

    public function edit($id)
    {
        $data['res'] = Warehouse::find($id);
        $data['users'] = User::where('status', 1)->get();
        $data['suppliers'] = Supplier::where('status', 1)->get();
        return view('admin.warehouse.edit', $data);
    }

    public function store(Request $request)
    {
        $save = new Warehouse();
        $save->users           = $request->users;
        $save->suppliers       = $request->suppliers;
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

        self::updateWarehouseIds($save->suppliers, $save->_id); //for update warehouse id in seller collection

        return response(['status' => 'success', 'msg' => 'warehouse Created Successfully!']);
    }


    public function update(Request $request, $id)
    {
        $save = Warehouse::find($id);
        $save->users           = $request->users;
        $save->suppliers       = $request->suppliers;
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

        self::updateWarehouseIds($save->suppliers, $save->_id); //for update warehouse id in seller collection

        return response(['status' => 'success', 'msg' => 'warehouse Updated Successfully!']);
    }


    private function updateWarehouseIds($suppliers = array(), $w_id = false)
    {
        if (empty($suppliers) || !$w_id)
            return false;

        foreach ($suppliers as $s_id) {
            $warehouses = [];

            $supplier = Supplier::find($s_id);
            if (!empty($supplier->warehouses))
                $warehouses = $supplier->warehouses;

            $warehouses[] = $w_id;
            $supplier->warehouses = $warehouses;
            $supplier->save();
        }
    }

    public function destroy($id)
    {
        $res = Warehouse::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'warehouse not Created']);

        return response(['status' => 'success', 'msg' => 'Supplier Updated Successfully!']);
    }
}
