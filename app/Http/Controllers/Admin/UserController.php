<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\UserValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index( Request $request)
    {
        $perPage = (!empty($request->perPage)) ? $request->perPage : config('global.perPage');
        $data['lists'] = User::where('parent_id', Auth::user()->id)->paginate($perPage);

        return view('admin.users.index', $data);
    }

    public function create(Request $request)
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {
        $data['res'] = User::find($id);

        return view('admin.users.edit', $data);
    }

    public function store(UserValidation $request)
    {
        $save = new User();
        $save->parent_id       = Auth::user()->id;
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->role            = $request->role;
        $save->password        = Hash::make($request->password);
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->address         = $request->address;
        $save->status          = (int)$request->status;

        if (!empty($request->file('profile_image')))
            $save->profile_image  = singleFile($request->file('profile_image'), 'users');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'User not Created']);

        return response(['status' => 'success', 'msg' => 'User Created Successfully!']);
    }


    public function update(UserValidation $request, $id)
    {
        $save = User::find($id);
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->role            = $request->role;
        $save->mobile          = $request->mobile;
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->address         = $request->address;
        $save->status          = (int)$request->status;

        if (!empty($request->file('profile_img')))
            $save->profile_img   = singleFile($request->file('profile_img'), 'users');

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'User not Created']);

        return response(['status' => 'success', 'msg' => 'User Updated Successfully!']);
    }


    public function destroy($id)
    {
        $res = User::find($id)->delete();

        if (!$res)
            return response(['status' => 'error', 'msg' => 'User not Created']);

        return response(['status' => 'success', 'msg' => 'User Updated Successfully!']);
    }
}
