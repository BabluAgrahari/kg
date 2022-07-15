<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validation\ProductValidation;
use App\Models\Po;

class PoController extends Controller
{
    public function index()
    {

        $data['lists'] = Po::get();

        return view('admin.po.index', $data);
    }

    public function create()
    {

    }
}
