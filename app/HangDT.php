<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HangDT extends Model
{
    //
    protected $table = "tbhangdt";
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_hangdt','id');
    }
}
