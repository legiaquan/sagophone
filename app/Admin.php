<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Admin as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password','username','email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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