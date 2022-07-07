<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
 
    public function index(Request $request)
    {
        $data['lists'] = Unit::get();
        return view('admin.unit.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $data = Unit::where('_id', $id)->first();
        return view('admin.unit.edit', compact('data'));
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

        $save            = new Unit;
        $save->unit      = $request->unit;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Unit not Saved!']);

        return response(['status' => 'success', 'msg' => 'Unit Saved Successfully!']);

        // }
    }

    public function update(Request $request, $id)
    {
        $save            = Unit::find($id);
        $save->unit      = $request->unit;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Unit not Updated!']);

        return response(['status' => 'success', 'msg' => 'Unit Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = Unit::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Unit not Removed!']);

        return response(['status' => 'success', 'msg' => 'Unit Removed Successfully!']);
    }
}
