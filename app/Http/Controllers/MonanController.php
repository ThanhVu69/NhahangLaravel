<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use input;

class MonanController extends Controller
{
//MÓN ĂN
// Món ăn
    public function monan()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $monan= monan::groupBy(['id'],['ma'])->get();
        return view('monan.monan',compact('iduser','xem_ac','monan'));
    }  
    // Thêm món ăn
    public function getthemmonan()
    {
        return view('monan.themmonan');
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
            
    $filename = $request->image->getClientOriginalName();
    $monan = new monan;
    $monan->image = $filename;
    $monan->ma= $request->ma;
    $monan->Ten= $request->Ten;
    $monan->DVTinh= $request->DVTinh;
    $monan->dongia= $request->dongia;
    $monan->khuyenmai= $request->khuyenmai;
    $monan->mota= $request->mota;
    $monan->save();
    $request->image->storeAs('images',$filename);
    echo"<script>
    alert('Thêm món ăn thành công!');
    window.location = ' ".url('monan')."'
    </script>";
    }
    // Sửa món ăn
    public function getsuamonan($id)
    {
        $monan= monan::find($id);
        return view('monan.suamonan',compact('monan'));
    }
    public function postsuamonan(Request $request,$id)
    {
    $monan = monan::find($id);
    $arr['ma'] = $request->ma;
    $arr['Ten'] = $request->Ten;
    $arr['DVTinh'] = $request->DVTinh;
    $arr['dongia'] = $request->dongia;
    $arr['khuyenmai'] = $request->khuyenmai;
    $arr['mota'] = $request->mota;
    if($request->hasFile('image')){
        $image= $request->image->getClientOriginalName();
        $arr['image']=$image;
        $request->image->storeAs('online/images',$image);
        }   
    else{
        $arr['image']=$monan->image;
    }
    $monan::where('id',$id)->update($arr);  
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
}
