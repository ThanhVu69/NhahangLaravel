<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctpnhap extends Model
{
    protected $table = "ctpnhap";
    
    public function phieunhap()
    {
        return $this->belongsTo('App\phieunhap','id_phieunhap','id');
    }
    public function monan()
    {
        return $this->belongTo('App\monan','id_monan','id');
    }
    public function hanghoa()
    {
        return $this->belongsTo('App\hanghoa','id_hanghoa','id');
    }
}
