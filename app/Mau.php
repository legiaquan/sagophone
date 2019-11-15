<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau extends Model
{
    //
    protected $table = "tbmau";

    public function soluongmausp()
    {
    	return $this->hasMany('App\SoLuongMauSP','id_mau','id');
    }
}
