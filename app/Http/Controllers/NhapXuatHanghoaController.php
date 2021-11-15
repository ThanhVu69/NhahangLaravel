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

class NhapXuatHanghoaController extends Controller
{
//Nhập hàng hóa
    public function nhaphangan()
    {
        $products = hanghoa::all();
 
        return view('nhapxuathang.nhaphangan', compact('products'));
    }

//Giỏ hàng hóa (nhập)
    public function getgiohangannhap()
    {
        $cuahang=cuahang::all();
        return view('nhapxuathang.giohangannhap',compact('cuahang'));
    }
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
        // foreach ($cart as $key => $value) {
        //     $hanghoa = hanghoa::find($key);
        //     $hanghoa->Nhap += $value['quantity'];
        //     $hanghoa->SoLuong += $value['quantity'];
        //     $hanghoa->save();
        // } 
        foreach($cart as $key => $value) 
        {
            $bill_detail = new ctpnhap;
            $bill_detail->id_phieunhap = $bill->id;
            $bill_detail->id_hanghoa = $key;
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->save();
        }
    session()->forget('cart');
    echo"<script>
        alert('Nhập hàng thành công!');
        window.location = ' ".url('trangchu')."'
        </script>";
    }

//Thêm vào giỏ hàng hóa
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
//Cập nhật giỏ hàng và xóa giỏ hàng
    public function updategiohangthonhap(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function removegiohangthonhap(Request $request)
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

//Xuất hàng hóa
    public function xuathangan()
    {
    $products = hanghoa::all();
    return view('nhapxuathang.xuathangan', compact('products'));
    }

//Giỏ hàng hóa (xuất)
    public function getgiohanganxuat()
    {
        $cuahang=cuahang::all();
        return view('nhapxuathang.giohanganxuat',compact('cuahang'));
    }
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
        // foreach ($cart as $key => $value) {
        //     $hanghoa = hanghoa::find($key);
        //     $hanghoa->Xuat += $value['quantity'];
        //     $hanghoa->SoLuong -= $value['quantity'];
        //     $hanghoa->save();
        // } 
        foreach($cart as $key => $value) 
        {
            $bill_detail = new ctpxuat;
            $bill_detail->id_phieuxuat = $bill->id;
            $bill_detail->id_hanghoa = $key;
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->save();
        }
    session()->forget('cart');
    echo"<script>
        alert('Xuất hàng thành công!');
        window.location = ' ".url('trangchu')."'
        </script>";
    }

//Thêm vào giỏ hàng
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
}