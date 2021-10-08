<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieunhap extends Model
{
    protected $table = "phieunhap";
    
    public function ctpnhap()
    {
        return $this->hasMany('App\ctpnhap','id_phieunhap','id');
    }
    public function cuahang()
    {
        return $this->belongsTo('App\cuahang','id_cuahang','id');
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','id_nhanvien','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id_nhanvien','id');
    }
}
