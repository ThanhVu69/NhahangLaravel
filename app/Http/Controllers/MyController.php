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

use App\monan;
use App\nhanvien;
use App\cuahang;
use App\hanghoa;
use App\User;
use App\vp_user;
use App\hdban;
use App\cthdban;
use App\phieunhap;
use App\phieuxuat;
use App\ctpnhap;
use App\ctpxuat;
use App\hangto;
use App\Cartt;
use App\Khachhang;
use App\Bill;
use App\BillDetail;
use App\Review;
use App\Tintuc;
use App\Khachdatban;
use Carbon\Carbon;
use Mail;
use Cart;
use Validator;
use Excel;
use input;
use Yajra\Datatables\Datatables;
class MyController extends Controller
{
   
// Đăng nhập:
    public function getdangnhap()
    {
        return view('dangnhap');
    }
    public function postdangnhap(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập pass'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if(Auth::user()->quyen==1)
            {
                return redirect('trangchu');
            }
            elseif(Auth::user()->quyen==0)
            {
                return redirect('trangchu');
            }   
            elseif(Auth::user()->quyen==2)
            {
                return redirect('index');
            }   
            else
            {
                return redirect('index');
            } 
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
            
        }
    }
    
// Đăng xuất
    public function getdangxuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    } 

// User
// Danh sách User
    public function User()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $user= User::whereBetween('quyen',[0,2])->get();
        return view('User',['user'=>$user,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }
// Thêm User
    public function getthemuser()
    {
        return view('themuser');
    }
    public function postthemuser(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
            ],[
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
            ]);
    $user = new User;
    $user->id= $request->id;
    $user->name= $request->name;
    $user->SDT= $request->SDT;
    $user->email= $request->email;
    $user->password= bcrypt($request->password);
    $user->DiaChi= $request->DiaChi;
    $user->quyen= $request->quyen;
    $user->save();

    echo"<script>
        alert('Thêm thành công!');
        window.location = ' ".url('nguoidung')."'
        </script>";
    }
// Sửa User
    public function getsuauser($id)
    {
        $user= User::find($id);
        return view('suauser',['user'=>$user]);
    }
    public function postsuauser(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required'
            ],[
            'name'=>'Vui lòng nhập tên',
            
            ]);
    $user = User::find($id);
    $user->id= $request->id;
    $user->name= $request->name;
    $user->SDT= $request->SDT;
    $user->email= $request->email;
    $user->password= bcrypt($request->password);
    $user->DiaChi= $request->DiaChi;
    $user->quyen= $request->quyen;
    $user->save();
    echo"<script>
        alert('Sửa thành công!');
        window.location = ' ".url('nguoidung')."'
        </script>";
    }
// Xóa User
    public function getxoauser($id)
    {
        $user = User::find($id);
        $user->delete();

        echo"<script>
        alert('Xóa thành công!');
        window.location = ' ".url('nguoidung')."'
        </script>";
    }

//MÓN ĂN
// Món ăn
    public function monan()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $monan= monan::groupBy(['id'],['ma'])->get();
        return view('monan',compact('iduser','xem_ac','monan'));
    }  
