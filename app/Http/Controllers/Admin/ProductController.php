<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\ProductValidation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{

    public function index()
    {
        $data['lists'] = Product::get();

        return view('admin.products.index',$data);
    }

    public function create(Request $request)
    {
        return view('admin.products.create');
    }

    public function edit($id)
    {
        $data['res'] = Product::find($id);

        return view('admin.products.edit', $data);
    }

    public function store(ProductValidation $request)
    {
        $save = new Product();
        $save->parent_id       = Auth::user()->id;
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->password        = Hash::make($request->password);
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->address         = $request->address;
        $save->status          = (int)$request->status;

        if (!empty($request->file('profile_image')))
        $save->profile_image  = singleFile($request->file('profile_image'), 'products');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'User not Created']);

        return response(['status' => 'success', 'msg' => 'User Created Successfully!']);
    }


    public function update(ProductValidation $request, $id)
    {
        $save = Product::find($id);
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->address         = $request->address;
        $save->status          = (int)$request->status;

        if (!empty($request->hasFile('profile_img')))
        $save->profile_img   = singleFile($request->file('profile_img'), 'products');

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
}
