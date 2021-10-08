<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JSdemo extends Controller
{
//Ẩn hiện mục chọn
    public function JSan_hien()
    {
        return view('JSdemo.JS');
    }
}
