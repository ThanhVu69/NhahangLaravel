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
        $product = phieuhuy::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->get();
        $ctphuy= ctphuy::all();
        return view('phieuhuy.phieuhuyngay',compact('product','ctphuy'));
    }
//CHI TIẾT PHIẾU HỦY
//Chi tiết phiếu hủy
    public function ctphuy($id)
    {
    $cthdb= ctphuy::where('id_phieuhuy', '=',$id)->get();
    $hanghoa= hanghoa::all();
    $ct = ctphuy::all()->where('id_phieuhuy', '=',$id);
    $phieuhuy= phieuhuy::all();
    $phieuhuy= phieuhuy::find($id);
    $ctphuy= ctphuy::where('id_phieuhuy', '=',$id)->get();
    return view('phieuhuy.ctphuy',compact('hanghoa','phieuhuy','ctphuy','ct','cthdb'));
    }
//Thêm hàng hóa vào chi tiết phiếu hủy
    public function postctphuy(Request $request, $id)
    {
        $hanghoa= hanghoa::all();
        $hanghoa = hanghoa::where('id',$request->id_hanghoa)->get();

        $hanghoakiemtra = $request -> id_hanghoa;
        $check = $request -> id_phieuhuy;
        $hanghoadaco = $request->input('id_hanghoadaco',[]);
        if(array_key_exists($hanghoakiemtra, $hanghoadaco)){
            return redirect()->back()->with('thongbao', 'Hàng hóa đã tồn tại!');
        }
        else{
            $tenhanghoa= $request->id_hanghoa;
            $dongia= $hanghoa[0]->gia;
            $ctphuy = new ctphuy;
            $ctphuy->id_phieuhuy= $request->id_phieuhuy;
            $ctphuy->id_hanghoa= $request->id_hanghoa;
            $ctphuy->SoLuong= $request->SoLuong;
            $soluong= $request->SoLuong;

            $ctphuy->Dongia = $dongia;
            $ctphuy->TongTien = $soluong * $dongia;
            $thanhtien = $request->ThanhTien;
            $tong = $thanhtien + $soluong * $dongia;
        
            $phieuhuy= phieuhuy::all();
            $phieuhuy = $request->id_phieuhuy;
            DB::table('phieuhuy')->join('ctphuy', 'phieuhuy.id','=','ctphuy.id_phieuhuy')
                ->where('phieuhuy.id',$phieuhuy)
                ->update(['ThanhTien' => $tong]);                

            $ctphuy->save();  
            
            return back();
        }
    }
