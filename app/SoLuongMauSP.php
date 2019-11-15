<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoLuongMauSP extends Model
{
    //
    protected $table = "tbsoluongmausp";

    public function mau()
    {
    	return $this->belongsTo('App\Mau','id_mau','id');
    }

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }
}
