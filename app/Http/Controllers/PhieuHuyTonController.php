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
use App\phieuhuy;
use App\ctphuy;
use App\phieuton;
use App\ctpton;
use App\hanghoa;

class PhieuHuyTonController extends Controller
{
//Phiếu hủy
    public function phieuhuy()
    {
    $ctphuy= DB::table('ctphuy')-> join('phieuhuy','phieuhuy.id','=','ctphuy.id_phieuhuy') 
                                  -> join('hanghoa','hanghoa.id','=','ctphuy.id_hanghoa')->get();
    $phieuhuy= phieuhuy::all();
    return view('phieuhuy.phieuhuy',compact('phieuhuy','ctphuy'));
    }
//Phiếu hủy ngày
    public function phieuhuyngay(Request $request)
    {   
        $product = phieuhuy::where('Ngay','=',$request->Ngay)->get();
        $ctphuy= DB::table('ctphuy')-> join('phieuhuy','phieuhuy.id','=','ctphuy.id_phieuhuy') 
                                  -> join('hanghoa','hanghoa.id','=','ctphuy.id_hanghoa')->get();
        return view('phieuhuy.phieuhuyngay',compact('product','ctphuy'));
    }

//Phiếu tồn
    public function phieuton()
    {
    $ctpton= DB::table('ctpton')-> join('phieuton','phieuton.id','=','ctpton.id_phieuton') 
                                  -> join('hanghoa','hanghoa.id','=','ctpton.id_hanghoa')->get();
    $phieuton= phieuton::all();
    return view('phieuton.phieuton',compact('phieuton','ctpton'));
    }
//Phiếu tồn ngày
    public function phieutonngay(Request $request)
    {   
        $product = phieuton::where('Ngay','=',$request->Ngay)->get();
        $ctpton= DB::table('ctpton')-> join('phieuton','phieuton.id','=','ctpton.id_phieuton') 
                                  -> join('hanghoa','hanghoa.id','=','ctpton.id_hanghoa')->get();
        return view('phieuton.phieutonngay',compact('product','ctpton'));
    }
}