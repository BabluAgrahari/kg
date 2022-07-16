<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'supplier') {
                return redirect()->intended('supplier/dashboard');
            } else if (Auth::user()->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            }
        }

        return redirect("/")->with('error', 'Login Credentails are Invalid');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
