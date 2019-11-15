<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\NhomSanPham;

use App\SanPham;

use App\HangDT;

class PageController extends Controller
{

	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$sanpham = SanPham::all();
		$hangdt = HangDT::all();
		//$sanphammoi = SanPham::where('NEW','KHÔNG')->take(5)->get();
		view()->share('nhomsanpham',$nhomsanpham);
		view()->share('hangdt',$hangdt);
	}

    public function trangchu()
    {
    	return view('pages/trangchu');
    }

    public function getDangNhap()
    {
    	return view('pages/dangnhap');
    }

    public function postDangNhap(Request $request)
    {

    }

    public function getDangKy()
    {
    	return view('pages/dangky');
    }

    public function postDangKy(Request $request)
    {

    }

    public function loaitin()
    {
    	return view('pages/loaitin');
    }

    public function tintuc($id)
    {
    	return view('pages/tintuc');
    }

    public function danhmuc()
    {
    	return view('pages/danhmuc');
    }
}
