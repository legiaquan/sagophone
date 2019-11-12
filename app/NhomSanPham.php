<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomSanPham extends Model
{
    //
    protected $table = "tbnhomsanpham";
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_nhom','id');
    }
    
}
