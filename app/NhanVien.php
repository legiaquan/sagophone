<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = 'admins';
    public function banner()
    {
        return $this->hasMany('App\Banner','id_banner','id');
    }

    public function level()
    {
        return $this->belongsTo('App\Level','id_level','id');
    }

    public function tintuc()
    {
        return $this->hasMany('App\TinTuc','id_tintuc','id');
    }

    public function donhang()
    {
        return $this->hasMany('App\DonHang','madh','id');
    }
}
