<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\ProductValidation;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PoController extends Controller
{

    public function index()
    {
        $data['lists'] = Product::with(['Category','SubCategory','Brand','Unit'])->get();

        return view('admin.po.index', $data);
    }


}