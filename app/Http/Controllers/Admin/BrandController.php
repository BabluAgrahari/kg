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
        $data = Brand::where('_id', $id)->first();
        return view('admin.brand.edit', compact('data'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // if ($request->id != '') {
        //     $this->validate($request, [
        //         'userType'                  => 'required',
        //     ]);
        // } else {
        //     $this->validate($request, [
        //         'userType'                  => 'required',
        //     ]);
        // }

        // if ($request->id != '') {

        //     $saveData                       = City::find($request->id);
        //     $saveData->city_name           = $request->city_name;
        //     $saveData->status               = $request->status;
        //     $saveData->save();
        //     return redirect()->route('city')->with('success', 'Data updated successfully.');
        // } else {

        $save            = new Brand;
        $save->brand      = $request->brand;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Brand not Saved!']);

        return response(['status' => 'success', 'msg' => 'Brand Saved Successfully!']);

        // }
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
