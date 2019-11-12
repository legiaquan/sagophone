<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        
    	$this->checkDangNhapAdmin();

    }

    function checkDangNhapAdmin()
    {

        $auth = Auth::guard('admin');
    	if($auth->check())
    	{
            echo 'tồn tại';
    		view()->share('admin_login',Auth::admin());
    	}
        else{
            echo 'khong ton tai';
            //$a = Auth::guard('admin')->check();
            //var_dump($a);
            //$b = Auth::guard('admin');
            //echo 'chưa đăng nhập';
            //var_dump($b);
        }
    }
}
