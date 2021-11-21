<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctphuy extends Model
{
    protected $table = "ctphuy";
    
    public function phieuhuy()
    {
        return $this->belongsTo('App\phieuhuy','id_phieuhuy','id');
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
