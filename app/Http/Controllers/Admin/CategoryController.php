<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $data['lists'] = Category::get();
        return view('admin.category.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $record = Category::where('_id', $id)->first();
        return response(['status' => 'success', 'data' => $record]);
    }


    public function store(Request $request)
    {
        $save            = new Category;
        $save->name      = $request->name;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Category not Saved!']);

        return response(['status' => 'success', 'msg' => 'Category Saved Successfully!']);

        // }
    }

    public function update(Request $request, $id)
    {
        $save            = Category::find($id);
        $save->name      = $request->name;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Category not Updated!']);

        return response(['status' => 'success', 'msg' => 'Category Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = Category::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Category not Removed!']);

        return response(['status' => 'success', 'msg' => 'Category Removed Successfully!']);
    }
}
