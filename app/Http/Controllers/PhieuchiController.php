<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phieuchi;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use input;
use Illuminate\Support\Str;
class PhieuchiController extends Controller
{
// Phiếu chi
    public function phieuchi()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $phieuchi= phieuchi::all();
        return view('phieuchi.phieuchi',compact('iduser','xem_ac','phieuchi'));
    }  
// Thêm phiếu chi
    public function postthemphieuchi(Request $request)
    {
    $phieuchi = new phieuchi;
    $phieuchi->noidung= $request->noidung;
    $phieuchi->id_nhanvien = Auth::user()->id;
    $phieuchi->ThanhTien= $request->ThanhTien;
    $phieuchi->save();
    echo"<script>
    alert('Thêm thành công!');
    window.location = ' ".url('phieuchi')."'
    </script>";
    }
// Sửa phiếu chi
    public function postsuaphieuchi(Request $request)
    {
    $phieuchi= phieuchi::find($request->id);
    $phieuchi->noidung= $request->noidung;
    $phieuchi->id_nhanvien = Auth::user()->id;
    $phieuchi->ThanhTien= $request->ThanhTien;
    $phieuchi->save();
    echo"<script>
    alert('Sửa thành công!');
    window.location = ' ".url('phieuchi')."'
    </script>";
    }
    //Xóa phiếu chi
    public function getxoaphieuchi($id)
    {
        $phieuchi = phieuchi::find($id);
        $phieuchi->delete();
        echo"<script>
        alert('Xóa phiếu thành công!');
        window.location = ' ".url('phieuchi')."'
        </script>";
    }
}