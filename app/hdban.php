<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\HasManyRelation;
class hdban extends Model
{
    use HasManyRelation;
    protected $table = "hdban";
    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    public function cthdban()
    {
        return $this->hasMany('App\cthdban','id_hoadonban','id');
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','id_nhanvien','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','id_nhanvien','id');
    }
}
