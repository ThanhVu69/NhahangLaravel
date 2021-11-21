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

class OrderController extends Controller
{
//Menu
    public function order()
    {
    $monan= monan::all();
    return view('order.order',['monan'=>$monan]);
    }
// Giỏ hàng
    public function getgiohang()
    {
    return view('order.giohang');
    }
    public function postgiohang(Request $request)
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
    echo"<script>
        alert('Order thành công!');
        window.location = ' ".url('hoadonban')."'
        </script>";
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
//Cập nhật giỏ hàng và xóa giỏ hàng
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
}
