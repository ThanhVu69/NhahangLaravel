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
use Carbon\Carbon;
use Cart;
use Validator;
use Excel;
use input;

class DoanhthuController extends Controller
{
//Doanh thu
    public function doanhthu()
    {
    $total = DB::table('cthdban')->sum('TongTien');
    $cthdban= cthdban::all();

    //Doanh thu theo ngày
    $dtmonan =DB::table('hdban')
      ->select(DB::raw('DATE(Ngay) as date'), DB::raw('SUM(ThanhTien) as DT'), DB::raw('COUNT(id) as HD'))
      ->groupBy('date')
      ->get();
    $dtthang =DB::table('hdban')
      ->select(DB::raw('MONTH(Ngay) as date'), DB::raw('SUM(ThanhTien) as DT'))
      ->groupBy('date')
      ->get();
    $dtnam =DB::table('hdban')
      ->select(DB::raw('YEAR(created_at) as date'), DB::raw('SUM(ThanhTien) as DT'))
      ->groupBy('date')
      ->get();

    //Top món ăn của ngày
    $day = Carbon::today()->toDateString();
    $bieudo = cthdban::where('Ngay',$day)
    ->select('id_monan',DB::raw('SUM(TongTien) as TT'),DB::raw('SUM(SoLuong) as SL'))->groupBy('id_monan')
    ->orderBy('TT','DESC')->skip(0)->take(7)->get();

    $bieudovung = DB::table('hdban')
    ->select(DB::raw('DATE(Ngay) as date'), DB::raw('SUM(ThanhTien) as DT'))
    ->groupBy('date')
    ->orderBy('date','ASC')->skip(0)->take(14)
    ->get();

    return view('doanhthu.doanhthu',compact('total','cthdban','dtmonan','dtthang','dtnam','day','dthanghoa','bieudo','bieudovung'));
    }

//Doanh thu lọc theo ngày
    public function doanhthungay(Request $request)
    {   
        $total = DB::table('cthdban')->whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])->sum('TongTien');
        $dthanghoa = cthdban::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])
        ->select('id_monan',DB::raw('SUM(TongTien) as TT'),DB::raw('SUM(SoLuong) as SL'))->groupBy('id_monan')
        ->get();

        $bieudo = cthdban::whereBetween('Ngay',[$request->Ngay1,$request->Ngay2])
        ->select('id_monan',DB::raw('SUM(TongTien) as TT'),DB::raw('SUM(SoLuong) as SL'))->groupBy('id_monan')
        ->orderBy('TT','DESC')->skip(0)->take(7)->get();
        
        $ngay1 = $request->Ngay1;
        $ngay2 = $request->Ngay2;
        return view('doanhthu.doanhthungay',compact('total','dthanghoa','ngay1','ngay2','bieudo'));
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
}