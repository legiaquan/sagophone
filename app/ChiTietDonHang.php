<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    //
    protected $table = "tbchitietdonhang";
    public $timestamps = false;
    
    // public function sanpham()
    // {
    // 	return $this->belongsTo('App\SanPham','id_sanpham','id_sanpham');
    // }
    public function donhang()
    {
    	return $this->belongsTo('App\DonHang','id','id_donhang');
    }

}

