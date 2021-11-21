<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hanghoa extends Model
{
    protected $table = "hanghoa";
    
    public function ctpnhap()
    {
        return $this->hasMany('App\ctpnhap','id_hanghoa','id');
    }
    public function ctpxuat()
    {
        return $this->hasMany('App\ctpxuat','id_hanghoa','id');
    }
    public function ctphuy()
    {
        return $this->hasMany('App\ctphuy','id_hanghoa','id');
    }
    public function ctpton()
    {
        return $this->hasMany('App\ctpton','id_hanghoa','id');
    }
    public function nhacungcap()
    {
        return $this->belongsTo('App\nhacungcap','id_nhacc','id');
    }
    public function ctptra()
    {
        return $this->belongsTo('App\ctptra','id_hanghoa','id');
    }
}
