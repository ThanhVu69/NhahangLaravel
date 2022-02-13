<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieutra extends Model
{
    protected $table = "phieutra";
    
    public function ctptra()
    {
        return $this->hasMany('App\ctptra','id_phieutra','id');
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','id_nhanvien','id');
    }
    public function nhacungcap()
    {
        return $this->belongsTo('App\nhacungcap','id_nhacc','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id_nhanvien','id');
    }
}
