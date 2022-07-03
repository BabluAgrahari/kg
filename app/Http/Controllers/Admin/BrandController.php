<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brand(Request $request)
    {
        $data = Brand::get();
        return view('admin.brand',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function brandAdd(Request $request)
    {
        return view('admin.shopkeeper.add');
    }

    public function brandEdit(Request $request,$id)
    {
        $data = Brand::where('_id',$id)->first();
        return view('admin.shopkeeper.edit',compact('data'));
    }

    public function brandSave(Request $request)
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

            $saveData                       = Brand::find($request->id);
            $saveData->brand_name           = $request->brand_name;
            $saveData->status               = $request->status;
            $saveData->save();
            return redirect()->route('brand')->with('success','Data updated successfully.');
        } else {
            
            $saveData                       = new brand;
            $saveData->brand_name           = $request->brand_name;
            $saveData->status               = 1;
            $saveData->save();
            return redirect()->route('brand')->with('success','Data saved successfully.');
        }
    }

    public function brandStatus($id)
    {
        $data = Brand::find($id);
        $data->delete();
        return redirect()->route('brand')->with('success','Data deleted successfully.');
    }
}
