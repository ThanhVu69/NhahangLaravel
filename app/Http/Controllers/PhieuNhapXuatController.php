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
                                  -> join('hanghoa','hanghoa.id','=','ctpnhap.id_hanghoa')
                                  -> join('nhacungcap','nhacungcap.id','=','hanghoa.id_nhacc')->get();
    $phieunhap= phieunhap::all();
    return view('phieunhap.phieunhap',compact('phieunhap','ctpnhap'));
    }
//Phiếu nhập ngày
    public function phieunhapngay(Request $request)
    {   
        $product = phieunhap::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->get();
        $ctpnhap= ctpnhap::all();
        return view('phieunhap.phieunhapngay',compact('product','ctpnhap'));
    }

//CHI TIẾT PHIẾU NHẬP
//Chi tiết phiếu nhập
    public function ctpnhap($id)
    {
    $cthdb= ctpnhap::where('id_phieunhap', '=',$id)->get();
    $hanghoa= hanghoa::all();
    $ct = ctpnhap::all()->where('id_phieunhap', '=',$id);
    $phieunhap= phieunhap::all();
    $phieunhap= phieunhap::find($id);
    $ctpnhap= ctpnhap::where('id_phieunhap', '=',$id)->get();
    return view('phieunhap.ctpnhap',compact('hanghoa','phieunhap','ctpnhap','ct','cthdb'));
    }
//Thêm hàng hóa vào chi tiết phiếu nhập
    public function postctpnhap(Request $request, $id)
    {
        $hanghoa= hanghoa::all();
        $hanghoa = hanghoa::where('id',$request->id_hanghoa)->get();
        
        $hanghoakiemtra = $request -> id_hanghoa;
        $check = $request -> id_phieunhap;
        $hanghoadaco = $request->input('id_hanghoadaco',[]);
        if(array_key_exists($hanghoakiemtra, $hanghoadaco)){
            return redirect()->back()->with('thongbao', 'Hàng hóa đã tồn tại!');
        }
        else{
            $tenhanghoa= $request->id_hanghoa;
            $dongia= $hanghoa[0]->gia;
            $ctpnhap = new ctpnhap;
            $ctpnhap->id_phieunhap= $request->id_phieunhap;
            $ctpnhap->id_hanghoa= $request->id_hanghoa;
            $ctpnhap->SoLuong= $request->SoLuong;
            $soluong= $request->SoLuong;

            $ctpnhap->Dongia = $dongia;
            $ctpnhap->TongTien = $soluong * $dongia;
            $thanhtien = $request->ThanhTien;
            $tong = $thanhtien + $soluong * $dongia;
        
            $phieunhap= phieunhap::all();
            $phieunhap = $request->id_phieunhap;
            DB::table('phieunhap')->join('ctpnhap', 'phieunhap.id','=','ctpnhap.id_phieunhap')
                ->where('phieunhap.id',$phieunhap)
                ->update(['ThanhTien' => $tong]);                

            $ctpnhap->save();  
            
            return back();
        }
    }
