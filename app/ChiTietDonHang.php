<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    //
    protected $table = "tbchitiethoadon";
    public $timestamps = false;
    
    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id','id_sanpham');
    }
    public function hoadon()
    {
    	return $this->belongsTo('App\HoaDon','id','id_hoadon');
    }

}

