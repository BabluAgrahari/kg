<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $data = Category::get();
        return view('admin.category',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function categoryAdd(Request $request)
    {
        return view('admin.shopkeeper.add');
    }

    public function categoryEdit(Request $request,$id)
    {
        $data = Category::where('_id',$id)->first();
        return view('admin.shopkeeper.edit',compact('data'));
    }

    public function categorySave(Request $request)
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

            $saveData                       = Category::find($request->id);
            $saveData->category_name           = $request->category_name;
            $saveData->status               = $request->status;
            $saveData->save();
            return redirect()->route('category')->with('success','Data updated successfully.');
        } else {
            
            $saveData                       = new category;
            $saveData->category_name           = $request->category_name;
            $saveData->status               = 1;
            $saveData->save();
            return redirect()->route('category')->with('success','Data saved successfully.');
        }
    }

    public function categoryStatus($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('category')->with('success','Data deleted successfully.');
    }
}
