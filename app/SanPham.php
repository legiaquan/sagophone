<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //lien ket voi bang sanpham trong csdl
    protected $table = "sanpham";
    public $timestamps = false;

    public function loaisanpham()
    {
    	return $this->belongsTo('App\LoaiSanPham','id_loaisanpham','id');
    }
    
}
