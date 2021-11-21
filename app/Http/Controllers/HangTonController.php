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
use App\hanghoa;
use App\phieuton;
use App\ctpton;
use App\monan;
use App\nhanvien;
use App\cuahang;
use App\User;

class HangTonController extends Controller
{
//Báo cáo hàng tồn 
    public function baocaohangton()
    {
    $products= hanghoa::all();
    return view('baocao.baocaohangton',compact('products'));
    }
//Get giỏ báo cáo hàng tồn
    public function getgiobchangton()
    {
    return view('baocao.giobchangton');
    }
//Post giỏ báo cáo hàng tồn
    public function postgiobchangton()
    {   
        $cart = session()->get('cart');
        $bill = new phieuton;
        $bill->Ngay = date('Y-m-d');
        $bill->ma; 
        $user = User::all();
        $bill->id_nhanvien = Auth::user()->id;
        $bill->ThanhTien=0;     
        $bill->save();
        $totally = 0; 
        // foreach ($cart as $key => $value) {
        //     $hanghoa = hanghoa::find($key);
        //     $hanghoa->Ngay = date('Y-m-d');
        //     $hanghoa->SoLuong -= $value['quantity'];
        //     $hanghoa->Ton += $value['quantity'];
        //     $hanghoa->DeLai += $value['quantity'];
        //     $hanghoa->save();
        // } 
        foreach($cart as $key => $value) 
        {
            $bill_detail = new ctpton;
            $bill_detail->id_phieuton = $bill->id;
            $bill_detail->id_hanghoa = $key;
            $bill_detail->SoLuong = $value['quantity'];
            $bill_detail->Dongia = $value['price'];
            $bill_detail->TongTien = ($value['price']*$value['quantity']);
            $totally += $bill_detail->TongTien;
            $bill_detail->save();
        }
        $total = phieuton::find($bill->id);
        $total->ThanhTien = $totally;
        $total->save();
    session()->forget('cart');
    echo"<script>
        alert('Báo cáo hàng tồn thành công!');
        window.location = ' ".url('trangchu')."'
        </script>";
    }
//Thêm báo cáo hàng tồn
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
//Cập nhật giỏ hàng và xóa giỏ hàng
    public function updategiohanghangton(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function removegiohanghangton(Request $request)
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
