<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $table = "tblevel";

    public function admins()
    {
    	return $this->hasMany('App\Admin','id_level','id');
    }
}
