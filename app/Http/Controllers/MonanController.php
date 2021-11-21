<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monan;
use App\loaimonan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use input;
use Illuminate\Support\Str;
class MonanController extends Controller
{
//MÓN ĂN
// Món ăn
    public function monan()
    {
        $iduser = intval(Auth::User()->quyen);
        $loaimonan = loaimonan::all();
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $monan= monan::all();
        return view('monan.monan',compact('iduser','xem_ac','monan','loaimonan'));
    }  
// Thêm món ăn
    public function postthemmonan(Request $request)
    {
    $monan = new monan;
    $monan->Ten= $request->Ten;
    $monan->DVTinh= $request->DVTinh;
    $monan->dongia= $request->dongia;
    $monan->id_loaimonan= $request->id_loaimonan;
    if($request->hasFile('anh'))
    {
        $file = $request->file('anh');

        $name = $file->getClientOriginalName();
        $anh = Str::random(4)."_".$name;
        while(file_exists("upload/monan/".$anh))
        {
            $anh = Str::random(4)."_".$name;
        }
        $file->move("upload/monan",$anh);
        $monan->image = $anh;
    }
    else{
        $monan->image = "";
    }
    $monan->save();
    echo"<script>
    alert('Thêm món ăn thành công!');
    window.location = ' ".url('monan')."'
    </script>";
    }
// Sửa món ăn
    public function postsuamonan(Request $request)
    {
    $monan= monan::find($request->id);
    $monan -> Ten = $request->Ten;
    $monan -> DvTinh = $request->DVTinh;
    $monan -> dongia = $request->dongia;
    $monan -> id_loaimonan = $request->id_loaimonan;
    if($request->hasFile('anh'))
            {
                $file = $request->file('anh');

                $name = $file->getClientOriginalName();
                $anh = Str::random(4)."_".$name;
                while(file_exists("upload/monan/".$anh))
                {
                    $anh = Str::random(4)."_".$name;
                }
                $file->move("upload/monan",$anh);
                // unlink("upload/giangvien/".$giangvien->anh);
                $monan->image = $anh;
            }
    $monan->save();
    echo"<script>
    alert('Sửa món ăn thành công!');
    window.location = ' ".url('monan')."'
    </script>";
    }
    //Xóa món ăn
    public function getxoamonan($id)
    {
        $monan = monan::find($id);
        $monan->delete();

        echo"<script>
        alert('Xóa món ăn thành công!');
        window.location = ' ".url('monan')."'
        </script>";
    }

//LOẠI MÓN ĂN
// Loại món ăn
    public function loaimonan()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $loaimonan= loaimonan::all();
        $monan= DB::table('monan')-> join('loaimonan','loaimonan.id','=','monan.id_loaimonan') ->get();
        return view('monan.loaimonan',compact('iduser','xem_ac','loaimonan','monan'));
    }  
// Thêm loại món ăn
    public function postthemloaimonan(Request $request)
    {
        $loaimonan = new loaimonan;
        $loaimonan->ten= $request->ten;
        $loaimonan->save();
        echo"<script>
        alert('Thêm loại món ăn thành công!');
        window.location = ' ".url('monan')."'
        </script>";
    }
// Sửa loại món ăn
    public function postsualoaimonan(Request $request)
    {
        $loaimonan= loaimonan::find($request->id);
        $loaimonan -> ten = $request->ten;
        $loaimonan->save();
        echo"<script>
        alert('Sửa loại món ăn thành công!');
        window.location = ' ".url('monan')."'
        </script>";
    }
//Xóa loại món ăn
    public function getxoaloaimonan($id)
        {
            $loaimonan = loaimonan::find($id);
            $monan = DB::table('monan')->where('monan.id_loaimonan',$id)->delete();
            $loaimonan->delete();
            echo"<script>
            alert('Xóa loại món ăn thành công!');
            window.location = ' ".url('monan')."'
            </script>";
        }
}