<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\ProductValidation;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $data['lists']         = Product::get();
        $data['categories']    = Category::get();
        $data['subcategories'] = SubCategory::get();
        $data['units']         = Unit::get();
        $data['brands']        = Brand::get();

        return view('admin.products.index', $data);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $data['res'] = array(
            'title'           => $product->title,
            'sku'             => $product->sku,
            'category_id'     => $product->category_id,
            'sub_category_id' => $product->sub_category_id,
            'brand_id'        => $product->brand_id,
            'unit_id'         => $product->unit_id,
            'status'          => $product->status
        );
        return response(['status' => 'success', 'data' => $data]);
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
            return response(['status' => 'error', 'msg' => 'User not Created']);

        return response(['status' => 'success', 'msg' => 'User Created Successfully!']);
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
            return response(['status' => 'error', 'msg' => 'Product not Created']);

        return response(['status' => 'success', 'msg' => 'Product Updated Successfully!']);
    }


    public function destroy($id)
    {
        $res = Product::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'Product not Created']);

        return response(['status' => 'success', 'msg' => 'Product Updated Successfully!']);
    }

    public function getSubCategory($id)
    {
        $subCat = SubCategory::Select('sub_category')->where('category_id', $id)->get()->toArray();
        return response()->json($subCat);
    }
}
