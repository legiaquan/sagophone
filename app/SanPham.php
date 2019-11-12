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
}
