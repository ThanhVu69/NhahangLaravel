<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieuchi extends Model
{
    protected $table = "phieuchi";
    
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','id_nhanvien','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id_nhanvien','id');
    }
}
