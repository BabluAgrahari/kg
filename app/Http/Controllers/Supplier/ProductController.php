<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->supplier_id))
            $data['lists'] = SupplierProduct::with(['Product', 'Supplier'])->where('supplier_id', $request->supplier_id)->get();

        $data['suppliers'] = Supplier::where('users','all',[Auth::user()->_id])->get();

        return view('supplier.product.index',$data);
    }

    public function login2()
    {
        return view('login');
    }
}
