<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\hanghoa;
use App\phieutra;
use App\ctptra;
use App\monan;
use App\nhanvien;
use App\cuahang;
use App\User;

use Illuminate\Http\Request;

class TrahanghoaController extends Controller
{
//Trả hàng
    public function baocaohangtra()
    {
        $products= hanghoa::all();
        return view('trahang.trahang',compact('products'));
        }
        //Post giỏ báo cáo hàng trả
        public function postgiobchangtra()
        {   
        $cart = session()->get('cart');
        $bill = new phieutra;
            $bill->Ngay = date('Y-m-d');
            $bill->ma; 
            $user = User::all();
            $bill->id_nhanvien = Auth::user()->id;
            $bill->ThanhTien=0;     
            $bill->save();
            $totally = 0; 
        foreach($cart as $key => $value) 
            {
                $bill_detail = new ctptra;
                $bill_detail->id_phieutra = $bill->id;
                $bill_detail->id_hanghoa = $key;
                $bill_detail->SoLuong = $value['quantity'];
                $bill_detail->Dongia = $value['price'];
                $bill_detail->TongTien = ($value['price']*$value['quantity']);
                $totally += $bill_detail->TongTien;
                $bill_detail->save();
            }
            $total = phieutra::find($bill->id);
            $total->ThanhTien = $totally;
            $total->save();
        session()->forget('cart');
        echo"<script>
            alert('Tạo phiếu trà hàng thành công!');
            window.location = ' ".url('phieutra')."'
            </script>";

    }

//Thêm
    public function thembaocaohangtra($id)
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
                    "id_hanghoa"=> $product->id_hanghoa,
                    "price"=> $product->gia,
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
            "price"=> $product->gia,
            "DVTinh"=> $product->DVTinh,
            "id_hanghoa"=> $product->id_hanghoa
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('thongbao', 'Thành công!');
        }
}