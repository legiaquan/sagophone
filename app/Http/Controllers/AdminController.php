<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
   	public function getLogin()
   	{
   		return view('admin.login');
   	}
   	public function postLogin(Request $request)
   	{

   		$this->validate($request,
   			[
   				'txtUsername' => 'required',
   				'txtPassword' => 'required'
   			],
   			[
   				'txtUsername.required' => 'Bạn chưa nhập username',
   				'txtPassword.required' => 'Bạn chưa nhập password'
   			]);
   		if(Auth::guard('admin')->attempt(['username'=>$request->txtUsername,'password'=>$request->txtPassword]))
   		{
   			return redirect('admin/hangdt/danhsach');
   		}
   		else
   		{
   			return redirect()->back()->withInput($request->only('txtUsername'))->with('thongbao','Đăng nhập không thành công!');
   		}

   	}
}
