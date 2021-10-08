<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class dangnhapmdw
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if(Auth::check())
    //     {   
    //         $users = Auth::user();
    //         // if($users->quyen==1)
    //         return $next($request);
    //         // else
    //         //     return redirect('dangnhap');
    //     }
    //     else
    //         return redirect('dangnhap');
    // }
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->quyen =='1' || $user->quyen=='0')
                return $next($request);        
            else 
                return redirect('dangnhap');   
            
          
        }
        else
        {
            return redirect('dangnhap');
        }

    }
}
