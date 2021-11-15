<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieuhuy extends Model
{
    protected $table = "phieuhuy";
    
    public function ctphuy()
    {
        return $this->hasMany('App\ctphuy','id_phieuhuy','id');
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
