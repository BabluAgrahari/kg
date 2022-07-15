<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierProduct;

class SupplierProductController extends Controller
{

    public function index(Request $request)
    {
        $data['productLists'] = SupplierProduct::with(['Product', 'Supplier'])->get();

        return view('admin.supplierProduct.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $record = SupplierProduct::where('_id', $id)->first();
        return response(['status' => 'success', 'data' => $record]);
    }


    public function update(Request $request, $id)
    {
        $save            = SupplierProduct::find($id);
        $save->name      = $request->name;
        $save->category_id = $request->category;
        $save->status    = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'SubCategory not Updated!']);

        return response(['status' => 'success', 'msg' => 'SubCategory Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = SupplierProduct::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'SubCategory not Removed!']);

        return response(['status' => 'success', 'msg' => 'SubCategory Removed Successfully!']);
    }
}

