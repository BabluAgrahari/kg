<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function index(Request $request)
    {
        $data['lists'] = City::get();
        return view('admin.city.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $data = City::where('_id', $id)->first();
        return view('admin.shopkeeper.edit', compact('data'));
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

        $save            = new city;
        $save->city      = $request->city;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'City not Saved!']);

        return response(['status' => 'success', 'msg' => 'City Saved Successfully!']);

        // }
    }

    public function update(Request $request, $id)
    {
        $save            = City::find($id);
        $save->city      = $request->city;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'City not Updated!']);

        return response(['status' => 'success', 'msg' => 'City Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = City::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'City not Removed!']);

        return response(['status' => 'success', 'msg' => 'City Removed Successfully!']);
    }
}
