<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "Bill";
    
    public function BillDetail()
    {
        return $this->hasMany('App\BillDetail','id_bill','id');
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','id_nhanvien','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id_nhanvien','id');
    }
    public function Khachhang()
    {
        return $this->belongsTo('App\Khachhang','id_khachhang','id');
    }
}