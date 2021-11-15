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
use App\Cartt;
use Carbon\Carbon;
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
        return view('admin.dangnhap');
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

// TRANG CHỦ 
    public function trangchu()
    {   
        $dtngay =DB::table('cthdban')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(TongTien) as DT'))
      ->groupBy('date')
      ->get();
        $hoadonban = DB::table('hdban')->orderBy('ThanhTien','DESC')->skip(0)->take(3)->get();
        $total = DB::table('cthdban')->sum('TongTien');
        return view('admin.trangchu', compact('dtngay','hoadonban','total'));
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

//Cập nhật và xóa giỏ hàng
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

 
//Báo cáo tổng hợp
    public function tonghop()
        {
        // $month = Carbon::now()->month;
        // ->whereMonth('ctpnhap.created_at', $month)

        $nhap =DB::table('ctpnhap')-> join('hanghoa','hanghoa.id','=','ctpnhap.id_hanghoa')
        ->select('Ten', DB::raw('SUM(SoLuong) as SL'))
        ->groupBy('Ten')->get();
        $xuat =DB::table('ctpxuat')-> join('hanghoa','hanghoa.id','=','ctpxuat.id_hanghoa')
        ->select('Ten', DB::raw('SUM(SoLuong) as SL'))
        ->groupBy('Ten')->get();
        $huy =DB::table('ctphuy')-> join('hanghoa','hanghoa.id','=','ctphuy.id_hanghoa')
        ->select('Ten', DB::raw('SUM(SoLuong) as SL'))
        ->groupBy('Ten')->get();
        $ton =DB::table('ctpton')-> join('hanghoa','hanghoa.id','=','ctpton.id_hanghoa')
        ->select('Ten', DB::raw('SUM(SoLuong) as SL'))
        ->groupBy('Ten')->get();
        // dd($xuat);
            return view('baocao.tonghop',compact('nhap','xuat','huy','ton'));
        }


//Hàng bán
    public function hangban()
    {
        $hang=hanghoa::all();
        return view('baocao.hangban',compact('hang'));
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

// Thanh toán
    public function thanhtoan()
    {
        $reviews= review::all();
    return view('giohang.thanhtoan',compact('reviews'));
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

//Test
    public function test()
    {
        // $nhap = DB::table('ctpnhap')-> join('hanghoa','hanghoa.id','=','ctpnhap.id_hanghoa')
        // ->select('Ten', DB::raw('SUM(SoLuong) as SL'))
        // ->groupBy('Ten')->get();

        // $xuat = DB::table('ctpxuat')-> join('hanghoa','hanghoa.id','=','ctpxuat.id_hanghoa')
        // ->select('Ten', DB::raw('SUM(SoLuong) as SL'))
        // ->groupBy('Ten')->get();

        
       

        $nhap = DB::table('ctpnhap')->select('id_hanghoa',DB::raw('SUM(SoLuong) as SLnhap'))->groupBy('id_hanghoa');
        $xuat = DB::table('ctpxuat')->select('id_hanghoa',DB::raw('SUM(SoLuong) as SLxuat'))->groupBy('id_hanghoa');

        $hanghoa = DB::table('hanghoa')
        ->leftjoin('ctpnhap','hanghoa.id','=','ctpnhap.id_hanghoa')
        ->leftjoin('ctpxuat','hanghoa.id','=','ctpxuat.id_hanghoa')
        ->select('Ten',DB::raw('SUM(ctpnhap.SoLuong) as SLnhap'),DB::raw('SUM(ctpxuat.SoLuong) as SLxuat'))
        ->groupBy('Ten')
        ->get();

        dd($hanghoa);
        return view('test',compact('hanghoa'));
    }
}




 