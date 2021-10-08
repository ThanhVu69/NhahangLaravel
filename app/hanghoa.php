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
    public function hangto()
    {
        return $this->hasMany('App\hangto','id_hanghoa','id');
    }
}
