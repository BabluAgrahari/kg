<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
 
    public function index(Request $request)
    {
        $data['lists'] = SubCategory::get();
        return view('admin.sub_category.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $data = SubCategory::where('_id', $id)->first();
        return view('admin.sub_category.edit', compact('data'));
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

        $save            = new SubCategory;
        $save->sub_category      = $request->sub_category;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'SubCategory not Saved!']);

        return response(['status' => 'success', 'msg' => 'SubCategory Saved Successfully!']);

        // }
    }

    public function update(Request $request, $id)
    {
        $save            = SubCategory::find($id);
        $save->sub_category      = $request->sub_category;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'SubCategory not Updated!']);

        return response(['status' => 'success', 'msg' => 'SubCategory Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = SubCategory::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'SubCategory not Removed!']);

        return response(['status' => 'success', 'msg' => 'SubCategory Removed Successfully!']);
    }
}
