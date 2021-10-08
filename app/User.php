<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
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
    public function Khachhang()
    {
        return $this->belongsTo('App\Khachhang','id_khachhang','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
