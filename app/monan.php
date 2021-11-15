<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monan extends Model
{
    protected $table = "monan";
    protected $fillable = [
        'ma', 'Ten', 'image'
       ];
    
    public function cthdban()
    {
        return $this->hasMany('App\cthdban','id_monan','id');
    }
    public function ctpnhap()
    {
        return $this->hasMany('App\ctpnhap','id_monan','id');
    }
    public function ctpxuat()
    {
        return $this->hasMany('App\ctpxuat','id_monan','id');
    }
    public function loaimonan()
    {
        return $this->belongsTo('App\loaimonan','id_loaimonan','id');
    }
    public function ctphuy()
    {
        return $this->hasMany('App\ctphuy','id_monan','id');
    }
    public function ctpton()
    {
        return $this->hasMany('App\ctpton','id_monan','id');
    }

}
