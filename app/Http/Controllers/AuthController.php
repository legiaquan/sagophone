<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
    	$username = $request['username'];
    	$password = $request['password'];

    	//Auth::login
    	// $user = User::find(2);
    	// Auth::login($user);
    	// return view('thanhcong',['user'=>Auth::user()]);

    	/*Auth::attempt*/
    	if(Auth::attempt(['name'=>$username,'password'=>$password]))
    	{
    		return view('thanhcong',['user'=>Auth::user()]);
    	}
    	else
    		return view('dangnhap',['error'=>'Dang nhap that bai!']);
    }

    public function logout()
    {
    	Auth::logout();
    	return view('dangnhap');
    }
}
