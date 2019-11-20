<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table = "tbtintuc";

    public function nhanvien()
    {
    	return $this->belongsTo('App\NhanVien','id_admins','id');
    }

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','id_loaitin','id');
    }
}
