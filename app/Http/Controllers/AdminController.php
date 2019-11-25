<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
    //
   
   public function index()
   {
      return view('admin.trang-chu');
   }
	public function getLogin()
	{
		return view('admin.login');
	}
	public function postLogin(Request $request)
	{

		$this->validate($request,
			[
				'txtUsername' => 'required|exists:admins,username',
				'txtPassword' => 'required'
			],
			[
				'txtUsername.exists' => 'Tài khoản không tồn tại',
				'txtUsername.required' => 'Bạn chưa nhập username',
				'txtPassword.required' => 'Bạn chưa nhập password'
			]);
		if(Auth::guard('admin')->attempt(['username'=>$request->txtUsername,'password'=>$request->txtPassword]))
		{
			return redirect('admin/trang-chu.html');
		}
		else
		{
			return redirect()->back()->withInput($request->only('txtUsername'))->with('thongbao','Mật khẩu không đúng!');
		}

	}
	public function getLogout()
	{
		Auth::guard('admin')->logout();
        return redirect('admin/dangnhap');
	}

}