// Thêm món ăn
    public function getthemmonan()
    {
        return view('themmonan');
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
    $monan->spdg= $request->spdg;
    $monan->top= $request->top;
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
        return view('suamonan',compact('monan'));
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
    $arr['spdg'] = $request->spdg;
    $arr['top'] = $request->top;
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
// TRANG CHỦ 
    public function trangchu()
    {   
        $dtngay =DB::table('cthdban')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(TongTien) as DT'))
      ->groupBy('date')
      ->get();
        $hoadonban = DB::table('hdban')->orderBy('ThanhTien','DESC')->skip(0)->take(3)->get();
        $total = DB::table('cthdban')->sum('TongTien');
        $bill =DB::table('bill')->orderBy('ngay','DESC')->skip(0)->take(5)->get();
        return view('trangchu', compact('dtngay','hoadonban','total','bill'));
    }
    
// NHÂN VIÊN
// Nhân viên: danh sách, thêm, sửa, xóa
    public function nhanvien()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        return view('nhanvien',compact('iduser','xem_ac'));
    }
    public function getthemnhanvien()
    {
    $students = nhanvien::select('id','Ten', 'Ngaysinh','SDT','DiaChi','Vaitro');
    return Datatables::of($students)   
    ->addColumn('action', function($student){
        return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'">
        <i class="glyphicon glyphicon-edit"></i>
        Sửa</a><a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'">
        <i class="glyphicon glyphicon-remove"></i> Xóa</a>';
    })
    ->make(true);
    }
    public function postthemnhanvien(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'Ten' => 'required',
            'Ngaysinh'  => 'required',
            'SDT'  => 'required',           
            'DiaChi'  => 'required',
            'Vaitro'  => 'required'
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $student = new nhanvien([
                    'Ten'    =>  $request->get('Ten'),
                    'Ngaysinh'  =>  $request->get('Ngaysinh'),
                    'SDT'     =>  $request->get('SDT'),
                    'DiaChi'     =>  $request->get('DiaChi'),
                    'Vaitro'     =>  $request->get('Vaitro')
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $student = nhanvien::find($request->get('student_id'));
                $student->Ten = $request->get('Ten');
                $student->Ngaysinh = $request->get('Ngaysinh');
                $student->SDT = $request->get('SDT');
                $student->DiaChi = $request->get('DiaChi');
                $student->Vaitro = $request->get('Vaitro');
                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
    public function suanhanvien(Request $request)
    {
        $id = $request->input('id');
        $student = nhanvien::find($id);
        $output = array(
            'Ten'    =>  $student->Ten,
            'Ngaysinh'     =>  $student->Ngaysinh,
            'SDT'    =>  $student->SDT,
            'DiaChi'    =>  $student->DiaChi,
            'Vaitro'    =>  $student->Vaitro
        );
        echo json_encode($output);
    }
    public function xoanhanvien(Request $request)
    {
        $student = nhanvien::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
// KHÁCH ĐẶT BÀN
// Khách đặt bàn: danh sách, thêm, sửa, xóa
    public function khachdatban()
    {
        $cuahang=cuahang::all();
        return view('khachdatban',compact('cuahang'));
    }
    public function getthemkhachdatban()
    {
    $students = Khachdatban::select('id','ten', 'sdt','id_cuahang','songuoi','thoigian','gio','buoi','trangthai','ghichu');
    return Datatables::of($students)   
    ->addColumn('action', function($student){
        return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'">
        <i class="glyphicon glyphicon-edit"></i>
        Sửa</a><a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'">
        <i class="glyphicon glyphicon-remove"></i> Xóa</a>';
    })
    ->make(true);
    }
    public function postthemkhachdatban(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'ten' => 'required',
            'sdt'  => 'required',
            'id_cuahang'  => 'required',           
            'songuoi'  => 'required',
            'thoigian'  => 'required',
            'gio'  => 'required',
            'buoi'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $student = new Khachdatban([
                    'ten'    =>  $request->get('ten'),
                    'sdt'  =>  $request->get('sdt'),
                    'id_cuahang'     =>  $request->get('id_cuahang'),  
                    'songuoi'     =>  $request->get('songuoi'),
                    'thoigian'     =>  $request->get('thoigian'),
                    'gio'     =>  $request->get('gio'),
                    'buoi'     =>  $request->get('buoi'),
                    'trangthai'     =>  $request->get('trangthai'),
                    'ghichu'        => $request->get('ghichu')
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $student = Khachdatban::find($request->get('student_id'));
                $student->ten = $request->get('ten');
                $student->sdt = $request->get('sdt');
                $student->id_cuahang = $request->get('id_cuahang');
                $student->songuoi = $request->get('songuoi');
                $student->thoigian = $request->get('thoigian');
                $student->gio = $request->get('gio');
                $student->buoi = $request->get('buoi');
                $student->trangthai = $request->get('trangthai');
                $student->ghichu = $request->get('ghichu');
                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
    public function suakhachdatban(Request $request)
    {
        $id = $request->input('id');
        $student = Khachdatban::find($id);
        $output = array(
            'ten'    =>  $student->ten,
            'sdt'     =>  $student->sdt,
            'id_cuahang'    =>  $student->id_cuahang,
            'thoigian'    =>  $student->thoigian,
            'gio'    =>  $student->gio,
            'buoi'    =>  $student->buoi,
            'songuoi'    =>  $student->songuoi,
            'trangthai'    =>  $student->trangthai,
            'ghichu'    =>  $student->ghichu,
        );
        echo json_encode($output);
    }
    public function xoakhachdatban(Request $request)
    {
        $student = Khachdatban::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
//KHÔNG DÙNG NỮA
    // Danh sách nhân viên
    // public function nhanvien()
    // {   
    //     $iduser = intval(Auth::User()->quyen);
    //     $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
    //     $nhanvien= nhanvien::paginate(10);
    //     return view('nhanvien',['nhanvien'=>$nhanvien,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
        
    // }
    // Thêm nhân viên
    // public function getthemnv()
    // {
    //     return view('themnv');
    // }
    // public function postthemnv(Request $request)
    // {
    //     $this->validate($request,[
    //         'Ten'=>'required|min:3'
    //         ],[
    //         'Ten.required'=>'Vui lòng nhập tên',
    //         'Ten.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
    //         ]);
    // $nhanvien = new nhanvien;
    // $nhanvien->Ten= $request->Ten;
    // $nhanvien->SDT= $request->SDT;
    // $nhanvien->Vaitro= $request->Vaitro;
    // $nhanvien->DiaChi= $request->DiaChi;
    // $nhanvien->Ngaysinh= $request->NgaySinh;
    // $nhanvien->save();

    // return redirect('themnv')->with('thongbao','Thêm thành công');
    // }
    // Sửa nhân viên
    // public function getsuanv($id)
    // {
    //     $nhanvien= nhanvien::find($id);
    //     return view('suanv',['nhanvien'=>$nhanvien]);
    // }
    // public function postsuanv(Request $request,$id)
    // {
    //     $this->validate($request,[
    //         'Ten'=>'required'
    //         ],[
    //         'Ten'=>'Vui lòng nhập tên',
            
    //         ]);
    // $nhanvien = nhanvien::find($id);
    // $nhanvien->ma= $request->ma;
    // $nhanvien->Ten= $request->Ten;
    // $nhanvien->SDT= $request->SDT;
    // $nhanvien->Vaitro= $request->Vaitro;
    // $nhanvien->DiaChi= $request->DiaChi;
    // $nhanvien->Ngaysinh= $request->Ngaysinh;
    // $nhanvien->save();
    // return redirect()->back()->with('thongbao','Sửa thành công');
    // }
    // Xóa nhân viên
    // public function getxoanv($id)
    // {
    //     $nhanvien = nhanvien::find($id);
    //     $nhanvien->delete();

    //     return redirect('nhanvien')-> with('thongbao','Bạn đã xóa thành công');
    // }
//HÀNG HÓA
// Hàng hóa
    public function hanghoa()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $hanghoa= hanghoa::groupBy(['id'],['ma'])->get();
        return view('hanghoa',['hanghoa'=>$hanghoa,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }
   
// Thêm hàng hóa
    public function getthemhh()
    {
        return view('themhh');
    }
    public function postthemhh(Request $request)
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
    public function getsuahh($id)
    {
        $hanghoa= hanghoa::find($id);
        return view('suahh',['hanghoa'=>$hanghoa]);
    }
    public function postsuahh(Request $request,$id)
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
    public function getxoahh($id)
    {
        $hanghoa = hanghoa::find($id);
        $hanghoa->delete();

        echo"<script>
        alert('Xóa hàng hóa thành công!');
        window.location = ' ".url('hanghoa')."'
        </script>";
    }
//BÌNH LUẬN
//Bình luận
    public function binhluan()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $hanghoa= Review::all();
        return view('binhluan',['hanghoa'=>$hanghoa,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }
// Xóa bình luận
    public function getxoabinhluan($id)
    {
        $hanghoa = Review::find($id);
        $hanghoa->delete();
        echo"<script>
        alert('Xóa thành công!');
        window.location = ' ".url('binhluan')."'
        </script>";
    }
//CƠ SỞ KHÁC
//Danh sách cơ sở
    public function coso()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $coso= cuahang::all();
        return view('coso',['coso'=>$coso,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }
// Thêm cơ sở
    public function getthemcs()
    {
        return view('themcs');
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
    $coso->hienthi = $request->hienthi;
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
        return view('suacs',['coso'=>$coso]);
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
    $coso->hienthi= $request->hienthi;
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
//TIN TỨC
// Danh sách tin tức
    public function tintuc()
    {
        $tintuc= tintuc::all();
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        return view('tintuc',compact('iduser','xem_ac','tintuc'));
    }
// Thêm tin tức
    public function getthemtintuc()
    {
        return view('themtintuc');
    }
    public function postthemtintuc(Request $request)
    {
        $this->validate($request,[
            'tieude'=>'required|min:3',
            'noidung'=>'required|min:3',
            'tomtat'=>'required|min:3'
            ],[
            'tieude.required'=>'Vui lòng nhập',
            'tieude.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
            'noidung.required'=>'Vui lòng nhập',
            'noidung.min'=>'Nội dung phải có ít nhất 3 kí tự',
            'tomtat.required'=>'Vui lòng nhập',
            'tomtat.min'=>'Tóm tắt phải có ít nhất 3 kí tự'
            ]);
    $filename = $request->hinh->getClientOriginalName();
    $tintuc = new tintuc;
    $tintuc->tieude = $request->tieude;
    $tintuc->tomtat= $request->tomtat;
    $tintuc->noidung= $request->noidung;
    $tintuc->noibat= $request->top;
    $tintuc->soluotxem= 0;
    $tintuc->hinh = $filename;
    $tintuc->save();
    $request->hinh->storeAs('/online/images',$filename);
    echo"<script>
    alert('Thêm thành công!');
    window.location = ' ".url('tintuc')."'
    </script>";
    } 
//Sửa tin tức
    public function getsuatintuc($id)
    {
        $tintuc= tintuc::find($id);
        return view('suatintuc',compact('tintuc'));
    }
    public function postsuatintuc(Request $request,$id)
    {
    $tintuc = tintuc::find($id);
    $this->validate($request,[
        'tieude'=>'required|min:3',
        'noidung'=>'required|min:3',
        'tomtat'=>'required|min:3'
        ],[
        'tieude.required'=>'Vui lòng nhập',
        'tieude.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
        'noidung.required'=>'Vui lòng nhập',
        'noidung.min'=>'Nội dung phải có ít nhất 3 kí tự',
        'tomtat.required'=>'Vui lòng nhập',
        'tomtat.min'=>'Tóm tắt phải có ít nhất 3 kí tự'
        ]);
        $tintuc->tieude = $request->tieude;
        $tintuc->tomtat= $request->tomtat;
        $tintuc->noidung= $request->noidung;
        if($request->hasFile('hinh'))
        {
        $file= $request->file('hinh');
        $name=$file->getClientOriginalName();
        $file->move("online/images",$name);
        $tintuc->hinh= $name;
        }
    $tintuc->save();        
    echo"<script>
    alert('Sửa thành công!');
    window.location = ' ".url('tintuc')."'
    </script>";
    }
//Xóa tin tức
    public function getxoatintuc($id)
    {
        $tintuc = tintuc::find($id);
        $tintuc->delete();
        echo"<script>
    alert('Xóa thành công!');
    window.location = ' ".url('tintuc')."'
    </script>";
    }
//HÓA ĐƠN
// Hóa đơn bán
    public function hoadonban()
    {
    $hoadonban= hdban::all();
    return view('hoadonban',compact('hoadonban'));
    }
// Hóa đơn bán online
    public function hoadonbanonline()
    {
    $hoadonban= bill::all();
    return view('hoadonbanonline',compact('hoadonban'));
    }
// Hóa đơn bán ngày
    public function hdbanngay(Request $request)
    {   
        $product = hdban::where('Ngay','=',$request->Ngay)->get();
        return view('hdbanngay',['product'=>$product]);
    }
// Hóa đơn bán online ngày
    public function hdbanonlinengay(Request $request)
    {   
        $product = bill::where('ngay','=',$request->ngay)->get();
        return view('hdbanonlinengay',['product'=>$product]);
    }
//CHI TIẾT HÓA ĐƠN
//Chi tiết hóa đơn bán
    public function cthdban($id)
    {
    $monan= monan::where('spdg',0)->get();
    $hoadonban= hdban::all();
    $hoadonban= hdban::find($id);
    $cthdban= cthdban::where('id_hoadonban', '=',$id)->get();
    return view('cthdban',['cthdban'=>$cthdban,'hoadonban'=>$hoadonban,'monan'=>$monan]);
    }
//Thêm món ăn vào hóa đơn
    public function postcthdban(Request $request, $id)
    {
        $monan= monan::all();
        $monan = monan::where('id',$request->id_monan)->get();
        $tenmonan= $request->id_monan;
       
        $dongia= $monan[0]->dongia;
        $cthdban = new cthdban;
        $cthdban->id_hoadonban= $request->id_hoadonban;
        $cthdban->id_monan= $request->id_monan;
        $cthdban->SoLuong= $request->SoLuong;
        $soluong= $request->SoLuong;

        $cthdban->Dongia = $dongia;
        $cthdban->TongTien = $soluong * $dongia;
        $cthdban ->Ngay = date('Y-m-d'); 

        $thanhtien = $request->ThanhTien;
        $tong = $thanhtien + $soluong * $dongia;
       
        $hdban= hdban::all();
        $hdban = $request->id_hoadonban;
        DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
            ->where('hdban.id',$hdban)
            ->update(['ThanhTien' => $tong]);                

        $cthdban->save();  
        
        return back();
    }

//Sửa chi tiết hóa đơn
    public function getsuacthdban($id)
    {
        $cthdban= cthdban::find($id);
        return view('suacthdban',compact('cthdban'));
    }
    public function postsuacthdban(Request $request,$id)
    {
    $cthdban = cthdban::find($id);
    $soluong= $request->SoLuong;
    if($soluong!=0){
    $dongia= $request->Dongia;
    $tong= $soluong * $dongia;
    DB::table('cthdban')->where('cthdban.id',$id)
    ->update(['TongTien'=> $tong]);
    DB::table('cthdban')->where('cthdban.id',$id)
    ->update(['SoLuong'=> $soluong]);

    $tongtien = $request->TongTien;
    $total= $request->ThanhTien;
    $sum= $total - $tongtien + $soluong * $dongia ;
    $hdban= hdban::all();
    $hdban = $request->id_hoadon;

    DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
        ->where('hdban.id',$hdban)
        ->update(['ThanhTien' => $sum]);   

    return redirect('hoadonban');
    }
    else{
        return redirect()->back()->with('thongbao','Số lượng không thể bằng 0!');
    }
    }
// Xóa chi tiết hóa đơn
    public function getxoacthdban($id)
    {
    $cthdban= cthdban::find($id)->get();
    $id_hoadonban = cthdban::find($id)->id_hoadonban;
    $cthdb= cthdban::find($id);
    $tongtien= $cthdb->TongTien;
    $thanhtien=  DB::table('cthdban')
                ->where('cthdban.id_hoadonban',$id_hoadonban)
                ->sum('TongTien');  
                
    $tong= $thanhtien - $tongtien;
    $dem=DB::table('cthdban')
    ->where('cthdban.id_hoadonban',$id_hoadonban)
    ->count('id_hoadonban');

    if($dem ==1){
    return redirect()->back();
    }
    else{
        DB::table('hdban')->join('cthdban', 'hdban.id','=','cthdban.id_hoadonban')
        ->where('hdban.id',$id_hoadonban)
        ->update(['ThanhTien' => $tong]); 
        $cthdb->delete();
    }
    return back();
    }
// Xóa hóa đơn
    public function getxoahdban($id)
    {
        $hdban = hdban::find($id);
        $cthdban= cthdban::where('id_hoadonban', '=',$id);
        $hdban-> delete();
        $cthdban-> delete();
        return back();
    }
//Thanh toán offline
    public function getthanhtoanoff($id)
    {
    $monan= monan::where('spdg',0)->get();
    $hoadonban= hdban::all();
    $hoadonban= hdban::find($id);
    $cthdban= cthdban::where('id_hoadonban', '=',$id)->get();
    return view('thanhtoanoff',['cthdban'=>$cthdban,'hoadonban'=>$hoadonban,'monan'=>$monan]);
    }
    public function postthanhtoanoff(Request $request,$id)
    {
        $hdban = $request->id_hoadonban;
        $khachtra= $request->Khachtra;
        $tongtien = $request->ThanhTien;
        $tralai = $khachtra -  $tongtien;
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['Khachtra' => $khachtra]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['Tralai' => $tralai]);
        DB::table('hdban')
            ->where('hdban.id',$hdban)
            ->update(['trangthai' => 1]);
        return redirect('hoadonban');
    }
//Chi tiết hóa đơn bán online
    public function cthdbanonline($id)
    {
    $monan= monan::all();
    $hoadonban= bill::all();
    $hoadonban= bill::find($id);
    $cthdban= billdetail::where('id_bill', '=',$id)->get();
    return view('cthdbanonline',['cthdban'=>$cthdban,'hoadonban'=>$hoadonban,'monan'=>$monan]);
    }
//Doanh thu
    public function doanhthu()
    {
    $total = DB::table('cthdban')->sum('TongTien');
    $tra =DB::table('cthdban')->whereBetween('id_monan',[35,36])
    ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(TongTien) as DT'))
    ->groupBy('date')
    ->get();
    $cthdban= cthdban::all();
    $dtmonan =DB::table('cthdban')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(TongTien) as DT'))
      ->groupBy('date')
      ->get();
    $dtthang =DB::table('cthdban')
      ->select(DB::raw('MONTH(created_at) as date'), DB::raw('SUM(TongTien) as DT'))
      ->groupBy('date')
      ->get();
    $dtnam =DB::table('cthdban')
      ->select(DB::raw('YEAR(created_at) as date'), DB::raw('SUM(TongTien) as DT'))
      ->groupBy('date')
      ->get();
    return view('doanhthu',compact('total','cthdban','dtmonan','dtthang','dtnam','tra','dthanghoa'));
    }

//Doanh thu ngày
    public function doanhthungay(Request $request)
    {   
        $total = DB::table('cthdban')->where('Ngay','=',$request->Ngay)->sum('TongTien');
        $dthanghoa = cthdban::where('Ngay','=',$request->Ngay)->select('id_monan',DB::raw('SUM(TongTien) as TT'),DB::raw('SUM(SoLuong) as SL'))->groupBy('id_monan')->get();
        return view('doanhthungay',compact('total','dthanghoa'));
    }
//Excel doanh thu ngày
    public function exceldoanhthungay(Request $request)
    {
        $total = DB::table('cthdban')->where('Ngay','=',$request->Ngay)->sum('TongTien');
        $dthanghoa = cthdban::where('Ngay','=',date("Y-m-d"))->select('id_monan',DB::raw('SUM(TongTien) as TT'),DB::raw('SUM(SoLuong) as SL'))->groupBy('id_monan')->get();
        $hang_array[]= array('Tên','Số lượng bán','Thành tiền');
        foreach($dthanghoa as $hang)
        {
            $hang_array[] = array(
            'Tên'=>$hang->monan->Ten,
            'Số lượng bán'=>$hang->SL,
            'Thành tiền'=>$hang->TT);
        }
        $time= date("Y-m-d",time()).'_Doanhthungay';
        Excel::create($time, function($excel) use ($hang_array)
        {
        $excel->setTitle('Doanhthungay');
        $excel->sheet('Doanhthungay',function($sheet) use ($hang_array)
        {
            $sheet->fromArray($hang_array,null,'A1',false,false);
            $sheet->setStyle(array(
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  false
                )
            )
                );
                $sheet->cell('A1:C1', function($cell) {

                    // Set black background
                    $cell->setBackground('#66CCFF');
            
                    // Set font
                    $cell->setFont([
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  false
                    ]);
            
                    // Set all borders (top, right, bottom, left)
                    $cell->setBorder('solid', 'solid', 'solid', 'solid');
            
                });
                $sheet->cell('A2:A26', function($cell) {

                   
                });
         
        });
        })  ->download('xlsx');
    }
//Doanh thu online
    public function doanhthuonline()
    {
    $total = DB::table('billdetail')->sum('thanhtien');
    $tra =DB::table('billdetail')->whereBetween('id_product',[35,36])
    ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(thanhtien) as DT'))
    ->groupBy('date')
    ->get();
    $cthdban= billdetail::all();
    $dtmonan =DB::table('billdetail')
    ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(thanhtien) as DT'))
    ->groupBy('date')
    ->get();
    $dtthang =DB::table('billdetail')
    ->select(DB::raw('MONTH(created_at) as date'), DB::raw('SUM(thanhtien) as DT'))
    ->groupBy('date')
    ->get();
    $dtnam =DB::table('billdetail')
    ->select(DB::raw('YEAR(created_at) as date'), DB::raw('SUM(thanhtien) as DT'))
    ->groupBy('date')
    ->get();
    return view('doanhthuonline',compact('total','cthdban','dtmonan','dtthang','dtnam','tra','dthanghoa'));
    }

//Doanh thu online ngày
    public function doanhthuonlinengay(Request $request)
    {   
        $total = DB::table('billdetail')->where('Ngay','=',$request->Ngay)->sum('thanhtien');
        $dthanghoa = billdetail::where('Ngay','=',$request->Ngay)->select('id_product',DB::raw('SUM(thanhtien) as TT'),DB::raw('SUM(soluong) as SL'))->groupBy('id_product')->get();
        return view('doanhthuonlinengay',compact('total','dthanghoa'));
    }
//Excel doanh thu online ngày
    public function exceldoanhthuonlinengay(Request $request)
    {
        $total = DB::table('billdetail')->where('Ngay','=',$request->Ngay)->sum('thanhtien');
        $dthanghoa = billdetail::where('Ngay','=',date("Y-m-d"))->select('id_product',DB::raw('SUM(thanhtien) as TT'),DB::raw('SUM(soluong) as SL'))->groupBy('id_product')->get();
        $hang_array[]= array('Tên','Số lượng bán','Thành tiền');
        foreach($dthanghoa as $hang)
        {
            $hang_array[] = array(
            'Tên'=>$hang->monan->Ten,
            'Số lượng bán'=>$hang->SL,
            'Thành tiền'=>$hang->TT);
        }
        $time= date("Y-m-d",time()).'_Doanhthuonlinengay';
        Excel::create($time, function($excel) use ($hang_array)
        {
        $excel->setTitle('Doanhthuonlinengay');
        $excel->sheet('Doanhthuonlinengay',function($sheet) use ($hang_array)
        {
            $sheet->fromArray($hang_array,null,'A1',false,false);
            $sheet->setStyle(array(
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  false
                )
            )
                );
                $sheet->cell('A1:C1', function($cell) {

                    // Set black background
                    $cell->setBackground('#66CCFF');
            
                    // Set font
                    $cell->setFont([
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  false
                    ]);
            
                    // Set all borders (top, right, bottom, left)
                    $cell->setBorder('solid', 'solid', 'solid', 'solid');
            
                });
                $sheet->cell('A2:A26', function($cell) {

                
                });
        
        });
        })  ->download('xlsx');
    }
//Menu
    public function homie()
    {
    $monan= monan::where('spdg',0)->get();
    return view('homie',['monan'=>$monan]);
    }

// Giỏ hàng 1
    public function giohang()
    {
    return view('giohang1');
    }
// Giỏ hàng
    public function getgiohang()
    {
    return view('giohang');
    }
//Post giỏ hàng 
    public function posgiohang(Request $request)
    {   
        $cart = session()->get('cart');
        $bill = new hdban; 
        $bill ->Ngay = date('Y-m-d'); 
        $user = User::all();
        $bill->id_nhanvien = Auth::user()->id;
        $bill->SoBan = $request->SoBan;
        $bill->ThanhTien=0; 
        $bill->Khachtra=0;
        $bill->Tralai=0;   
        $bill->save(); 
        $totally = 0;    
        foreach($cart as $key => $value) 
        {
            $bill_detail = new cthdban;
            $bill_detail->id_hoadonban = $bill->id;
            $bill_detail->id_monan = $key;
            $bill_detail ->Ngay = date('Y-m-d'); 
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->Dongia = $value['price'];
            $bill_detail->TongTien = ($value['price']*$value['quantity']);
            $totally += $bill_detail->TongTien;
            $bill_detail->save();
        }
        $total = hdban::find($bill->id);
        $total->ThanhTien = $totally;
        $total->save();
    session()->forget('cart');
    return redirect('dathangthanhcong');

    }
//Xử lí thanh toán
    public function xuli($id)
        {   
            $product = hdban::find($id);
            $product->trangthai =1;
            $product->save();
            return redirect()->back()->with('success','Đã thanh toán');                        
        }
        public function trangthai($id)
        {   
            $product = bill::find($id);
            $product->trangthai =1;
            $product->save();
            return redirect()->back()->with('success','Đã thanh toán');                        
        }
//Thêm giỏ hàng
    public function themgiohang($id)
    {
        $product = monan::find($id);

        if(!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
            $id => [
                    "name" => $product->Ten,
                    "quantity" => 1,
                    "DVTinh"=> $product->DVTinh,
                    "price"=> $product->dongia,
                    "id_monan"=> $product->id_monan
                    ]
                ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
        } 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('thongbao', 'Đã thêm!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Ten,
            "quantity" => 1,
            "DVTinh"=> $product->DVTinh,
            "price"=> $product->dongia,
            "id_monan"=> $product->id_monan
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
    }
//cập nhật giỏ hàng và xóa giỏ hàng
    public function updategiohang(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function removegiohang(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            
        }
    }

//Post giỏ hàng 1
    public function postgiohang(Request $request)
    {   
        $cart = Session::get('cart');
        $bill = new hdban;
        $bill ->Ngay = date('Y-m-d'); 
        $user = User::all();
        $bill->id_nhanvien = Auth::user()->id;
        $bill->SoBan = $request->SoBan;
        $bill ->ThanhTien = $cart->totalPrice;                 
        $bill->save();
        foreach($cart->items as $key => $value) 
        {
            $bill_detail = new cthdban;
            $bill_detail->id_hoadonban = $bill->id;
            $bill_detail->id_monan = $key;
            $bill_detail ->Ngay = date('Y-m-d'); 
            $bill_detail->SoLuong = $value['qty'];
            $bill_detail->Dongia = ($value['price']/$value['qty']);
            $bill_detail->TongTien = ($value['price']);
            $bill_detail->save();
        }
    Session::forget('cart');
    return redirect('dathangthanhcong');

    }

//Thêm món ăn vào giỏ hàng
    public function getAddtoCart( Request $request,$id)
    {   
        $product = monan::find($id);
        $oldCart= Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

//Thêm 1 phần
    public function getAddCart( Request $request,$id)
    {
        $product = monan::find($id);
        $oldCart= Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
//cập nhật giỏ hàng
    public function getManyAddCart(Request $request,$id){
        $product = monan::find($id);
        $oldCart= Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addmany($product,$request->old, $request->sl,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
//Xóa hết
    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart -> items)>0){
            Session::put('cart',$cart);
        return redirect()->back();
        }
        
        else{
            Session::forget('cart');
        return redirect('giohangtrong');
        }        
        
    }
//Giỏ hàng trống
    public function giohangtrong()
    {
    return view('giohangtrong');  
    }
//Đặt hàng thành công
    public function dathangthanhcong()
    {
    return view('dathangthanhcong');  
    }
//Xóa 1 phần
    public function getDelCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart -> items)>0){
            Session::put('cart',$cart);
        return redirect()->back();
        }
        else{
            Session::forget('cart');
        return redirect('homie');
        }        
        
    }
//Tìm kiếm
    public function search(Request $request)
    {
        $product = monan::where('ma','like','%'.$request->key.'%')->get();

        return view('search',compact('product'));
    }
//Tìm kiếm doanh thu
    public function searchdoanhthu(Request $request)
    {
        $product = cthdban::where('id_monan','like',$request->key)->get();
        return view('searchdoanhthu',compact('product'));
    }


























    

 
    
    




    

//updateCart and remove
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
            
        }
    }

   























//KHÔNG DÙNG NỮA
//Thêm hàng hóa vào giỏ hàng hóa
    public function nhaphang( Request $request,$id)
    {   
        $product = hanghoa::find($id);
        $oldCarttt= Session('carttt')?Session::get('carttt'):null;
        $carttt = new Cart($oldCarttt);
        $carttt->add($product,$id);
        $request->session()->put('carttt',$carttt);
        return redirect()->back();
    }
//Thêm 1 phần
    public function nhap1phan( Request $request,$id)
    {
        $product = hanghoa::find($id);
        $oldCarttt= Session('carttt')?Session::get('carttt'):null;
        $carttt = new Cart($oldCarttt);
        $carttt->add($product,$id);
        $request->session()->put('carttt',$carttt);
        return redirect()->back();
    }
//Xóa giỏ hàng hóa
    public function xoagiohanghoa($id)
    {
        $oldCarttt = Session::has('carttt')?Session::get('carttt'):null;
        $carttt = new Cart($oldCarttt);
        $carttt->removeItem($id);
        if(count($carttt ->items)>0){
            Session::put('carttt',$carttt);
        return redirect()->back();
        }
        
        else{
            Session::forget('carttt');
        return redirect('giohanghoatrong');
        }        
        
    }
//Xóa 1 phần
    public function xoa1phanhh($id)
    {
        $oldCarttt = Session::has('carttt')?Session::get('carttt'):null;
        $carttt = new Cart($oldCarttt);
        $carttt->reduceByOne($id);
        if(count($carttt -> items)>0){
            Session::put('carttt',$carttt);
        return redirect()->back();
        }
        else{
            Session::forget('carttt');
        return redirect('homiee');
        }        
        
    }
//Xóa 1 phần
    public function xoa1phanhhh($id)
    {
        $oldCarttt = Session::has('carttt')?Session::get('carttt'):null;
        $carttt = new Cart($oldCarttt);
        $carttt->reduceByOne($id);
        if(count($carttt -> items)>0){
            Session::put('carttt',$carttt);
        return redirect()->back();
        }
        else{
            Session::forget('carttt');
        return redirect('homieee');
        }        

    }

//GIỎ HÀNG, HÓA ĐƠN
//Giỏ hàng hóa trống
    public function giohanghoatrong()
    {
    return view('giohanghoatrong');  
    }
//Đặt hàng thành công
    public function themhhthanhcong()
    {
    return view('themhhthanhcong');  
    }
//Xuất hàng thành công
    public function xuathhthanhcong()
    {
    return view('xuathhthanhcong');  
    }
//Tìm kiếm hàng hóa
    public function searchhh(Request $request)
    {
        $product = hanghoa::where('ma','like','%'.$request->key.'%')->get();

        return view('searchhh',compact('product'));
    }









//Phiếu nhập
    public function phieunhap()
    {
    $phieunhap= phieunhap::all();
    return view('phieunhap',compact('phieunhap'));
    }
//Phiếu nhập ngày
    public function phieunhapngay(Request $request)
    {   
        $product = phieunhap::where('Ngay','=',$request->Ngay)->get();
        return view('phieunhapngay',['product'=>$product]);
    }




//Chi tiết phiếu nhập
    public function ctpnhap($id)
    {
    $phieunhap= phieunhap::find($id);
    $ctpnhap= ctpnhap::all();
    $ctpnhap= ctpnhap::find($id);
    $ctpnhap= ctpnhap::where('id_phieunhap','=',$id)->get();
    return view('ctpnhap',['ctpnhap'=>$ctpnhap,'phieunhap'=>$phieunhap]);
    }
//Phiếu xuất
    public function phieuxuat()
    {
    $phieuxuat= phieuxuat::all();
    return view('phieuxuat',['phieuxuat'=>$phieuxuat]);
    }
//Phiếu xuất ngày
    public function phieuxuatngay(Request $request)
    {   
        $product = phieuxuat::where('Ngay','=',$request->Ngay)->get();
        return view('phieuxuatngay',['product'=>$product]);
    }
//Chi tiết phiếu xuất
    public function ctpxuat($id)
    {
    $phieuxuat= phieuxuat::find($id);
    $ctpxuat= ctpxuat::all();
    $ctpxuat= ctpxuat::find($id);
    $ctpxuat= ctpxuat::where('id_phieuxuat','=',$id)->get();
    return view('ctpxuat',['ctpxuat'=>$ctpxuat,'phieuxuat'=>$phieuxuat]);
    }
















//Nhập hàng khô
    public function nhaphangkho()
    {
    $products= hanghoa::where('ma','like','%2%')->orwhere('ma','like','%3%')->orwhere('ma','like','%5%')->get();
    return view('nhaphangkho',compact('products'));
    }
//Nhập hàng ăn
    public function nhaphangan()
    {
        $products = hanghoa::where('ma','like','%1%')->orwhere('ma','like','%4%')->get();
 
        return view('nhaphangan', compact('products'));
    }
// Get giỏ hàng khô nhập
    public function getgiohangkhonhap()
    {
        $cuahang=cuahang::all();
    return view('giohangkhonhap',compact('cuahang'));
    }
// Post giỏ hàng khô nhập
    public function postgiohangkhonhap(Request $request)
    {   
    
    $cart = session()->get('cart');
    $bill = new phieunhap;
    $bill->Ngay = date('Y-m-d');
    $bill->ma; 
    $user = User::all();
    $bill->id_nhanvien = Auth::user()->id;
    $bill->id_cuahang= $request->id_cuahang;     
    $bill->save();
    
    foreach ($cart as $key => $value) {
        $hanghoa = hanghoa::find($key);
        $hanghoa->Nhap += $value['quantity'];
        $hanghoa->SoLuong += $value['quantity'];
        $hanghoa->save();
    }                                      
    foreach($cart as $key => $value) 
        {
        $bill_detail = new ctpnhap;
        $bill_detail->id_phieunhap = $bill->id;
        $bill_detail->id_hanghoa = $key;
        $bill_detail->SoLuong = $value['quantity'];
        $bill_detail->save();
        }
    session()->forget('cart');
    return redirect('themhhthanhcong');
    }
//Get giỏ hàng ăn nhập
    public function getgiohangannhap()
    {
        $cuahang=cuahang::all();
        return view('giohangannhap',compact('cuahang'));
    }
//Post giỏ hàng ăn nhập
    public function postgiohangannhap(Request $request)
    {   
        $cart = session()->get('cart');
        $bill = new phieunhap;
        $bill->Ngay = date('Y-m-d');
        $bill->ma; 
        $user = User::all();
        $bill->id_nhanvien = Auth::user()->id;
        $bill->id_cuahang= $request->id_cuahang;     
        $bill->save();
        foreach ($cart as $key => $value) {
            $hanghoa = hanghoa::find($key);
            $hanghoa->Nhap += $value['quantity'];
            $hanghoa->SoLuong += $value['quantity'];
            $hanghoa->save();
        }  
        foreach($cart as $key => $value) 
        {
            $bill_detail = new ctpnhap;
            $bill_detail->id_phieunhap = $bill->id;
            $bill_detail->id_hanghoa = $key;
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->save();
        }
    session()->forget('cart');
    return redirect('themhhthanhcong');

    }
//Thêm nhập hàng khô (Addtocart)
    public function themnhaphangkho($id)
    {
        $product = hanghoa::find($id);

        if(!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
        $cart = [
            $id => [
                    "name" => $product->Ten,
                    "quantity" => 1,
                    "DVTinh"=> $product->DVTinh,
                    "id_hanghoa"=> $product->id_hanghoa
                    ]
                ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
        } 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('thongbao', 'Đã thêm!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Ten,
            "quantity" => 1,
            "DVTinh"=> $product->DVTinh,
            "id_hanghoa"=> $product->id_hanghoa
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
    }
//Thêm nhập hàng ăn (Addtocart)
    public function themnhaphangan($id)
    {
        $product = hanghoa::find($id);

        if(!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
            $id => [
                    "name" => $product->Ten,
                    "quantity" => 1,
                    "DVTinh"=> $product->DVTinh,
                    "id_hanghoa"=> $product->id_hanghoa
                    ]
                ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
        } 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('thongbao', 'Đã thêm!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Ten,
            "quantity" => 1,
            "DVTinh"=> $product->DVTinh,
            "id_hanghoa"=> $product->id_hanghoa
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
    }






//Xuất hàng khô
    public function xuathangkho()
    {
    $products= hanghoa::where('ma','like','%2%')->orwhere('ma','like','%3%')->orwhere('ma','like','%5%')->get();
    return view('xuathangkho',compact('products'));
    }
//Xuất hàng ăn
    public function xuathangan()
    {
    $products = hanghoa::where('ma','like','%1%')->orwhere('ma','like','%4%')->get();
    return view('xuathangan', compact('products'));
    }
//Get giỏ hàng khô xuất
    public function getgiohangkhoxuat()
    {
        $cuahang=cuahang::all();
    return view('giohangkhoxuat',compact('cuahang'));
    }
//Post giỏ hàng khô xuất
    public function postgiohangkhoxuat(Request $request)
    {   
        $cart = session()->get('cart');
        $bill = new phieuxuat;
        $bill->Ngay = date('Y-m-d');
        $bill->ma; 
        $user = User::all();
        $bill->id_nhanvien = Auth::user()->id;
        $bill->id_cuahang= $request->id_cuahang;     
        $bill->save();
        foreach ($cart as $key => $value) {
            $hanghoa = hanghoa::find($key);
            $hanghoa->Xuat += $value['quantity'];
            $hanghoa->SoLuong -= $value['quantity'];
            $hanghoa->save();
        } 
        foreach($cart as $key => $value) 
        {
            $bill_detail = new ctpxuat;
            $bill_detail->id_phieuxuat = $bill->id;
            $bill_detail->id_hanghoa = $key;
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->save();
        }
    session()->forget('cart');
    return redirect('xuathhthanhcong');

    }
//Get giỏ hàng ăn xuất
    public function getgiohanganxuat()
    {
        $cuahang=cuahang::all();
        return view('giohanganxuat',compact('cuahang'));
    }
//Post giỏ hàng ăn xuất
    public function postgiohanganxuat(Request $request)
    {   
        $cart = session()->get('cart');
        $bill = new phieuxuat;
        $bill->Ngay = date('Y-m-d');
        $bill->ma; 
        $user = User::all();
        $bill->id_nhanvien = Auth::user()->id;
        $bill->id_cuahang= $request->id_cuahang;     
        $bill->save();
        foreach ($cart as $key => $value) {
            $hanghoa = hanghoa::find($key);
            $hanghoa->Xuat += $value['quantity'];
            $hanghoa->SoLuong -= $value['quantity'];
            $hanghoa->save();
        } 
        foreach($cart as $key => $value) 
        {
            $bill_detail = new ctpxuat;
            $bill_detail->id_phieuxuat = $bill->id;
            $bill_detail->id_hanghoa = $key;
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->save();
        }
    session()->forget('cart');
    return redirect('xuathhthanhcong');

    }
//Thêm xuất hàng khô (Addtocart)
    public function themxuathangkho($id)
    {
        $product = hanghoa::find($id);

        if(!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
        $cart = [
            $id => [
                    "name" => $product->Ten,
                    "quantity" => 1,
                    "DVTinh"=> $product->DVTinh,
                    "id_hanghoa"=> $product->id_hanghoa
                    ]
                ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
        } 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('thongbao', 'Đã thêm!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Ten,
            "quantity" => 1,
            "DVTinh"=> $product->DVTinh,
            "id_hanghoa"=> $product->id_hanghoa
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
    }
//Thêm xuất hàng ăn (Addtocart)
    public function themxuathangan($id)
    {
        $product = hanghoa::find($id);

        if(!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
            $id => [
                    "name" => $product->Ten,
                    "quantity" => 1,
                    "DVTinh"=> $product->DVTinh,
                    "id_hanghoa"=> $product->id_hanghoa
                    ]
                ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
        } 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('thongbao', 'Đã thêm!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Ten,
            "quantity" => 1,
            "DVTinh"=> $product->DVTinh,
            "id_hanghoa"=> $product->id_hanghoa
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Đã thêm!');
    }

//Hàng bán
    public function hangban()
    {
        $hang=hanghoa::where('ma','like','%1%')->orwhere('ma','like','%3%')->orwhere('ma','like','%5%')->orwhere('ma','like','%4%')->orwhere('ma','like','%6%')->get();
        return view('hangban',compact('hang'));
    }
//Cập nhật hàng bán
    public function capnhat()
    {
        $hanghoa=hanghoa::all();
        foreach ($hanghoa as $hanghoa) {
            // $hanghoa->SoLuong=0;
            $hanghoa->Ton=0;
            $hanghoa->Nhap=0;
            $hanghoa->Xuat=0;
            $hanghoa->Huy=0;
            $hanghoa->TonDC= $hanghoa->DeLai;
            $hanghoa->SoLuong= $hanghoa->DeLai;
            $hanghoa->DeLai=0;
            $hanghoa->ThanhTien=0;
            $hanghoa->update();
        }
        
        return redirect()->back()->with('thongbao', 'Đã cập nhật!');

    
    }
    public function capnhatkhac(Request $request, $id){
        $monan = monan::find($id);
        
    }
//Excel bán
    public function excel()
    {
        $hang_data=DB::table('hanghoa')->where('ma','like','%1%')->orwhere('ma','like','%3%')->orwhere('ma','like','%5%')->orwhere('ma','like','%4%')->orwhere('ma','like','%6%')->get()->toArray();
        $hang_array[]= array('MãHH','Tên','Tồn ĐC','Nhập','Xuất','Số lượng bán','Tồn CC','Hủy','Để lại','ĐV tính','Đơn giá','Thành tiền');
        foreach($hang_data as $hang)
        {
            $hang_array[] = array(
            'MãHH'=>$hang->ma,
            'Tên'=>$hang->Ten,
            'Tồn ĐC'=>$hang->TonDC,
            'Nhập'=>$hang->Nhap,
            'Xuất'=>$hang->Xuat,
            'Số lượng bán'=>$hang->SoLuong,
            'Tồn CC'=>$hang->Ton,
            'Hủy'=>$hang->Huy,
            'Để lại'=>$hang->DeLai,
            'ĐV tính'=>$hang->DVTinh,
            'Đơn giá'=>$hang->DonGia,'Thành tiền'=>$hang->ThanhTien);
        }
        $time= date("Y-m-d",time()).'_Hangban';
        Excel::create($time, function($excel) use ($hang_array)
        {
        $excel->setTitle('Hangban');
        $excel->sheet('Hangban',function($sheet) use ($hang_array)
        {
            $sheet->fromArray($hang_array,null,'A1',false,false);
            $sheet->setStyle(array(
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  false
                )
            )
                );
                $sheet->cell('A1:L1', function($cell) {

                    // Set black background
                    $cell->setBackground('#66CCFF');
            
                    // Set font
                    $cell->setFont([
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  false
                    ]);
            
                    // Set all borders (top, right, bottom, left)
                    $cell->setBorder('solid', 'solid', 'solid', 'solid');
            
                });
                $sheet->cell('A2:A26', function($cell) {

                    // Set black background
                    $cell->setBackground('#FF9900');
                });
         
        });
        })  ->download('xlsx');
    }
//Hàng khô
    public function hangkho()
    {
        $hang=hanghoa::where('ma','like','%2%')->orwhere('ma','like','%3%')->orwhere('ma','like','%5%')->get();
        return view('hangkho',compact('hang'));
    }
//Excel khô
    public function excelkho()
    {
        $hang_data=DB::table('hanghoa')->where('ma','like','%2%')->orwhere('ma','like','%3%')->orwhere('ma','like','%5%')->get()->toArray();
        $hang_array[]= array('MãHH','Tên','Tồn ĐT','Nhập','Xuất','Số lượng dùng','Tồn CT','Hủy','Còn lại','ĐV tính');
        foreach($hang_data as $hang)
        {
            $hang_array[] = array(
                'MãHH'=>$hang->ma,
                'Tên'=>$hang->Ten,
                'Tồn ĐT'=>$hang->TonDC,
                'Nhập'=>$hang->Nhap,
                'Xuất'=>$hang->Xuat,
                'Số lượng dùng'=>$hang->SoLuong,
                'Tồn CT'=>$hang->Ton,
                'Hủy'=>$hang->Huy,
                'Còn lại'=>$hang->DeLai,'ĐV tính'=>$hang->DVTinh);
        }
        $time= date("Y-m-d",time()).'_Hangkho';
        Excel::create($time, function($excel) use ($hang_array)
        {
        $excel->setTitle('Hangkho');
        $excel->sheet('Hangkho',function($sheet) use ($hang_array)
        {
            $sheet->fromArray($hang_array,null,'A1',false,false);
            $sheet->setStyle(array(
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  false,
                    'borders'    =>  true
                )
            )
                );
                $sheet->cell('A1:J1', function($cell) {

                    // Set black background
                    $cell->setBackground('#66CCFF');
            
                    // Set font
                    $cell->setFont([
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  false,
                        'borders'    =>  true
                    ]);
            
                    // Set all borders (top, right, bottom, left)
                    $cell->setBorder('solid', 'solid', 'solid', 'solid');
            
                });
                $sheet->cell('A2:A34', function($cell) {

                    // Set black background
                    $cell->setBackground('#FF9900');
                });
        
        });
        })  ->download('xlsx');
    }

//Báo cáo hàng tồn 
    public function baocaohangton()
    {
    $products= hanghoa::all();
    return view('baocaohangton',compact('products'));
    }
//Get giỏ báo cáo hàng tồn
    public function getgiobchangton()
    {
    return view('giobchangton');
    }
//Post giỏ báo cáo hàng tồn
    public function postgiobchangton()
    {   
        $cart = session()->get('cart');
        foreach ($cart as $key => $value) {
            $hanghoa = hanghoa::find($key);
            $hanghoa->Ngay = date('Y-m-d');
            $hanghoa->SoLuong -= $value['quantity'];
            $hanghoa->Ton += $value['quantity'];
            $hanghoa->DeLai += $value['quantity'];
            $hanghoa->save();
        } 
    session()->forget('cart');
    return redirect('xuathhthanhcong');

    }
//Thêm báo cáo hàng tồn (Addtocart)
    public function thembaocaohangton($id)
    {
        $product = hanghoa::find($id);

        if(!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
        $cart = [
            $id => [
                    "name" => $product->Ten,
                    "quantity" => 1,
                    "DVTinh"=> $product->DVTinh,
                    "id_hanghoa"=> $product->id_hanghoa
                    ]
                ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Thành công!');
        } 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('thongbao', 'Thành công!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Ten,
            "quantity" => 1,
            "DVTinh"=> $product->DVTinh,
            "id_hanghoa"=> $product->id_hanghoa
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Thành công!');
    }



//Báo cáo hàng tồn đầu ca
    public function baocaohangtondc()
    {
    $products= hanghoa::all();
    return view('baocaohangtondc',compact('products'));
    }
//Get giỏ báo cáo hàng tồn đầu ca
    public function getgiobchangtondc()
    {
    return view('giobchangtondc');
    }
//Post giỏ báo cáo hàng tồn đầu ca
    public function postgiobchangtondc()
    {   
    $cart = session()->get('cart');
    foreach ($cart as $key => $value) {
        $hanghoa = hanghoa::find($key);
        $hanghoa->SoLuong += $value['quantity'];
        $hanghoa->TonDC += $value['quantity'];
        $hanghoa->save();
    } 
    session()->forget('cart');
    return redirect('xuathhthanhcong');

    }
//Thêm báo cáo hàng tồn đầu ca(Addtocart)
    public function thembaocaohangtondc($id)
    {
    $product = hanghoa::find($id);

    if(!$product)
    {
        abort(404);
    }
    $cart = session()->get('cart');
    // if cart is empty then this the first product
    if(!$cart) {
    $cart = [
        $id => [
                "name" => $product->Ten,
                "quantity" => 1,
                "DVTinh"=> $product->DVTinh,
                "id_hanghoa"=> $product->id_hanghoa
                ]
            ];
    session()->put('cart', $cart);
    return redirect()->back()->with('thongbao', 'Thành công!');
    } 
    // if cart not empty then check if this product exist then increment quantity
    if(isset($cart[$id])) {

        $cart[$id]['quantity']++;

        session()->put('cart', $cart);

        return redirect()->back()->with('thongbao', 'Thành công!');
    }
    // if item not exist in cart then add to cart with quantity = 1
    $cart[$id] = [
        "name" => $product->Ten,
        "quantity" => 1,
        "DVTinh"=> $product->DVTinh,
        "id_hanghoa"=> $product->id_hanghoa
    ];
    session()->put('cart', $cart);
    return redirect()->back()->with('thongbao', 'Thành công!');
    }






//Báo cáo hàng hủy
    public function baocaohanghuy()
    {
    $products= hanghoa::all();
    return view('baocaohanghuy',compact('products'));
    }
//Get giỏ báo cáo hàng hủy
    public function getgiobchanghuy()
    {
    return view('giobchanghuy');
    }
//Post giỏ báo cáo hàng hủy
    public function postgiobchanghuy()
    {   
    $cart = session()->get('cart');
    foreach ($cart as $key => $value) {
        $hanghoa = hanghoa::find($key);
        $hanghoa->Huy += $value['quantity'];
        $hanghoa->DeLai -= $value['quantity'];
        $hanghoa->save();
    } 
    session()->forget('cart');
    return redirect('xuathhthanhcong');

    }
//Thêm báo cáo hàng hủy (Addtocart)
    public function thembaocaohanghuy($id)
    {
    $product =hanghoa::find($id);

    if(!$product)
    {
        abort(404);
    }
    $cart = session()->get('cart');
    // if cart is empty then this the first product
    if(!$cart) {
    $cart = [
        $id => [
                "name" => $product->Ten,
                "quantity" => 1,
                "DVTinh"=> $product->DVTinh,
                "id_hanghoa"=> $product->id_hanghoa
                ]
            ];
    session()->put('cart', $cart);
    return redirect()->back()->with('thongbao', 'Thành công!');
    } 
    // if cart not empty then check if this product exist then increment quantity
    if(isset($cart[$id])) {

        $cart[$id]['quantity']++;

        session()->put('cart', $cart);

        return redirect()->back()->with('thongbao', 'Thành công!');
    }
    // if item not exist in cart then add to cart with quantity = 1
    $cart[$id] = [
        "name" => $product->Ten,
        "quantity" => 1,
        "DVTinh"=> $product->DVTinh,
        "id_hanghoa"=> $product->id_hanghoa
    ];
    session()->put('cart', $cart);
    return redirect()->back()->with('thongbao', 'Thành công!');
    }
//TRANG ONLINE
//Trang chủ bán hàng online
    public function index()
    {   
        $reviews= review::all();
        $user= User::all();
        $monan= monan::where('top',1)->get();  
        $monuong= monan::where('top',2)->get();
        $donggoi= monan::where('spdg',1)->get();
        return view('online.index',compact('monan','monuong','donggoi','user','reviews'));
    }
//Trang menu bán hàng online
    public function menu()
    {    
        $reviews= review::all();
        $monan= monan::whereBetween('top',[0,1])->get();  
        $monuong= monan::where('top',2)->get();
        return view('online.menu',compact('monan','monuong','reviews'));
    }
//Chi tiết sản phẩm
    public function getchitietsanpham(Request $req)
        {    
            $reviews= review::all();
            $lienquan= monan::whereBetween ('top',[0,2])->paginate(3);
            $sanpham= monan::where('id',$req->id)->first();
            return view('online.chitietsanpham',compact('sanpham','lienquan','reviews'));
        }
//Sản phẩm đóng gói
    public function sanphamdonggoi()
        {   
            $reviews= review::all();
            $sanphamdonggoi= monan::where('spdg',1)->get(); 
            return view('sanphamdonggoi.sanphamdonggoi',compact('sanphamdonggoi','reviews'));
        }
//Ruốc tôm Gia An
    public function ruoctom()
        {   
            $reviews= review::all();
            $ruoctom= monan::whereBetween('id',[60,61])->get(); 
            return view('sanphamdonggoi.ruoctom', compact('ruoctom','reviews'));
        }
//Chả tôm Gia An
    public function chatom()
        {   
            $reviews= review::all();
            $chatom= monan::whereBetween('id',[62,63])->get();
            return view('sanphamdonggoi.chatom', compact('chatom','reviews'));
        }
//Chả mực Gia An
    public function chamuc()
        {   
            $reviews= review::all();
            $chamuc= monan::whereBetween('id',[65,66])->get();
            return view('sanphamdonggoi.chamuc', compact('chamuc','reviews'));
        }
//Thịt viên Gia An
    public function thitvien()
        {   
            $reviews= review::all();
            $thitvien= monan::where('id','64')->get();
            return view('sanphamdonggoi.thitvien', compact('thitvien','reviews'));
        }
//Giới thiệu chung
    public function gioithieuchung()
        {    
            $reviews= review::all();
            return view('gioithieu.gioithieuchung',compact('reviews'));
        }
//Văn hóa Gia An
    public function vanhoagiaan()
        {    
            $reviews= review::all();
            return view('gioithieu.vanhoagiaan',compact('reviews'));
        }
//Lịch sử hình thành
    public function lichsuhinhthanh()
        {   
            $reviews= review::all();
            return view('gioithieu.lichsuhinhthanh',compact('reviews'));
        }
//Giá trị cốt lõi
    public function giatricotloi()
        {   
            $reviews= review::all();
            return view('gioithieu.giatricotloi',compact('reviews'));
        }
//Các danh hiệu
    public function cacdanhhieu()
        {
            $reviews= review::all();
            return view('gioithieu.cacdanhhieu',compact('reviews'));  
        }
//Thêm giỏ hàng online
    public function themgiohangonline($id)
        {
            $product = monan::find($id);

            if(!$product)
            {
                abort(404);
            }
            $cartt = session()->get('cartt');
            // if cart is empty then this the first product
            if(!$cartt) {
                $cartt = [
                $id => [
                        "name" => $product->Ten,
                        "image" => $product->image,
                        "quantity" => 1,
                        "DVTinh"=> $product->DVTinh,
                        "price"=> $product->dongia,
                        "khuyenmai"=> $product->khuyenmai,
                        "id_monan"=> $product->id_monan
                        ]
                    ];
            session()->put('cartt', $cartt);
            return redirect()->back()->with('thongbao', 'Đã thêm vào giỏ hàng của bạn!');
            } 
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cartt[$id])) {

                $cartt[$id]['quantity']++;

                session()->put('cartt', $cartt);

                return redirect()->back()->with('thongbao', 'Đã thêm vào giỏ hàng của bạn!');
            }
            // if item not exist in cart then add to cart with quantity = 1
            $cartt[$id] = [
                "name" => $product->Ten,
                "image" => $product->image,
                "quantity" => 1,
                "DVTinh"=> $product->DVTinh,
                "price"=> $product->dongia,
                "khuyenmai"=> $product->khuyenmai,
                "id_monan"=> $product->id_monan
            ];
            session()->put('cartt', $cartt);
            return redirect()->back()->with('thongbao', 'Đã thêm vào giỏ hàng của bạn!');
        }
// Giỏ hàng online
    public function getgiohangonline()
    {
        $reviews= review::all();
    return view('giohang.giohangonline',compact('reviews'));
    }
// Thanh toán
    public function thanhtoan()
    {
        $reviews= review::all();
    return view('giohang.thanhtoan',compact('reviews'));
    }
//Post giỏ hàng online
    public function posgiohangonline(Request $request)
        {   
            $this->validate($request,[
                'ten'=>'required|min:3',
                'sdt'=>'required|min:10',
                'diachi'=>'required|min:1'
                ],[
                'Ten.required'=>'Vui lòng nhập tên',
                'sdt.required'=>'Vui lòng nhập SĐT',
                'diachi.required'=>'Vui lòng nhập Địa chỉ',
                'Ten.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
                ]);
            $cartt = session()->get('cartt');
            // $data = $request->all();
            // $email= $request->email;
            // Mail::send('giohang.giohangonline',$data,function($message) use($email){
            // $message->from('mail.thanhngocvu2k2@gmail.com','BanhcuonGiaAn') ;   
            // $message->to($email,$email);      
            // $message ->cc('thanhngocvu2k2@gmail.com','Vũ Ngọc Thành');
            // $message->subject('Xác nhận hóa đơn mua hàng');
            // });

            $customer = new khachhang;
            $customer->ten = $request->ten;
            $customer->sdt= $request->sdt;
            $customer->email= $request->email;
            $customer->diachi= $request->diachi;
            $customer->note= $request->note;
            $customer->gioitinh= $request->gioitinh; 
            $customer->save(); 
            
            $bill = new bill;            
            $bill ->ngay = date('Y-m-d'); 
            $bill ->ten =$request->ten;
            $bill->id_khachhang= $customer->id;
            $bill->tamtinh=0;
            $bill->tongtien=0; 
            $bill->phuphi=0;              
            $bill->save(); 
            $total=0;    
            $phu=0;
            $subtotal=0;
            
            foreach($cartt as $key => $value) 
            {
                $bill_detail = new billdetail;
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->soluong = $value['quantity'];
                if($value['khuyenmai']==0){
                $bill_detail->dongia = $value['price'];
                $bill_detail->thanhtien = ($value['price']*$value['quantity']);
                }
                else{
                    $bill_detail->dongia = $value['khuyenmai'];
                    $bill_detail->thanhtien = ($value['khuyenmai']*$value['quantity']);
                }
                $subtotal += $bill_detail->thanhtien;
                if($subtotal<100){
                    $phu= number_format(0.33*(100 - $subtotal));
                    $total= $subtotal+ $phu;
                }
                else{
                    $phu= 0;
                    $total= $subtotal+ $phu;
                }
                $bill_detail->save();
            }
            $tongtien = bill::find($bill->id);
            $phuphi= bill::find($bill->id);
            $tamtinh= bill::find($bill->id);
            $tamtinh->tamtinh = $subtotal;
            $phuphi->phuphi=$phu;
            $tongtien->tongtien= $total;
            $tamtinh->save();
            $phuphi->save();
            $tongtien->save();
        session()->forget('cartt');
        // return redirect('index');
        echo"<script>
    alert('Quý khách đã mua hàng thành công');
    window.location = ' ".url('index')."'
    </script>";

        }
//cập nhật giỏ hàng và xóa giỏ hàng online
    public function updategiohangonline(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cartt = session()->get('cartt');

            $cartt[$request->id]["quantity"] = $request->quantity;

            session()->put('cartt', $cartt);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removegiohangonline(Request $request)
    {
        if($request->id) {

            $cartt = session()->get('cartt');

            if(isset($cartt[$request->id])) {

                unset($cartt[$request->id]);

                session()->put('cartt', $cartt);
            }

            session()->flash('success', 'Product removed successfully');
            
        }
    }
// Đăng nhập khách hàng:
    public function getdangnhapuser()
    {
        return view('khachhang.dangnhapuser');
    }
    public function postdangnhapuser(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập pass'
        ]);
                if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
                {
                    return redirect('index');   
                }
                else
                {
                    return redirect('index')->with('thongbao','Đăng nhập không thành công');
                }  
      
    }
// Đăng xuất khách hàng
    public function getdangxuatuser()
    {
        Auth::logout();
        return redirect('index');
    } 
// NGƯỜI DÙNG
// Danh sách người dùng
    public function nguoidung()
    {
        $iduser = intval(Auth::User()->quyen);
        $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
        $user= User::whereBetween('quyen',[0,2])->get();
        return view('User',['user'=>$user,'iduser'=>$iduser,'xem_ac'=>$xem_ac]);
    }
// Thêm người dùng
    public function getthemnguoidung()
    {
        return view('themnguoidung');
    }
    public function postthemnguoidung(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
            ],[
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
            ]);
    $user = new User;
    $user->id= $request->id;
    $user->name= $request->name;
    $user->SDT= $request->SDT;
    $user->email= $request->email;
    $user->password= bcrypt($request->password);
    $user->DiaChi= $request->DiaChi;
    $user->quyen= $request->quyen;
    $user->save();

    return redirect('themnguoidung')->with('thongbao','Thêm thành công');
    }
// Sửa người dùng
    public function getsuanguoidung($id)
    {
        $user= User::find($id);
        return view('suanguoidung',['user'=>$user]);
    }
    public function postsuanguoidung(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required'
            ],[
            'name'=>'Vui lòng nhập tên',
            
            ]);
    $user = User::find($id);
    $user->id= $request->id;
    $user->name= $request->name;
    $user->SDT= $request->SDT;
    $user->email= $request->email;
    $user->password= bcrypt($request->password);
    $user->DiaChi= $request->DiaChi;
    $user->quyen= $request->quyen;
    $user->save();
    return redirect()->back()->with('thongbao','Sửa thành công');
    }
// Xóa người dùng
    public function getxoanguoidung($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('nguoidung')-> with('thongbao','Bạn đã xóa thành công');
    }
// Đăng ký
    public function getdangkyuser()
    {
        return view('khachhang.dangkyuser');
    }
    public function postdangkyuser(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password',
            'email'=>'required|email|unique:users,email',
            ],[
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Tên của quý khách phải có ít nhất 3 kí tự',
            'email.required'=>'Vui lòng nhập Email',
            'email.email'=>'Không đúng định dạng Email',
            'email.unique'=>'Email đã được sử dụng',
            'password.requried'=>'Vui lòng nhập mật khẩu',
            're_password.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu có ít nhất 6 kí tự'
            ]);
    $user = new User;
    $user->name= $request->name;
    $user->gioitinh= $request->gioitinh; 
    $user->SDT= $request->SDT;
    $user->email= $request->email;
    $user->password= bcrypt($request->password);
    $user->DiaChi= $request->DiaChi;  
    $user->ChucVu ='Khách hàng';
    $user->quyen=2;
    $user->save();
   
    echo"<script>
    alert('Đăng ký thành công!');
    window.location = ' ".url('index')."'
    </script>";
    
    }
//Quên mật khẩu
    public function quenmatkhau(Request $request)
    {
       
        $email = $request ->remail;
        $check = User::where('email',$email)->first();
        if(!$check)
        {
            return response()->json("error_email");
        }
        else{
            $check->password = bcrypt($request->rnew_password);
           
            
            $check->save();
            return response()->json("success");
        }
    }
// Nhấp nháy
    public function nhapnhay()
    {
    return view('JSdemo.nhapnhay');
    }
// Cửa hàng
    public function cuahang()
    {
    $reviews= review::all();
    $cuahang= cuahang::where('hienthi',0)->get();
    return view('online.cuahang',compact('cuahang','reviews'));
    }
// Reviews
    public function reviews()
    {
    $reviews= review::all();
    return view('layout.reviews',compact('reviews'));
    }
    public function postreviews(Request $request)
    {
        $this->validate($request,[
            'ten'=>'required|min:3'
            ],[
            'ten.required'=>'Vui lòng nhập tên',
            'ten.min'=>'Tên nhân viên phải có ít nhất 3 kí tự'
            ]);
    $review = new review;
    $review->ten= $request->ten;
    $review->nghenghiep= $request->nghenghiep;
    $review->reviews= $request->reviews;
    $review->save();

    echo"<script>
    alert('Cám ơn Quý khách đã có lời góp ý, chúng tôi sẽ ghi nhận và tiếp tục phát triển');
    window.location = ' ".url('index')."'
    </script>";
    }
// Liên hệ
    public function lienhe()
    {
    $reviews= review::all();
    return view('online.lienhe',compact('reviews'));
    }
    public function postlienhe(Request $request)
    {
    $this->request = $request;
    $data=['hoten'=>$this->request->input('name'),'tinnhan'=>$this->request->input('message')];
    Mail::send('online.maillienhe',$data,function($msg){
    $msg->from('thuy.brightstar@gmail.com','Meo');
    $msg->to('thuy.brightstar@gmail.com','Meo')->subject('Đây là mail lời nhắn');
    });
    echo"<script>
    alert('Cám ơn Quý khách đã góp ý, chúng tôi sẽ liên hệ lại với Quý khách trong thời gian sớm nhất');
    window.location = ' ".url('lienhe')."'
    </script>";
    }
// Tin tức
    public function blog()
    {
    $tintuc= tintuc::all();
    $reviews= review::all();
    return view('online.blog',compact('reviews','tintuc'));
    }
    public function blogdetail($id)
    {
    $moinhat = DB::table('tintuc')->orderBy('updated_at','DESC')->skip(0)->take(4)->get();
    $tintuc= tintuc::find($id);
    $reviews= review::all();
    return view('online.blogdetail',compact('reviews','tintuc','moinhat'));
    }
//Đặt bàn
    public function getdatban()
    {
        return view('online.datban');
    }
    public function postdatban(Request $request)
    {
        $this->validate($request,[
            'ten'=>'required|min:3',
            'sdt'=>'required',
            'songuoi'=>'required',
            'thoigian'=>'required',
            'gio'=>'required',
            ],[
            'ten.required'=>'Vui lòng nhập tên quý khách',
            'sdt.required'=>'Vui lòng nhập số điện thoại',
            'songuoi.requried'=>'Vui lòng nhập số người',
            'thoigian.requried'=>'Vui lòng nhập ngày',
            'gio.requried'=>'Vui lòng nhập giờ giấc'
            ]);
    $user = new Khachdatban;
    $user->ten= $request->ten;
    $user->sdt= $request->sdt; 
    $user->id_cuahang= $request->id_cuahang;
    $user->thoigian= $request->thoigian;
    $user->gio= $request->gio;
    $user->buoi= $request->buoi;
    $user->songuoi= $request->songuoi;
    $user->trangthai= 'chưa liên hệ';
    $user->ghichu= $request->ghichu;
    $user->save();
   
    echo"<script>
    alert('Đặt bàn thành công! Chúng tôi sẽ liên hệ với quý khách theo số điện thoại trên');
    window.location = ' ".url('index')."'
    </script>";
    
    }
    public function nhanviencuahang()
    {
        return view('online.nhanviencuahang');
    }
}

   






 