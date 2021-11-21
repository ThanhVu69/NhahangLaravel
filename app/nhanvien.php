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
    public function phieuhuy()
    {
        return $this->hasMany('App\phieuhuy','id_nhanvien','id');
    }
    public function phieuton()
    {
        return $this->hasMany('App\phieuton','id_nhanvien','id');
    }
    public function phieutra()
    {
        return $this->hasMany('App\phieutra','id_nhanvien','id');
    }
    public function phieuchi()
    {
        return $this->hasMany('App\phieuchi','id_nhanvien','id');
    }
}
