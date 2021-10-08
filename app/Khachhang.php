<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $table = "Khachhang";

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_khachhang','id');
    }
    public function User()
    {
        return $this->hasOne('App\User','id_khachhang','id');
    }
}
