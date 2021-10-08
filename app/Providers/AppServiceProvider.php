<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session;
use App\Cart;
use App\Cartt;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('giohang1',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
            }
            $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
    );
//     view()->composer('giohanghoa',function($view){
//         if(Session('cartt')){
//             $oldCartt = Session::get('cartt');
//             $cartt = new Cart($oldCartt);
//         }
//         $view->with(['cartt'=>Session::get('cartt'),'product_cart'=>$cartt->items,'totalQty'=>$cartt->totalQty]);
//     }
// );
   
    
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
