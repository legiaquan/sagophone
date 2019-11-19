<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = "tbbanner";

    public function danhsachbanner()
    {
    	return $this->hasMany('App\DanhSachBanner','id_banner','id');
    }

    public function admins()
    {
    	return $this->belongsTo('App\NhanVien','id_admins','id');
    }
}
