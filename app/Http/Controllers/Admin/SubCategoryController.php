<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function subCategory(Request $request)
    {
        $data = SubCategory::get();
        return view('admin.sub-category',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function subCategoryAdd(Request $request)
    {
        return view('admin.shopkeeper.add');
    }

    public function subCategoryEdit(Request $request,$id)
    {
        $data = SubCategory::where('_id',$id)->first();
        return view('admin.shopkeeper.edit',compact('data'));
    }

    public function subCategorySave(Request $request)
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

            $saveData                       = SubCategory::find($request->id);
            $saveData->subCategory_name           = $request->subCategory_name;
            $saveData->status               = $request->status;
            $saveData->save();
            return redirect()->route('subCategory')->with('success','Data updated successfully.');
        } else {
            
            $saveData                       = new subCategory;
            $saveData->subCategory_name           = $request->subCategory_name;
            $saveData->status               = 1;
            $saveData->save();
            return redirect()->route('subCategory')->with('success','Data saved successfully.');
        }
    }

    public function subCategoryStatus($id)
    {
        $data = SubCategory::find($id);
        $data->delete();
        return redirect()->route('subCategory')->with('success','Data deleted successfully.');
    }
}
