<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    //
    protected $table = "tbthanhvien";
    public function hoadon()
    {
    	return $this->hasMany('App\HoaDon','id_thanhvien','id');
    }
    public function binhluan()
    {
    	return $this->hasMany('App\BinhLuan','id_thanhvien','id');
    }
}
