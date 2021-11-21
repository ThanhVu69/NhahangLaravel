<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctptra extends Model
{
    protected $table = "ctptra";
    
    public function phieutra()
    {
        return $this->belongsTo('App\phieutra','id_phieutra','id');
    }
    public function monan()
    {
        return $this->belongsTo('App\monan','id_monan','id');
    }
    public function hanghoa()
    {
        return $this->belongsTo('App\hanghoa','id_hanghoa','id');
    }
}
