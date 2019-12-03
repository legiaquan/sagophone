<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhSachBanner extends Model
{
    //
    protected $table = "tbdanhsachbanner";
    public $timestamps = false;
    public function chitietsanpham()
    {
    	return $this->belongsTo('App\ChiTietSanPham','id_chitietsanpham','id');
    }

    public function banner()
    {
    	return $this->belongsTo('App\Banner','id_banner','id');
    }

}
