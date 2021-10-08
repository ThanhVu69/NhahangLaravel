<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    protected $table = "nhanvien";
    protected $fillable = ['Ten','Ngaysinh','SDT','DiaChi','Vaitro'];
    public function hdban()
    {
        return $this->hasMany('App\hdban','id_nhanvien','id');
    }
    public function phieunhap()
    {
        return $this->hasMany('App\phieunhap','id_nhanvien','id');
    }
    public function phieuxuat()
    {
        return $this->hasMany('App\phieuxuat','id_nhanvien','id');
    }
    public function hangto()
    {
        return $this->hasMany('App\hangto','id_nhanvien','id');
    }
}
