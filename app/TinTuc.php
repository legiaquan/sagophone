<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table = "tbtintuc";

    public function admins()
    {
    	return $this->belongsTo('App\Admin','id_tintuc','id');
    }

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','id_loaitin','id');
    }
}
