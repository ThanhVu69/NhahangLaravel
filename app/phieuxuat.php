<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieuxuat extends Model
{
    protected $table = "phieuxuat";
    
    public function ctpxuat()
    {
        return $this->hasMany('App\ctpxuat','id_phieuxuat','id');
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
