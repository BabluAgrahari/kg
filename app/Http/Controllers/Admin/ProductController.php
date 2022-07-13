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
use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $data['lists'] = Product::with(['Category', 'SubCategory', 'Brand', 'Unit'])->get();

        $data['suppliers'] = Supplier::where('status', 1)->get();
        $data['products'] = Product::where('status', 1)->get();


        return view('admin.products.index', $data);
    }


    public function create(Request $request)
    {
        $data['categories']    = Category::get();
        $data['units']         = Unit::get();
        $data['brands']        = Brand::get();
        return view('admin.products.create', $data);
    }


    public function edit($id)
    {
        $data['res']  = Product::find($id);

        $data['categories']    = Category::get();
        $data['units']         = Unit::get();
        $data['brands']        = Brand::get();
        return view('admin.products.edit', $data);
    }

    public function store(ProductValidation $request)
    {
        $save = new Product();
        $save->user_id         = Auth::user()->id;
        $save->title           = $request->title;
        $save->sku             = $request->sku;
        $save->category_id     = $request->category_id;
        $save->sub_category_id = $request->sub_category_id;
        $save->brand_id        = $request->brand_id;
        $save->unit_id         = $request->unit_id;
        $save->status          = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Product not Created']);

        return response(['status' => 'success', 'msg' => 'Product Created Successfully!']);
    }


    public function update(ProductValidation $request, $id)
    {
        $save = Product::find($id);
        $save->title           = $request->title;
        $save->sku             = $request->sku;
        $save->category_id     = $request->category_id;
        $save->sub_category_id = $request->sub_category_id;
        $save->brand_id        = $request->brand_id;
        $save->unit_id         = $request->unit_id;
        $save->status          = (int)$request->status;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Product not Updated']);

        return response(['status' => 'success', 'msg' => 'Product Updated Successfully!']);
    }


    public function destroy($id)
    {
        $res = Product::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Product not Removed']);

        return response(['status' => 'success', 'msg' => 'Product Removed Successfully!']);
    }

    public function getSubCategory($id)
    {
        $subCat = SubCategory::Select('sub_category')->where('category_id', $id)->get()->toArray();
        return response()->json($subCat);
    }

    public function assignProduct(Request $request)
    {
        try {
            $data = new SupplierProduct();
            $data->supplier_id = $request->supplier_id;
            $data->product_id  = $request->products;

            if (!$data->save())
                return response(['status' => 'error', 'msg' => 'Supplier not Assigned!']);

            return response(['status' => 'success', 'msg' => 'Supplier Assigned successfully!']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
