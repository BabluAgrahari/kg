<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
 
    public function index(Request $request)
    {
        $data['lists'] = SubCategory::get();
        $data['categories'] = Category::get();
        return view('admin.sub_category.index', $data);

    }


    public function edit(Request $request, $id)
    {
        $record = SubCategory::where('_id', $id)->first();
        return response(['status' => 'success', 'data' => $record]);
    }


    public function store(Request $request)
    {

        $save            = new SubCategory;
        $save->category_id      = $request->category;
        $save->sub_category      = $request->sub_category;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'SubCategory not Saved!']);

        return response(['status' => 'success', 'msg' => 'SubCategory Saved Successfully!']);

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
