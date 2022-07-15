<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierProduct;
use App\Models\Supplier;

class SupplierProductController extends Controller
{

    public function index(Request $request)
    {
        $supplier_id = '';

        if (!empty($request->get('supplier_id'))) {
            $supplier_id = $request->get('supplier_id');
            $data['productLists'] = SupplierProduct::where('supplier_id', $supplier_id)->with(['Product', 'Supplier'])->get();
        } else {
            $data['productLists'] = [];
        }

        //  $data['productLists'] = SupplierProduct::filter($request)->with(['Product', 'Supplier'])->get();
        $data['suppliers'] = Supplier::get();

        return view('admin.supplierProduct.index', $data);
    }


    public function edit(Request $request, $id)
    {
        $record = SupplierProduct::where('_id', $id)->first();
        return response(['status' => 'success', 'data' => $record]);
    }


    public function update(Request $request, $id)
    {
        $save             = SupplierProduct::find($id);
        $save->price      = $request->price;
        $save->start_date = $request->start_date;
        $save->end_date   = $request->end_date;
        $save->status     = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Product not Updated!']);

        return response(['status' => 'success', 'msg' => 'Product Updated Successfully!']);
    }

    public function destrory($id)
    {
        $res = SupplierProduct::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Product not Removed!']);

        return response(['status' => 'success', 'msg' => 'Product Removed Successfully!']);
    }
}
