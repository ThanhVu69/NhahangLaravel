<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\phieunhap;
use App\phieuxuat;
use App\ctpnhap;
use App\ctpxuat;

class PhieuNhapXuatController extends Controller
{
//Phiếu nhập
    public function phieunhap()
    {
    $phieunhap= phieunhap::all();
    return view('phieunhap.phieunhap',compact('phieunhap'));
    }
//Phiếu nhập ngày
    public function phieunhapngay(Request $request)
    {   
        $product = phieunhap::where('Ngay','=',$request->Ngay)->get();
        return view('phieunhap.phieunhapngay',['product'=>$product]);
    }
//Chi tiết phiếu nhập
    public function ctpnhap($id)
    {
    $phieunhap= phieunhap::find($id);
    $ctpnhap= ctpnhap::all();
    $ctpnhap= ctpnhap::find($id);
    $ctpnhap= ctpnhap::where('id_phieunhap','=',$id)->get();
    return view('phieunhap.ctpnhap',['ctpnhap'=>$ctpnhap,'phieunhap'=>$phieunhap]);
    }


//Phiếu xuất
    public function phieuxuat()
    {
    $phieuxuat= phieuxuat::all();
    return view('phieuxuat.phieuxuat',['phieuxuat'=>$phieuxuat]);
    }
//Phiếu xuất ngày
    public function phieuxuatngay(Request $request)
    {   
        $product = phieuxuat::where('Ngay','=',$request->Ngay)->get();
        return view('phieuxuat.phieuxuatngay',['product'=>$product]);
    }
//Chi tiết phiếu xuất
    public function ctpxuat($id)
    {
    $phieuxuat= phieuxuat::find($id);
    $ctpxuat= ctpxuat::all();
    $ctpxuat= ctpxuat::find($id);
    $ctpxuat= ctpxuat::where('id_phieuxuat','=',$id)->get();
    return view('phieuxuat.ctpxuat',['ctpxuat'=>$ctpxuat,'phieuxuat'=>$phieuxuat]);
    }
}
