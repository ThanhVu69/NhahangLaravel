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
use App\hdban;
use App\cthdban;
use App\monan;

class HoadonController extends Controller
{
//HÓA ĐƠN
    // Hóa đơn bán
    public function hoadonban()
    {
    $hoadonban= hdban::all();
    return view('hoadonban.hoadonban',compact('hoadonban'));
    }
    // Hóa đơn bán ngày
    public function hdbanngay(Request $request)
    {   
        $product = hdban::where('Ngay','=',$request->Ngay)->get();
        return view('hoadonban.hdbanngay',['product'=>$product]);
    }
//CHI TIẾT HÓA ĐƠN
    //Chi tiết hóa đơn bán
    public function cthdban($id)
    {
    $monan= monan::where('spdg',0)->get();
    $hoadonban= hdban::all();
    $hoadonban= hdban::find($id);
    $cthdban= cthdban::where('id_hoadonban', '=',$id)->get();
    return view('hoadonban.cthdban',['cthdban'=>$cthdban,'hoadonban'=>$hoadonban,'monan'=>$monan]);
    }
    //Thêm món ăn vào hóa đơn
    public function postcthdban(Request $request, $id)
    {
        $monan= monan::all();
        $monan = monan::where('id',$request->id_monan)->get();
        $tenmonan= $request->id_monan;
    
        $dongia= $monan[0]->dongia;
        $cthdban = new cthdban;
        $cthdban->id_hoadonban= $request->id_hoadonban;
        $cthdban->id_monan= $request->id_monan;
        $cthdban->SoLuong= $request->SoLuong;
        $soluong= $request->SoLuong;

        $cthdban->Dongia = $dongia;
        $cthdban->TongTien = $soluong * $dongia;
        $cthdban ->Ngay = date('Y-m-d'); 

        $thanhtien = $request->ThanhTien;
        $tong = $thanhtien + $soluong * $dongia;
    
        $hdban= hdban::all();
        $hdban = $request->id_hoadonban;
        DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
            ->where('hdban.id',$hdban)
            ->update(['ThanhTien' => $tong]);                

        $cthdban->save();  
        
        return back();
    }
    //Sửa chi tiết hóa đơn
    public function getsuacthdban($id)
    {
        $cthdban= cthdban::find($id);
        return view('hoadonban.suacthdban',compact('cthdban'));
    }
    public function postsuacthdban(Request $request,$id)
    {
        $cthdban = cthdban::find($id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('cthdban')->where('cthdban.id',$id)
        ->update(['TongTien'=> $tong]);
        DB::table('cthdban')->where('cthdban.id',$id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $hdban= hdban::all();
        $hdban = $request->id_hoadon;

        DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
            ->where('hdban.id',$hdban)
            ->update(['ThanhTien' => $sum]);   

        return redirect('hoadonban');
        }
        else{
            return redirect()->back()->with('thongbao','Số lượng không thể bằng 0!');
        }
    }
    // Xóa chi tiết hóa đơn
    public function getxoacthdban($id)
    {
        $cthdban= cthdban::find($id)->get();
        $id_hoadonban = cthdban::find($id)->id_hoadonban;
        $cthdb= cthdban::find($id);
        $tongtien= $cthdb->TongTien;
        $thanhtien=  DB::table('cthdban')
                    ->where('cthdban.id_hoadonban',$id_hoadonban)
                    ->sum('TongTien');  
                    
        $tong= $thanhtien - $tongtien;
        $dem=DB::table('cthdban')
        ->where('cthdban.id_hoadonban',$id_hoadonban)
        ->count('id_hoadonban');

        if($dem ==1){
        return redirect()->back();
        }
        else{
            DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
            ->where('hdban.id',$id_hoadonban)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return back();
    }
    // Xóa hóa đơn
    public function getxoahdban($id)
    {
        $hdban = hdban::find($id);
        $cthdban= cthdban::where('id_hoadonban', '=',$id);
        $hdban-> delete();
        $cthdban-> delete();
        return back();
    }
    //Thanh toán offline
    public function getthanhtoanoff($id)
    {
        $monan= monan::all();
        $hoadonban= hdban::all();
        $hoadonban= hdban::find($id);
        $cthdban= cthdban::where('id_hoadonban', '=',$id)->get();
        return view('hoadonban.thanhtoanoff',['cthdban'=>$cthdban,'hoadonban'=>$hoadonban,'monan'=>$monan]);
    }
    public function postthanhtoanoff(Request $request,$id)
    {
        $hdban = $request->id_hoadonban;
        $khachtra= $request->Khachtra;
        $tongtien = $request->ThanhTien;
        $tralai = $khachtra -  $tongtien;
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['Khachtra' => $khachtra]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['Tralai' => $tralai]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['trangthai' => 1]);
        return redirect('hoadonban');
    }
}
