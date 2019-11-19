<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhSachBanner extends Model
{
    //
    protected $table = "tbdanhsachbanner";
    public $timestamps = false;
    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function banner()
    {
    	return $this->belongsTo('App\Banner','id_banner','id');
    }
}
