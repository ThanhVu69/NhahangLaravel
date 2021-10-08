<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vp_user extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public function Khachhang()
    {
        return $this->belongsTo('App\Khachhang','id_khachhang','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}

