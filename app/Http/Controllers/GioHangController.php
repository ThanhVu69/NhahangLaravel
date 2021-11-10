<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\hanghoa;
use App\Cartt;

use Illuminate\Http\Request;

class GioHangController extends Controller
{
    //GIỎ HÀNG, HÓA ĐƠN
//Giỏ hàng hóa trống
public function giohanghoatrong()
{
return view('giohanghoatrong');  
}
//Đặt hàng thành công
public function themhhthanhcong()
{
return view('themhhthanhcong');  
}
//Xuất hàng thành công
public function xuathhthanhcong()
{
return view('xuathhthanhcong');  
}
//Tìm kiếm hàng hóa
public function searchhh(Request $request)
{
    $product = hanghoa::where('ma','like','%'.$request->key.'%')->get();

    return view('searchhh',compact('product'));
}
}
