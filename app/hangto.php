<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hangto extends Model
{
    protected $table = "hangto";

    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','id_nhanvien','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id_nhanvien','id');
    }
    public function hanghoa()
    {
        return $this->belongsTo('App\hanghoa','id_hanghoa','id');
    }
}
