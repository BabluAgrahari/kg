<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\ShopkeeperValidation;
use App\Models\Shopkeeper;
use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{

    public function index()
    {
        $data['lists'] = Shopkeeper::get();
        return view('admin.shopkeeper.index',$data);
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

        if (!empty($request->file('files')))
            $save->attachments     = multipleFile($request->file('files'), 'shopkeeper');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Shopkeeper not Created']);

        return response(['status' => 'success', 'msg' => 'Shopkeeper Created Successfully!']);
    }


    public function update(Request $request, $id)
    {
        $save = Shopkeeper::find($id);
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

        if (!empty($request->file('files')))
            $save->attachments     = multipleFile($request->file('files'), 'shopkeeper');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Shopkeeper not Created']);

        return response(['status' => 'success', 'msg' => 'Shopkeeper Updated Successfully!']);
    }


    public function destroy($id)
    {
        $res = Shopkeeper::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Shopkeeper not Created']);

        return response(['status' => 'success', 'msg' => 'Shopkeeper Updated Successfully!']);
    }
}
