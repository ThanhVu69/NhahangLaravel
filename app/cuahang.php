<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuahang extends Model
{
    protected $table = "cuahang";
    
    public function phieunhap()
    {
        return $this->hasMany('App\phieunhap','id_phieunhap','id');
    }
    public function phieuxuat()
    {
        return $this->hasMany('App\phieuxuat','id_phieuxuat','id');
    }
    public function Khachdatban()
    {
        return $this->hasMany('App\Khachdatban','id_khachdatban','id');
    }
}
