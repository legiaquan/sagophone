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

use DB;

class PageController extends Controller
{

	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$hangdt = HangDT::all();
		$sanphammoi = DanhSachBanner::where('id_banner','3')->get();
		$sanphambanchay = DanhSachBanner::where('id_banner','4')->get();
		$sanphamhotdeals = DanhSachBanner::where('id_banner','2')->get();
		$sanphambanchay1 = DanhSachBanner::where('id_banner','4')->take(3)->get();
		$sanphambanchay2 = DanhSachBanner::where('id_banner','4')->skip(3)->take(3)->get();
		view()->share('nhomsanpham',$nhomsanpham);
		view()->share('hangdt',$hangdt);
		view()->share('sanphammoi',$sanphammoi);
		view()->share('sanphambanchay',$sanphambanchay);
		view()->share('sanphamhotdeals',$sanphamhotdeals);
		view()->share('sanphambanchay1',$sanphambanchay1);
		view()->share('sanphambanchay2',$sanphambanchay2);
	}

    public function trangchu()
    {
    	$sanphammoi1 = DanhSachBanner::where('id_banner','3')->take(3)->get();
		$sanphammoi2 = DanhSachBanner::where('id_banner','3')->skip(3)->take(3)->get();
		$sanphamhotdeals1 = DanhSachBanner::where('id_banner','2')->take(3)->get();
		$sanphamhotdeals2 = DanhSachBanner::where('id_banner','2')->skip(3)->take(3)->get();
    	return view('pages/trangchu',
    		['sanphammoi1' => $sanphammoi1,
    		'sanphammoi2' => $sanphammoi2,
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
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();
    	$sanpham = DB::table('tbsanpham')->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
    	->join('tbsoluongmausp','tbsanpham.id','tbsoluongmausp.id_sanpham')
    	->paginate(6);
    	return view('pages/danhmuc',
    		['sanpham' => $sanpham,
    		'sanphamdt' => $sanphamdt, 
    		'sanphampk' => $sanphampk,
    		'sanphamapple' => $sanphamapple,
    		'sanphamsamsung' => $sanphamsamsung,
    		'sanphamsony' => $sanphamsony,
    		'sanphamnokia' => $sanphamnokia,
    		'sanphamvsmart' => $sanphamvsmart
    	]);
    }
}
