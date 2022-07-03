<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function city(Request $request)
    {
        $data = City::get();
        return view('admin.city',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cityAdd(Request $request)
    {
        return view('admin.shopkeeper.add');
    }

    public function cityEdit(Request $request,$id)
    {
        $data = City::where('_id',$id)->first();
        return view('admin.shopkeeper.edit',compact('data'));
    }

    public function citySave(Request $request)
    {
        // dd($request->all());
        if($request->id != '')
        {  
            $this->validate($request, [
                'userType'                  => 'required', 
            ]);
        } else {
            $this->validate($request, [
                'userType'                  => 'required',
            ]);
        }
        
        if($request->id != ''){

            $saveData                       = City::find($request->id);
            $saveData->city_name           = $request->city_name;
            $saveData->status               = $request->status;
            $saveData->save();
            return redirect()->route('city')->with('success','Data updated successfully.');
        } else {
            
            $saveData                       = new city;
            $saveData->city_name           = $request->city_name;
            $saveData->status               = 1;
            $saveData->save();
            return redirect()->route('city')->with('success','Data saved successfully.');
        }
    }

    public function cityStatus($id)
    {
        $data = City::find($id);
        $data->delete();
        return redirect()->route('city')->with('success','Data deleted successfully.');
    }
}
