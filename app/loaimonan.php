<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaimonan extends Model
{
    protected $table = "loaimonan";
    protected $fillable = [
        'ma', 'ten'
       ];
    
    public function monan()
    {
        return $this->hasMany('App\monan','id_loaimonan','id');
    }
}
    