<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    //lien ket voi bang sanpham trong csdl
    protected $table = "loaisanpham";
    public $timestamps = false;

    public function sanpham()
    {
    	return $this->hasMany('App\Sanpham','id_loaisanpham','id');
    }
}
