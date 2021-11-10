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

use Illuminate\Http\Request;

class HangHuyController extends Controller
{
//Báo cáo hàng hủy
public function baocaohanghuy()
{
    $products= hanghoa::all();
    return view('baocao.baocaohanghuy',compact('products'));
    }
    //Get giỏ báo cáo hàng hủy
    public function getgiobchanghuy()
    {
    return view('baocao.giobchanghuy');
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
    echo"<script>
        alert('Báo cáo hàng hủy thành công!');
        window.location = ' ".url('trangchu')."'
        </script>";

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
    

}
