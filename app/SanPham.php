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
    public function nhomsp()
    {
    	return $this->belongsTo('App\NhomSanPham','id_nhom','id');
    }

    public function dsbanner()
    {
        return $this->hasMany('App\DanhSachBanner','id_sanpham','id');
    }
    
    public function soluongmausp()
    {
        return $this->hasMany('App\SoLuongMauSP','id_sanpham','id');
    }
}
