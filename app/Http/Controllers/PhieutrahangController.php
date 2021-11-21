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
use App\phieutra;
use App\ctptra;
use App\hanghoa;

class PhieutrahangController extends Controller
{
//Phiếu trả
    public function phieutra()
    {
    $ctptra= DB::table('ctptra')-> join('phieutra','phieutra.id','=','ctptra.id_phieutra') 
                                  -> join('hanghoa','hanghoa.id','=','ctptra.id_hanghoa')->get();
    $phieutra= phieutra::all();
    return view('phieutra.phieutra',compact('phieutra','ctptra'));
    }
//Phiếu trả ngày
    public function phieutrangay(Request $request)
    {   
        $product = phieutra::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->get();
        $ctptra= ctptra::all();
        return view('phieutra.phieutrangay',compact('product','ctptra'));
    }
//CHI TIẾT PHIẾU TRẢ
//Chi tiết phiếu trả
    public function ctptra($id)
    {
    $cthdb= ctptra::where('id_phieutra', '=',$id)->get();
    $hanghoa= hanghoa::all();
    $ct = ctptra::all()->where('id_phieutra', '=',$id);
    $phieutra= phieutra::all();
    $phieutra= phieutra::find($id);
    $ctptra= ctptra::where('id_phieutra', '=',$id)->get();
    return view('phieutra.ctptra',compact('hanghoa','phieutra','ctptra','ct','cthdb'));
    }
//Thêm hàng hóa vào chi tiết phiếu trả
    public function postctptra(Request $request, $id)
    {
        $hanghoa= hanghoa::all();
        $hanghoa = hanghoa::where('id',$request->id_hanghoa)->get();

        $hanghoakiemtra = $request -> id_hanghoa;
        $check = $request -> id_phieutra;
        $hanghoadaco = $request->input('id_hanghoadaco',[]);
        if(array_key_exists($hanghoakiemtra, $hanghoadaco)){
            return redirect()->back()->with('thongbao', 'Hàng hóa đã tồn tại!');
        }
        else{
            $tenhanghoa= $request->id_hanghoa;
            $dongia= $hanghoa[0]->gia;
            $ctptra = new ctptra;
            $ctptra->id_phieutra= $request->id_phieutra;
            $ctptra->id_hanghoa= $request->id_hanghoa;
            $ctptra->SoLuong= $request->SoLuong;
            $soluong= $request->SoLuong;

            $ctptra->Dongia = $dongia;
            $ctptra->TongTien = $soluong * $dongia;
            $thanhtien = $request->ThanhTien;
            $tong = $thanhtien + $soluong * $dongia;
        
            $phieutra= phieutra::all();
            $phieutra = $request->id_phieutra;
            DB::table('phieutra')->join('ctptra', 'phieutra.id','=','ctptra.id_phieutra')
                ->where('phieutra.id',$phieutra)
                ->update(['ThanhTien' => $tong]);                

            $ctptra->save();  
            
            return back();
        }
    }
//Sửa chi tiết phiếu trả
    public function postsuactptra(Request $request)
    {
        $ctptra = ctptra::find($request->id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('ctptra')->where('ctptra.id',$request->id)
        ->update(['TongTien'=> $tong]);
        DB::table('ctptra')->where('ctptra.id',$request->id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $phieutra= phieutra::all();
        $phieutra = $request->id_phieutra;
        DB::table('phieutra')->join('ctptra', 'phieutra.id','=','ctptra.id_phieutra')
            ->where('phieutra.id',$phieutra)
            ->update(['ThanhTien' => $sum]);   

            return redirect()->back()->with('thanhcong','Đã cập nhật');
        }
        else{
            $id_phieutra = ctptra::find($request->id)->id_phieutra;
            $cthdb= ctptra::find($request->id);
            $tongtien= $cthdb->TongTien;
            $thanhtien=  DB::table('ctptra')
                        ->where('ctptra.id_phieutra',$id_phieutra)
                        ->sum('TongTien');       
            $tong= $thanhtien - $tongtien;
            $dem=DB::table('ctptra')
            ->where('ctptra.id_phieutra',$id_phieutra)
            ->count('id_phieutra');

            if($dem ==1){
            return redirect()->back();
            }
            else{
                DB::table('phieutra')->join('ctptra', 'phieutra.id','=','ctptra.id_phieutra')
                ->where('phieutra.id',$id_phieutra)
                ->update(['ThanhTien' => $tong]); 
                $cthdb->delete();
            }
            return redirect()->back()->with('xoathanhcong','Xóa thành công');
        }
    }
// Xóa chi tiết phiếu trả
    public function getxoactptra($id)
    {
        $ctptra= ctptra::find($id)->get();
        $id_phieutra = ctptra::find($id)->id_phieutra;
        $cthdb= ctptra::find($id);
        $tongtien= $cthdb->TongTien;
        $thanhtien=  DB::table('ctptra')
                    ->where('ctptra.id_phieutra',$id_phieutra)
                    ->sum('TongTien');               
        $tong= $thanhtien - $tongtien;

        $dem=DB::table('ctptra')
        ->where('ctptra.id_phieutra',$id_phieutra)
        ->count('id_phieutra');

        if($dem ==1){
        return redirect()->back()->with('khongthexoa','Không thể xóa');
        }
        else{
            DB::table('phieutra')->join('ctptra', 'phieutra.id','=','ctptra.id_phieutra')
            ->where('phieutra.id',$id_phieutra)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return redirect()->back()->with('xoathanhcong','Xóa thành công');
    }
// Xóa phiếu trả
    public function getxoaphieutra($id)
        {
            $phieutra = phieutra::find($id);
            $ctptra= ctptra::where('id_phieutra', '=',$id);
            $phieutra-> delete();
            $ctptra-> delete();
            return back();
        }
}