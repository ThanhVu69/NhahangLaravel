<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monan extends Model
{
    protected $table = "monan";
    protected $fillable = [
        'ma', 'Ten', 'image'
       ];
    
    public function cthdban()
    {
        return $this->hasMany('App\cthdban','id_monan','id');
    }
    public function ctpnhap()
    {
        return $this->hasMany('App\ctpnhap','id_monan','id');
    }
    public function ctpxuat()
    {
        return $this->hasMany('App\ctpxuat','id_monan','id');
    }
    public function BillDetail()
    {
        return $this->hasMany('App\BillDetail','id_monan','id');
    }

}
