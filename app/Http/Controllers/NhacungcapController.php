<?php

namespace App\Http\Controllers;
use App\monan;
use App\loaimonan;
use App\hanghoa;
use App\nhacungcap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NhacungcapController extends Controller
{
// Nhà cung cấp
    public function nhacungcap()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $nhacungcap= nhacungcap::all();
        return view('nhacungcap.nhacungcap',compact('iduser','xem_ac','nhacungcap'));
    }  
    // Thêm nhà cung cấp
    public function postthemnhacungcap(Request $request)
    {
    $nhacungcap = new nhacungcap;
    $nhacungcap->ten= $request->ten;
    $nhacungcap->diachi= $request->diachi;
    $nhacungcap->sdt= $request->sdt;
    $nhacungcap->email= $request->email;
    $nhacungcap->ghichu= $request->ghichu;
    $nhacungcap->save();
    echo"<script>
    alert('Thêm nhà cung cấp thành công!');
    window.location = ' ".url('nhacungcap')."'
    </script>";
    }
// Sửa nhà cung cấp
    public function postsuanhacungcap(Request $request)
    {
    $nhacungcap= nhacungcap::find($request->id);
    $nhacungcap->ten= $request->ten;
    $nhacungcap->diachi= $request->diachi;
    $nhacungcap->sdt= $request->sdt;
    $nhacungcap->email= $request->email;
    $nhacungcap->ghichu= $request->ghichu;
    $nhacungcap->save();
    echo"<script>
    alert('Sửa nhà cung cấp thành công!');
    window.location = ' ".url('nhacungcap')."'
    </script>";
    }
//Xóa nhà cung cấp
    public function getxoanhacungcap($id)
    {
        $nhacungcap = nhacungcap::find($id);
        $nhacungcap->delete();

        echo"<script>
        alert('Xóa nhà cung cấp thành công!');
        window.location = ' ".url('nhacungcap')."'
        </script>";
    }
}
