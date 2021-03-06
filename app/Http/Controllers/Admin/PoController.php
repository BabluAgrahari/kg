<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\ProductValidation;
use App\Models\Po;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class PoController extends Controller
{
    public function index()
    {
        $data['lists'] = Po::with(['Supplier'])->get();

        return view('admin.po.index', $data);
    }

    public function create()
    {
        $data['warehouse'] = Warehouse::where('status', 1)->get();
        return view('admin.po.create', $data);
    }

    public function store(Request $request)
    {
        $po = new Po();
        $po->po_no = $request->po_no;
        $po->warehouse_id = $request->warehosue_id;
        $po->supplier_id = $request->supplier_id;
        $po->estimated_del_date = $request->estimated_del_date;
        $po->item_details = $request->item_details;
        if (!$po->save())
            return response(['status' => 'error', 'msg' => 'PO not Created!']);

        return response(['status' => 'success', 'msg' => 'PO Created Successfully!']);
    }
}
