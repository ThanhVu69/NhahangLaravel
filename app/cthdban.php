<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthdban extends Model
{
    protected $table = "cthdban";
    
    public function hdban()
    {
        return $this->belongsTo('App\hdban','id_hoadonban','id');
    }
    public function monan()
    {
        return $this->belongsTo('App\monan','id_monan','id');
    }

}
