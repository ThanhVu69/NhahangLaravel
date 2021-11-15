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
use App\hanghoa;

class PhieuNhapXuatController extends Controller
{
//Phiếu nhập
    public function phieunhap()
    {
    $ctpnhap= DB::table('ctpnhap')-> join('phieunhap','phieunhap.id','=','ctpnhap.id_phieunhap') 
                                  -> join('hanghoa','hanghoa.id','=','ctpnhap.id_hanghoa')->get();
    $phieunhap= phieunhap::all();
    return view('phieunhap.phieunhap',compact('phieunhap','ctpnhap'));
    }
//Phiếu nhập ngày
    public function phieunhapngay(Request $request)
    {   
        $product = phieunhap::where('Ngay','=',$request->Ngay)->get();
        $ctpnhap= DB::table('ctpnhap')-> join('phieunhap','phieunhap.id','=','ctpnhap.id_phieunhap') 
                                  -> join('hanghoa','hanghoa.id','=','ctpnhap.id_hanghoa')->get();
        return view('phieunhap.phieunhapngay',compact('product','ctpnhap'));
    }

//Phiếu xuất
    public function phieuxuat()
    {
    $ctpxuat= DB::table('ctpxuat')-> join('phieuxuat','phieuxuat.id','=','ctpxuat.id_phieuxuat') 
                                  -> join('hanghoa','hanghoa.id','=','ctpxuat.id_hanghoa')->get();
    $phieuxuat= phieuxuat::all();
    return view('phieuxuat.phieuxuat',compact('phieuxuat','ctpxuat'));
    }
//Phiếu xuất ngày
    public function phieuxuatngay(Request $request)
    {   
        $product = phieuxuat::where('Ngay','=',$request->Ngay)->get();
        $ctpxuat= DB::table('ctpxuat')-> join('phieuxuat','phieuxuat.id','=','ctpxuat.id_phieuxuat') 
                                  -> join('hanghoa','hanghoa.id','=','ctpxuat.id_hanghoa')->get();
        return view('phieuxuat.phieuxuatngay',compact('product','ctpxuat'));
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