<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhacungcap extends Model
{
    protected $table = "nhacungcap";
    
    public function hanghoa()
    {
        return $this->hasMany('App\hanghoa','id_nhacc','id');
    }
    public function phieutra()
    {
        return $this->hasMany('App\phieutra','id_nhacc','id');
    }
}
