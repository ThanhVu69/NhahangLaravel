<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieuton extends Model
{
    protected $table = "phieuton";
    
    public function ctpton()
    {
        return $this->hasMany('App\ctpton','id_phieuton','id');
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
