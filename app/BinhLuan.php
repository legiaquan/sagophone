<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = "tbbinhluan";

    public function thanhvien()
    {
    	return $this->belongsTo('App\ThanhVien','id_thanhvien','id');
    }

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }	
}
