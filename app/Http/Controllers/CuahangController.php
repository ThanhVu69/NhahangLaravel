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
use App\cuahang;

class CuahangController extends Controller
{
//CƠ SỞ KHÁC
    //Danh sách cơ sở
    public function coso()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $coso= cuahang::all();
        return view('coso.coso',['coso'=>$coso,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }
    // Thêm cơ sở
    public function getthemcs()
    {
        return view('coso.themcs');
    }
    public function postthemcs(Request $request)
    {
        $this->validate($request,[
            'TenCH'=>'required|min:3'
            ],[
            'TenCH.required'=>'Vui lòng nhập tên',
            'TenCH.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
            ]);
    $coso = new cuahang;
    $coso->MaCH= $request->MaCH;
    $coso->TenCH= $request->TenCH;
    $coso->SDT= $request->SDT;
    $coso->TenQL= $request->TenQL;
    $coso->DiaChi= $request->DiaChi;
    $coso->lienket = 1;
    $coso->save();

    echo"<script>
        alert('Thêm cơ sở thành công!');
        window.location = ' ".url('coso')."'
        </script>";
    } 
    // Sửa cơ sở
    public function getsuacs($id)
    {
        $coso= cuahang::find($id);
        return view('coso.suacs',['coso'=>$coso]);
    }
    public function postsuacs(Request $request,$id)
    {
        $this->validate($request,[
            'TenCH'=>'required'
            ],[
            'TenCH'=>'Vui lòng nhập tên',
            
            ]);
    $coso = cuahang::find($id);
    $coso->MaCH= $request->MaCH;
    $coso->TenCH= $request->TenCH;
    $coso->SDT= $request->SDT;
    $coso->TenQL= $request->TenQL;
    $coso->DiaChi= $request->DiaChi;
    $coso->save();
    echo"<script>
    alert('Sửa cơ sở thành công!');
    window.location = ' ".url('coso')."'
    </script>";
    }
    // Xóa cơ sở
    public function getxoacs($id)
    {
        $coso = cuahang::find($id);
        $coso->delete();

        echo"<script>
        alert('Xóa cơ sở thành công!');
        window.location = ' ".url('coso')."'
        </script>";
    }
}
