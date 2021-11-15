<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuahang extends Model
{
    protected $table = "cuahang";
    
    public function phieunhap()
    {
        return $this->hasMany('App\phieunhap','id_cuahang','id');
    }
    public function phieuxuat()
    {
        return $this->hasMany('App\phieuxuat','id_cuahang','id');
    }
    public function baocaohanghoa()
    {
        return $this->hasMany('App\baocaohanghoa','id_cuahang','id');
    }
}
