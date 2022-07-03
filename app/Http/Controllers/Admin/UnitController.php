<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function unit(Request $request)
    {
        $data = Unit::get();
        return view('admin.unit',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function unitAdd(Request $request)
    {
        return view('admin.shopkeeper.add');
    }

    public function unitEdit(Request $request,$id)
    {
        $data = Unit::where('_id',$id)->first();
        return view('admin.shopkeeper.edit',compact('data'));
    }

    public function unitSave(Request $request)
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

            $saveData                       = Unit::find($request->id);
            $saveData->unit_name           = $request->unit_name;
            $saveData->status               = $request->status;
            $saveData->save();
            return redirect()->route('unit')->with('success','Data updated successfully.');
        } else {
            
            $saveData                       = new unit;
            $saveData->unit_name           = $request->unit_name;
            $saveData->status               = 1;
            $saveData->save();
            return redirect()->route('unit')->with('success','Data saved successfully.');
        }
    }

    public function unitStatus($id)
    {
        $data = Unit::find($id);
        $data->delete();
        return redirect()->route('unit')->with('success','Data deleted successfully.');
    }
}
