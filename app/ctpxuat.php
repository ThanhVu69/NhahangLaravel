<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctpxuat extends Model
{
    protected $table = "ctpxuat";
    
    public function phieuxuat()
    {
        return $this->belongsTo('App\phieuxuat','id_phieuxuat','id');
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
