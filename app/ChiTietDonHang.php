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
    	return $this->belongsTo('App\ChiTietSanPham','id_chitietsanpham','id');
    }
    public function donhang()
    {
    	return $this->belongsTo('App\DonHang','id_donhang','id');
    }

}

