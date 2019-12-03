<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class DonHang extends Model
{
    //
    protected $table = "tbdonhang";
   
    public function thanhvien()
    {
    	return $this->belongsTo('App\ThanhVien','id_thanhvien','id');
    }
    public function chitiet()
    {
    	return $this->hasMany('App\ChiTietDonHang','id_hoadon','id');
    }

    public function admins()
    {
        return $this->belongsTo('App\NhanVien','id_admins','id');
    }
}
