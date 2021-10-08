<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "BillDetail";

    public function monan()
    {
        return $this->belongsTo('App\monan','id_product','id');
    }
    public function Bill()
    {
        return $this->belongsTo('App\Bill','id_bill','id');
    }
}
