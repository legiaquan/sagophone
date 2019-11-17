<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\NhomSanPham;

use App\SanPham;

use App\HangDT;

use App\DanhSachBanner;

use App\Banner;

use App\Mau;

use App\SoLuongMauSP;

class PageController extends Controller
{

	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$sanpham = SanPham::all();
		$hangdt = HangDT::all();
		$sanphammoi = DanhSachBanner::where('id_banner','3')->get();
		$sanphambanchay = DanhSachBanner::where('id_banner','4')->get();
		$sanphamhotdeals = DanhSachBanner::where('id_banner','2')->get();
		view()->share('nhomsanpham',$nhomsanpham);
		view()->share('hangdt',$hangdt);
		view()->share('sanphammoi',$sanphammoi);
		view()->share('sanphambanchay',$sanphambanchay);
		view()->share('sanphamhotdeals',$sanphamhotdeals);
	}

    public function trangchu()
    {
    	$sanphammoi1 = DanhSachBanner::where('id_banner','3')->take(3)->get();
		$sanphammoi2 = DanhSachBanner::where('id_banner','3')->skip(3)->take(3)->get();
		$sanphambanchay1 = DanhSachBanner::where('id_banner','4')->take(3)->get();
		$sanphambanchay2 = DanhSachBanner::where('id_banner','4')->skip(3)->take(3)->get();
		$sanphamhotdeals1 = DanhSachBanner::where('id_banner','2')->take(3)->get();
		$sanphamhotdeals2 = DanhSachBanner::where('id_banner','2')->skip(3)->take(3)->get();
    	return view('pages/trangchu',
    		['sanphammoi1' => $sanphammoi1,
    		'sanphammoi2' => $sanphammoi2,
    		'sanphambanchay1' => $sanphambanchay1,
			'sanphambanchay2' => $sanphambanchay2,
			'sanphamhotdeals1' => $sanphamhotdeals1,
			'sanphamhotdeals2' => $sanphamhotdeals2
			]);
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
