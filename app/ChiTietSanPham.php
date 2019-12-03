<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    //
    protected $table = "tbchitietsanpham";
    public $timestamps = false;
    public function mau()
    {
    	return $this->belongsTo('App\Mau','id_mau','id');
    }

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }
    public function danhsachbanner()
    {
        return $this->hasMany('App\DanhSachBanner','id_chitietsanpham','id');
    }
    
}
