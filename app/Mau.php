<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau extends Model
{
    //
    protected $table = "tbmau";

    public function chitietsanpham()
    {
    	return $this->hasMany('App\SoLuongMauSP','id_mau','id');
    }
}
