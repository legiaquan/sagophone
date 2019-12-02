<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    //
    protected $table = "tbchitietdonhang";
    public $timestamps = false;
    
    public function chitietsanpham()
    {
    	return $this->belongsTo('App\SanPham','id','id_chitietsanpham');
    }
    public function hoadon()
    {
    	return $this->belongsTo('App\HoaDon','id','id_hoadon');
    }

}