//Sửa chi tiết phiếu hủy
    public function postsuactphuy(Request $request)
    {
        $ctphuy = ctphuy::find($request->id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('ctphuy')->where('ctphuy.id',$request->id)
        ->update(['TongTien'=> $tong]);
        DB::table('ctphuy')->where('ctphuy.id',$request->id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $phieuhuy= phieuhuy::all();
        $phieuhuy = $request->id_phieuhuy;
        DB::table('phieuhuy')->join('ctphuy', 'phieuhuy.id','=','ctphuy.id_phieuhuy')
            ->where('phieuhuy.id',$phieuhuy)
            ->update(['ThanhTien' => $sum]);   

            return redirect()->back()->with('thanhcong','Đã cập nhật');
        }
        else{
            $id_phieuhuy = ctphuy::find($request->id)->id_phieuhuy;
            $cthdb= ctphuy::find($request->id);
            $tongtien= $cthdb->TongTien;
            $thanhtien=  DB::table('ctphuy')
                        ->where('ctphuy.id_phieuhuy',$id_phieuhuy)
                        ->sum('TongTien');       
            $tong= $thanhtien - $tongtien;
            $dem=DB::table('ctphuy')
            ->where('ctphuy.id_phieuhuy',$id_phieuhuy)
            ->count('id_phieuhuy');

            if($dem ==1){
            return redirect()->back();
            }
            else{
                DB::table('phieuhuy')->join('ctphuy', 'phieuhuy.id','=','ctphuy.id_phieuhuy')
                ->where('phieuhuy.id',$id_phieuhuy)
                ->update(['ThanhTien' => $tong]); 
                $cthdb->delete();
            }
            return redirect()->back()->with('xoathanhcong','Xóa thành công');
        }
    }
// Xóa chi tiết phiếu hủy
    public function getxoactphuy($id)
    {
        $ctphuy= ctphuy::find($id)->get();
        $id_phieuhuy = ctphuy::find($id)->id_phieuhuy;
        $cthdb= ctphuy::find($id);
        $tongtien= $cthdb->TongTien;
        $thanhtien=  DB::table('ctphuy')
                    ->where('ctphuy.id_phieuhuy',$id_phieuhuy)
                    ->sum('TongTien');               
        $tong= $thanhtien - $tongtien;

        $dem=DB::table('ctphuy')
        ->where('ctphuy.id_phieuhuy',$id_phieuhuy)
        ->count('id_phieuhuy');

        if($dem ==1){
        return redirect()->back()->with('khongthexoa','Không thể xóa');
        }
        else{
            DB::table('phieuhuy')->join('ctphuy', 'phieuhuy.id','=','ctphuy.id_phieuhuy')
            ->where('phieuhuy.id',$id_phieuhuy)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return redirect()->back()->with('xoathanhcong','Xóa thành công');
    }
// Xóa phiếu hủy
    public function getxoaphieuhuy($id)
        {
            $phieuhuy = phieuhuy::find($id);
            $ctphuy= ctphuy::where('id_phieuhuy', '=',$id);
            $phieuhuy-> delete();
            $ctphuy-> delete();
            return back();
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
        $product = phieuton::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->get();
        $ctpton= ctpton::all();
        return view('phieuton.phieutonngay',compact('product','ctpton'));
    }

//CHI TIẾT PHIẾU TỒN
//Chi tiết phiếu tồn
    public function ctpton($id)
    {
    $cthdb= ctpton::where('id_phieuton', '=',$id)->get();
    $hanghoa= hanghoa::all();
    $ct = ctpton::all()->where('id_phieuton', '=',$id);
    $phieuton= phieuton::all();
    $phieuton= phieuton::find($id);
    $ctpton= ctpton::where('id_phieuton', '=',$id)->get();
    return view('phieuton.ctpton',compact('hanghoa','phieuton','ctpton','ct','cthdb'));
    }
//Thêm hàng hóa vào chi tiết phiếu tồn
    public function postctpton(Request $request, $id)
    {
        $hanghoa= hanghoa::all();
        $hanghoa = hanghoa::where('id',$request->id_hanghoa)->get();

        $hanghoakiemtra = $request -> id_hanghoa;
        $check = $request -> id_phieuton;
        $hanghoadaco = $request->input('id_hanghoadaco',[]);
        if(array_key_exists($hanghoakiemtra, $hanghoadaco)){
            return redirect()->back()->with('thongbao', 'Hàng hóa đã tồn tại!');
        }
        else{
            $tenhanghoa= $request->id_hanghoa;
            $dongia= $hanghoa[0]->gia;
            $ctpton = new ctpton;
            $ctpton->id_phieuton= $request->id_phieuton;
            $ctpton->id_hanghoa= $request->id_hanghoa;
            $ctpton->SoLuong= $request->SoLuong;
            $soluong= $request->SoLuong;

            $ctpton->Dongia = $dongia;
            $ctpton->TongTien = $soluong * $dongia;
            $thanhtien = $request->ThanhTien;
            $tong = $thanhtien + $soluong * $dongia;
        
            $phieuton= phieuton::all();
            $phieuton = $request->id_phieuton;
            DB::table('phieuton')->join('ctpton', 'phieuton.id','=','ctpton.id_phieuton')
                ->where('phieuton.id',$phieuton)
                ->update(['ThanhTien' => $tong]);                

            $ctpton->save();  
            
            return back();
        }
    }
//Sửa chi tiết phiếu tồn
    public function postsuactpton(Request $request)
    {
        $ctpton = ctpton::find($request->id);
        $soluong= $request->SoLuong;
        if($soluong!=0){
        $dongia= $request->Dongia;
        $tong= $soluong * $dongia;
        DB::table('ctpton')->where('ctpton.id',$request->id)
        ->update(['TongTien'=> $tong]);
        DB::table('ctpton')->where('ctpton.id',$request->id)
        ->update(['SoLuong'=> $soluong]);

        $tongtien = $request->TongTien;
        $total= $request->ThanhTien;
        $sum= $total - $tongtien + $soluong * $dongia ;
        $phieuton= phieuton::all();
        $phieuton = $request->id_phieuton;
        DB::table('phieuton')->join('ctpton', 'phieuton.id','=','ctpton.id_phieuton')
            ->where('phieuton.id',$phieuton)
            ->update(['ThanhTien' => $sum]);   

            return redirect()->back()->with('thanhcong','Đã cập nhật');
        }
        else{
            $id_phieuton = ctpton::find($request->id)->id_phieuton;
            $cthdb= ctpton::find($request->id);
            $tongtien= $cthdb->TongTien;
            $thanhtien=  DB::table('ctpton')
                        ->where('ctpton.id_phieuton',$id_phieuton)
                        ->sum('TongTien');       
            $tong= $thanhtien - $tongtien;
            $dem=DB::table('ctpton')
            ->where('ctpton.id_phieuton',$id_phieuton)
            ->count('id_phieuton');

            if($dem ==1){
            return redirect()->back();
            }
            else{
                DB::table('phieuton')->join('ctpton', 'phieuton.id','=','ctpton.id_phieuton')
                ->where('phieuton.id',$id_phieuton)
                ->update(['ThanhTien' => $tong]); 
                $cthdb->delete();
            }
            return redirect()->back()->with('xoathanhcong','Xóa thành công');
        }
    }
// Xóa chi tiết phiếu tồn
    public function getxoactpton($id)
    {
        $ctpton= ctpton::find($id)->get();
        $id_phieuton = ctpton::find($id)->id_phieuton;
        $cthdb= ctpton::find($id);
        $tongtien= $cthdb->TongTien;
        $thanhtien=  DB::table('ctpton')
                    ->where('ctpton.id_phieuton',$id_phieuton)
                    ->sum('TongTien');               
        $tong= $thanhtien - $tongtien;

        $dem=DB::table('ctpton')
        ->where('ctpton.id_phieuton',$id_phieuton)
        ->count('id_phieuton');

        if($dem ==1){
        return redirect()->back()->with('khongthexoa','Không thể xóa');
        }
        else{
            DB::table('phieuton')->join('ctpton', 'phieuton.id','=','ctpton.id_phieuton')
            ->where('phieuton.id',$id_phieuton)
            ->update(['ThanhTien' => $tong]); 
            $cthdb->delete();
        }
        return redirect()->back()->with('xoathanhcong','Xóa thành công');
    }
// Xóa phiếu tồn
    public function getxoaphieuton($id)
        {
            $phieuton = phieuton::find($id);
            $ctpton= ctpton::where('id_phieuton', '=',$id);
            $phieuton-> delete();
            $ctpton-> delete();
            return back();
        }
}