//Sửa chi tiết phiếu nhập
    public function postsuactpnhap(Request $request)
    {
        $ctpnhap = ctpnhap::find($request->id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('ctpnhap')->where('ctpnhap.id',$request->id)
        ->update(['TongTien'=> $tong]);
        DB::table('ctpnhap')->where('ctpnhap.id',$request->id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $phieunhap= phieunhap::all();
        $phieunhap = $request->id_phieunhap;
        DB::table('phieunhap')->join('ctpnhap', 'phieunhap.id','=','ctpnhap.id_phieunhap')
            ->where('phieunhap.id',$phieunhap)
            ->update(['ThanhTien' => $sum]);   

            return redirect()->back()->with('thanhcong','Đã cập nhật');
        }
        else{
            $id_phieunhap = ctpnhap::find($request->id)->id_phieunhap;
            $cthdb= ctpnhap::find($request->id);
            $tongtien= $cthdb->TongTien;
            $thanhtien=  DB::table('ctpnhap')
                        ->where('ctpnhap.id_phieunhap',$id_phieunhap)
                        ->sum('TongTien');       
            $tong= $thanhtien - $tongtien;
            $dem=DB::table('ctpnhap')
            ->where('ctpnhap.id_phieunhap',$id_phieunhap)
            ->count('id_phieunhap');

            if($dem ==1){
            return redirect()->back();
            }
            else{
                DB::table('phieunhap')->join('ctpnhap', 'phieunhap.id','=','ctpnhap.id_phieunhap')
                ->where('phieunhap.id',$id_phieunhap)
                ->update(['ThanhTien' => $tong]); 
                $cthdb->delete();
            }
            return redirect()->back()->with('xoathanhcong','Xóa thành công');
        }
    }
// Xóa chi tiết phiếu nhập
    public function getxoactpnhap($id)
    {
        $ctpnhap= ctpnhap::find($id)->get();
        $id_phieunhap = ctpnhap::find($id)->id_phieunhap;
        $cthdb= ctpnhap::find($id);
        $tongtien= $cthdb->TongTien;
        $thanhtien=  DB::table('ctpnhap')
                    ->where('ctpnhap.id_phieunhap',$id_phieunhap)
                    ->sum('TongTien');               
        $tong= $thanhtien - $tongtien;

        $dem=DB::table('ctpnhap')
        ->where('ctpnhap.id_phieunhap',$id_phieunhap)
        ->count('id_phieunhap');

        if($dem ==1){
        return redirect()->back()->with('khongthexoa','Không thể xóa');
        }
        else{
            DB::table('phieunhap')->join('ctpnhap', 'phieunhap.id','=','ctpnhap.id_phieunhap')
            ->where('phieunhap.id',$id_phieunhap)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return redirect()->back()->with('xoathanhcong','Xóa thành công');
    }
// Xóa phiếu nhập
    public function getxoaphieunhap($id)
    {
        $phieunhap = phieunhap::find($id);
        $ctpnhap= ctpnhap::where('id_phieunhap', '=',$id);
        $phieunhap-> delete();
        $ctpnhap-> delete();
        return back();
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
        $product = phieuxuat::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->get();
        $ctpxuat= ctpxuat::all();
        return view('phieuxuat.phieuxuatngay',compact('product','ctpxuat'));
    }
//CHI TIẾT PHIẾU XUẤT
//Chi tiết phiếu xuất
    public function ctpxuat($id)
    {
    $cthdb= ctpxuat::where('id_phieuxuat', '=',$id)->get();
    $hanghoa= hanghoa::all();
    $ct = ctpxuat::all()->where('id_phieuxuat', '=',$id);
    $phieuxuat= phieuxuat::all();
    $phieuxuat= phieuxuat::find($id);
    $ctpxuat= ctpxuat::where('id_phieuxuat', '=',$id)->get();
    return view('phieuxuat.ctpxuat',compact('hanghoa','phieuxuat','ctpxuat','ct','cthdb'));
    }
//Thêm hàng hóa vào chi tiết phiếu xuất
    public function postctpxuat(Request $request, $id)
    {
        $hanghoa= hanghoa::all();
        $hanghoa = hanghoa::where('id',$request->id_hanghoa)->get();

        $hanghoakiemtra = $request -> id_hanghoa;
        $check = $request -> id_phieuxuat;
        $hanghoadaco = $request->input('id_hanghoadaco',[]);
        if(array_key_exists($hanghoakiemtra, $hanghoadaco)){
            return redirect()->back()->with('thongbao', 'Hàng hóa đã tồn tại!');
        }
        else{
            $tenhanghoa= $request->id_hanghoa;
            $dongia= $hanghoa[0]->gia;
            $ctpxuat = new ctpxuat;
            $ctpxuat->id_phieuxuat= $request->id_phieuxuat;
            $ctpxuat->id_hanghoa= $request->id_hanghoa;
            $ctpxuat->SoLuong= $request->SoLuong;
            $soluong= $request->SoLuong;

            $ctpxuat->Dongia = $dongia;
            $ctpxuat->TongTien = $soluong * $dongia;
            $thanhtien = $request->ThanhTien;
            $tong = $thanhtien + $soluong * $dongia;
        
            $phieuxuat= phieuxuat::all();
            $phieuxuat = $request->id_phieuxuat;
            DB::table('phieuxuat')->join('ctpxuat', 'phieuxuat.id','=','ctpxuat.id_phieuxuat')
                ->where('phieuxuat.id',$phieuxuat)
                ->update(['ThanhTien' => $tong]);                

            $ctpxuat->save();  
            
            return back();
        }
    }
//Sửa chi tiết phiếu xuất
    public function postsuactpxuat(Request $request)
    {
        $ctpxuat = ctpxuat::find($request->id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('ctpxuat')->where('ctpxuat.id',$request->id)
        ->update(['TongTien'=> $tong]);
        DB::table('ctpxuat')->where('ctpxuat.id',$request->id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $phieuxuat= phieuxuat::all();
        $phieuxuat = $request->id_phieuxuat;
        DB::table('phieuxuat')->join('ctpxuat', 'phieuxuat.id','=','ctpxuat.id_phieuxuat')
            ->where('phieuxuat.id',$phieuxuat)
            ->update(['ThanhTien' => $sum]);   

            return redirect()->back()->with('thanhcong','Đã cập nhật');
        }
        else{
            $id_phieuxuat = ctpxuat::find($request->id)->id_phieuxuat;
            $cthdb= ctpxuat::find($request->id);
            $tongtien= $cthdb->TongTien;
            $thanhtien=  DB::table('ctpxuat')
                        ->where('ctpxuat.id_phieuxuat',$id_phieuxuat)
                        ->sum('TongTien');       
            $tong= $thanhtien - $tongtien;
            $dem=DB::table('ctpxuat')
            ->where('ctpxuat.id_phieuxuat',$id_phieuxuat)
            ->count('id_phieuxuat');

            if($dem ==1){
            return redirect()->back();
            }
            else{
                DB::table('phieuxuat')->join('ctpxuat', 'phieuxuat.id','=','ctpxuat.id_phieuxuat')
                ->where('phieuxuat.id',$id_phieuxuat)
                ->update(['ThanhTien' => $tong]); 
                $cthdb->delete();
            }
            return redirect()->back()->with('xoathanhcong','Xóa thành công');
        }
    }
// Xóa chi tiết phiếu xuất
    public function getxoactpxuat($id)
    {
        $ctpxuat= ctpxuat::find($id)->get();
        $id_phieuxuat = ctpxuat::find($id)->id_phieuxuat;
        $cthdb= ctpxuat::find($id);
        $tongtien= $cthdb->TongTien;
        $thanhtien=  DB::table('ctpxuat')
                    ->where('ctpxuat.id_phieuxuat',$id_phieuxuat)
                    ->sum('TongTien');               
        $tong= $thanhtien - $tongtien;

        $dem=DB::table('ctpxuat')
        ->where('ctpxuat.id_phieuxuat',$id_phieuxuat)
        ->count('id_phieuxuat');

        if($dem ==1){
        return redirect()->back()->with('khongthexoa','Không thể xóa');
        }
        else{
            DB::table('phieuxuat')->join('ctpxuat', 'phieuxuat.id','=','ctpxuat.id_phieuxuat')
            ->where('phieuxuat.id',$id_phieuxuat)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return redirect()->back()->with('xoathanhcong','Xóa thành công');
    }
// Xóa phiếu xuất
    public function getxoaphieuxuat($id)
    {
        $phieuxuat = phieuxuat::find($id);
        $ctpxuat= ctpxuat::where('id_phieuxuat', '=',$id);
        $phieuxuat-> delete();
        $ctpxuat-> delete();
        return back();
    }
}