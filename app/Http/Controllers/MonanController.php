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
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $monan= monan::all();
        return view('monan.monan',compact('iduser','xem_ac','monan'));
    }  
// Thêm món ăn
    public function getthemmonan()
    {
        $loaimonan = loaimonan::all();
        return view('monan.themmonan',compact('loaimonan'));
    }
    public function postthemmonan(Request $request)
    {
        $this->validate($request,[
            'ma'=>'required',
            'Ten'=>'required',
            'dongia'=>'required',
            'DVTinh'=>'required'  
            ],[
            'ma.required'=>'Vui lòng nhập Mã món ăn',
            'Ten.required'=>'Vui lòng nhập Tên món ăn',
            'dongia.required'=>'Vui lòng nhập Đơn giá',
            'DVTinh.required'=>'Vui lòng nhập Đơn vị tính'
            ]);
            
    $monan = new monan;
    $monan->ma= $request->ma;
    $monan->Ten= $request->Ten;
    $monan->DVTinh= $request->DVTinh;
    $monan->dongia= $request->dongia;
    $monan->khuyenmai= $request->khuyenmai;
    $monan->mota= $request->mota;
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
    public function getsuamonan($id)
    {
        $monan= monan::find($id);
        $loaimonan = loaimonan::all();
        return view('monan.suamonan',compact('monan','loaimonan'));
    }
    public function postsuamonan(Request $request,$id)
    {
    $monan = monan::find($id);
    $monan -> ma = $request->ma;
    $monan -> Ten = $request->Ten;
    $monan -> DvTinh = $request->DVTinh;
    $monan -> dongia = $request->dongia;
    $monan -> khuyenmai = $request->khuyenmai;
    $monan -> mota = $request->mota;
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
public function getthemloaimonan()
{
    return view('monan.themloaimonan');
}
public function postthemloaimonan(Request $request)
{
        $this->validate($request,[
            'ma'=>'required',
            'ten'=>'required',
            ],[
            'ma.required'=>'Vui lòng nhập Mã loại món ăn',
            'ten.required'=>'Vui lòng nhập Tên loại món ăn'
            ]);
            
    $loaimonan = new loaimonan;
    $loaimonan->ma= $request->ma;
    $loaimonan->ten= $request->ten;
    $loaimonan->save();
    echo"<script>
    alert('Thêm loại món ăn thành công!');
    window.location = ' ".url('loaimonan')."'
    </script>";
}
// Sửa loại món ăn
public function getsualoaimonan($id)
    {
        $loaimonan= loaimonan::find($id);
        return view('monan.sualoaimonan',compact('loaimonan'));
    }
public function postsualoaimonan(Request $request,$id)
{
    $loaimonan = loaimonan::find($id);
    $loaimonan -> ma = $request->ma;
    $loaimonan -> ten = $request->ten;
    $loaimonan->save();
    echo"<script>
    alert('Sửa loại món ăn thành công!');
    window.location = ' ".url('loaimonan')."'
    </script>";
}
//Xóa loại món ăn
public function getxoaloaimonan($id)
    {
        $loaimonan = loaimonan::find($id);
        $loaimonan->delete();

        echo"<script>
        alert('Xóa loại món ăn thành công!');
        window.location = ' ".url('loaimonan')."'
        </script>";
    }
}