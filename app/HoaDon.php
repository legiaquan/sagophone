<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class HoaDon extends Model
{
    //
    protected $table = "tbhoadon";
   
    public function thanhvien()
    {
    	return $this->belongsTo('App\ThanhVien','id_thanhvien','id');
    }
    public function chitiet()
    {
    	return $this->hasMany('App\ChiTietHoaDon','id_hoadon','id');
    }
}
