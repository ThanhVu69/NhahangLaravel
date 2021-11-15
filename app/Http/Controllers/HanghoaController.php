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
        $hanghoa= hanghoa::groupBy(['id'],['ma'])->get();
        return view('hanghoa.hanghoa',['hanghoa'=>$hanghoa,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }

// Thêm hàng hóa
    public function getthemhanghoa()
    {
        return view('hanghoa.themhanghoa');
    }
    public function postthemhanghoa(Request $request)
    {
        $this->validate($request,[
            'Ten'=>'required|min:3'
            ],[
            'Ten.required'=>'Vui lòng nhập tên',
            'Ten.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
            ]);
    $hanghoa = new hanghoa;
    $hanghoa->ma= $request->ma;
    $hanghoa->Ten= $request->Ten;
    $hanghoa->DVTinh= $request->DVTinh;
    $hanghoa->dongia= $request->dongia;
    $hanghoa->save();

    echo"<script>
    alert('Thêm hàng hóa thành công!');
    window.location = ' ".url('hanghoa')."'
    </script>";
    }
// Sửa hàng hóa
    public function getsuahanghoa($id)
    {
        $hanghoa= hanghoa::find($id);
        return view('hanghoa.suahanghoa',['hanghoa'=>$hanghoa]);
    }
    public function postsuahanghoa(Request $request,$id)
    {
        $this->validate($request,[
            'Ten'=>'required'
            ],[
            'Ten'=>'Vui lòng nhập tên',
            
            ]);
        $hanghoa = hanghoa::find($id);
        $hanghoa->ma= $request->ma;
        $hanghoa->Ten= $request->Ten;
        $hanghoa->DVTinh= $request->DVTinh;
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