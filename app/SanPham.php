<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = "tbsanpham";
    public function hangdt()
    {
    	return $this->belongsTo('App\HangDT','id_hangdt','id');
    }
    public function nhomsanpham()
    {
    	return $this->belongsTo('App\NhomSanPham','id_nhom','id');
    }
    public function dsbanner()
    {
        return $this->hasMany('App\DanhSachBanner','id_sanpham','id');
    }
    public function chitietsanpham()
    {
        return $this->hasMany('App\ChiTietSanPham','id_sanpham','id');
    }
    public function binhluan()
    {
        return $this->hasMany('App\BinhLuan','id_sanpham','id');
    }
}
