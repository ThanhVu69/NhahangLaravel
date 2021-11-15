<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctpton extends Model
{
    protected $table = "ctpton";
    
    public function phieuton()
    {
        return $this->belongsTo('App\phieuton','id_phieuhuy','id');
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
