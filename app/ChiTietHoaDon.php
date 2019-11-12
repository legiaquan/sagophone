<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    //
    protected $table = "tbchitiethoadon";
    public $timestamps = false;
    
    // public function sanpham()
    // {
    // 	return $this->belongsTo('App\SanPham','id_sanpham','id_sanpham');
    // }
    public function hoadon()
    {
    	return $this->belongsTo('App\HoaDon','id','id_hoadon');
    }

}

