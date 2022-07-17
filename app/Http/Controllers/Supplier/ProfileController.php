<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Validation\UserValidation;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = User::find(Auth::user()->_id);
        return view('supplier.profile', $data);
    }

    public function update(Request $request, $id)
    {
        $save = User::find($id);
        $save->name            = $request->name;
        $save->email           = $request->email;
        $save->mobile          = $request->mobile;
        $save->state           = $request->state;
        $save->city            = $request->city;
        $save->pincode         = $request->pincode;
        $save->address         = $request->address;

        if (!$save->save())
            return response(['status' => 'error', 'msg' => 'Profile not Created']);

        return response(['status' => 'success', 'msg' => 'Profile Updated Successfully!']);
    }

    
}
