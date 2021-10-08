<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachdatban extends Model
{
    protected $table = "khachdatbans";
    protected $fillable = ['ten','sdt','id_cuahang','songuoi','thoigian','gio','buoi','trangthai','ghichu'];
    public function cuahang()
    {
        return $this->belongsTo('App\cuahang','id_cuahang','id');
    }
}
