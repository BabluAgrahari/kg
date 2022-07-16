<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index(Request $request)
    {
        $data['lists'] = Brand::get();
        return view('admin.brand.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $record = Brand::where('_id', $id)->first();
        return response(['status' => 'success', 'data' => $record]);
    }
    public function store(Request $request)
    {

        $save            = new Brand;
        $save->brand      = $request->brand;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Brand not Saved!']);

        return response(['status' => 'success', 'msg' => 'Brand Saved Successfully!']);
    }

    public function update(Request $request, $id)
    {
        $save            = Brand::find($id);
        $save->brand      = $request->brand;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Brand not Updated!']);

        return response(['status' => 'success', 'msg' => 'Brand Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = Brand::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Brand not Removed!']);

        return response(['status' => 'success', 'msg' => 'Brand Removed Successfully!']);
    }
}
