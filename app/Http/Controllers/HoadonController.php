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
        $cthdban= cthdban::all();
        $hoadonban= hdban::all()->where('trangthai','=',1);
        $hoadoncho= hdban::all()->where('trangthai','=',Null);
        return view('hoadonban.hoadonban',compact('hoadonban','cthdban','hoadoncho'));
    }
    // Hóa đơn bán ngày
    public function hdbanngay(Request $request)
    {   
        $cthdban= cthdban::all();
        $product = hdban::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->where('trangthai','=',1)->get();
        $product1 = hdban::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->where('trangthai','=',Null)->get();
        return view('hoadonban.hdbanngay',compact('product','product1','cthdban'));
    }
//CHI TIẾT HÓA ĐƠN
    //Chi tiết hóa đơn bán
    public function cthdban($id)
    {
    $cthdb= cthdban::where('id_hoadonban', '=',$id)->get();
    $monan= monan::all();
    $ct = cthdban::all()->where('id_hoadonban', '=',$id);
    $hoadonban= hdban::all();
    $hoadonban= hdban::find($id);
    $cthdban= cthdban::where('id_hoadonban', '=',$id)->get();
    return view('hoadonban.cthdban',compact('monan','hoadonban','cthdban','ct','cthdb'));
    }
    //Thêm món ăn vào chi tiết hóa đơn
    public function postcthdban(Request $request, $id)
    {
        $monan= monan::all();
        $monan = monan::where('id',$request->id_monan)->get();
        
        $monankiemtra = $request -> id_monan;
        $check = $request -> id_hoadonban;
        $monandaco = $request->input('id_monandaco',[]);
        if(array_key_exists($monankiemtra, $monandaco)){
            return redirect()->back()->with('thongbao', 'Món ăn đã tồn tại!');
        }
        else{
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
    }
    //Sửa chi tiết hóa đơn
    public function getsuacthdban($id)
    {
        $cthdban= cthdban::find($id);
        return view('hoadonban.suacthdban',compact('cthdban'));
    }
    public function postsuacthdban(Request $request)
    {
        $cthdban = cthdban::find($request->id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('cthdban')->where('cthdban.id',$request->id)
        ->update(['TongTien'=> $tong]);
        DB::table('cthdban')->where('cthdban.id',$request->id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $hdban= hdban::all();
        $hdban = $request->id_hoadon;
        DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
            ->where('hdban.id',$hdban)
            ->update(['ThanhTien' => $sum]);   

            return redirect()->back()->with('thanhcong','Đã cập nhật');
        }
        else{
            $id_hoadonban = cthdban::find($request->id)->id_hoadonban;
            $cthdb= cthdban::find($request->id);
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
            return redirect()->back()->with('xoathanhcong','Xóa thành công');
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
        return redirect()->back()->with('khongthexoa','Không thể xóa');
        }
        else{
            DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
            ->where('hdban.id',$id_hoadonban)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return redirect()->back()->with('xoathanhcong','Xóa thành công');
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
        return view('hoadonban.thanhtoanoff',compact('monan','hoadonban','cthdban'));
    }
    public function postthanhtoanoff(Request $request, $id)
    {
        $hdban = $request->id_hoadonban;
        $khachtra= $request->Khachtra;
        $tongtien = $request->ThanhTien;
        $phuongthuc = $request->phuongthuc;
        $khuyenmai1 = $request->khuyenmai1;
        $khuyenmai2 = $request->khuyenmai2;
        $hieu = $khachtra -  ($tongtien - $tongtien*($khuyenmai1/100) - $khuyenmai2);
        $tralai = number_format($hieu);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['Khachtra' => $khachtra]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['Tralai' => $tralai]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['trangthai' => 1]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['khuyenmai'=> $khuyenmai1]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['khuyenmaivnd'=> $khuyenmai2]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['phuongthucthanhtoan'=> $phuongthuc]);
        echo"<script>
            alert('Thanh toán thành công!');
            window.location = ' ".url('hoadonban')."'
            </script>";
    }
}