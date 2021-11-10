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

class HangTonController extends Controller
{
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
}
