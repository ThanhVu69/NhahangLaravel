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
use App\hanghoa;
use App\nhacungcap;
use App\baocaohanghoa;
use App\ctbaocaohanghoa;

class HanghoaController extends Controller
{
//HÀNG HÓA
// Hàng hóa
    public function hanghoa()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $hanghoa= hanghoa::all();
        $nhacungcap = nhacungcap::all();
        return view('hanghoa.hanghoa',compact('iduser','xem_ac','hanghoa','nhacungcap'));
    }

// Thêm hàng hóa
    public function postthemhanghoa(Request $request)
    {
    $hanghoa = new hanghoa;
    $hanghoa->Ten= $request->Ten;
    $hanghoa->gia= $request->gia;
    $hanghoa->id_nhacc= $request->id_nhacc;
    $hanghoa->DVTinh= $request->DVTinh;
    $hanghoa->TonDK= $request->TonDK;
    $dongia = $request->gia;
    $soluong = $request->TonDK;
    $thanhtien = $dongia * $soluong;
    $hanghoa->ThanhTien= $thanhtien;
    $hanghoa->ghichu= $request->ghichu;
    $hanghoa->save();
    echo"<script>
    alert('Thêm hàng hóa thành công!');
    window.location = ' ".url('hanghoa')."'
    </script>";
    }
// Sửa hàng hóa
    public function postsuahanghoa(Request $request)
    {
        $hanghoa = hanghoa::find($request->id);
        $hanghoa->Ten= $request->Ten;
        $hanghoa->gia= $request->gia;
        $hanghoa->id_nhacc= $request->id_nhacc;
        $hanghoa->DVTinh= $request->DVTinh;
        $hanghoa->TonDK= $request->TonDK;
        $dongia = $request->gia;
        $soluong = $request->TonDK;
        $thanhtien = $dongia * $soluong;
        $hanghoa->ThanhTien= $thanhtien;
        $hanghoa->ghichu= $request->ghichu;
        $hanghoa->save();
        echo"<script>
            alert('Sửa hàng hóa thành công!');
            window.location = ' ".url('hanghoa')."'
            </script>";
    }
// Xóa hàng hóa
    public function getxoahanghoa($id)
    {
        $hanghoa = hanghoa::find($id);
        $hanghoa->delete();

        echo"<script>
        alert('Xóa hàng hóa thành công!');
        window.location = ' ".url('hanghoa')."'
        </script>";
    }
}