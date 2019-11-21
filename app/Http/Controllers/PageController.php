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

use App\ChiTietSanPham;

use DB;

class PageController extends Controller
{

	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$hangdt = HangDT::all();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
		$sanphammoi = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','3')
        ->get();
		$sanphambanchay = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','4')
        ->get();
		$sanphamhotdeals =DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')
        ->get();
		$sanphambanchay1 =  DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','4')
        ->orderBy('tbsanpham.id','desc')
        ->take(3)->get();
		$sanphambanchay2 = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','4')
        ->orderBy('tbsanpham.id','asc')
        ->take(3)->get();
		$sanphammoi1 = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','3')
        ->orderBy('tbsanpham.id','desc')
        ->take(3)->get();
		$sanphammoi2 = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','3')
        ->orderBy('tbsanpham.id','asc')
        ->take(3)->get();
<<<<<<< HEAD
=======
=======

		$sanphammoi = DanhSachBanner::where('id_banner','3')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','asc')->get();
		$sanphambanchay = DanhSachBanner::where('id_banner','4')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','asc')->get();
		$sanphamhotdeals = DanhSachBanner::where('id_banner','2')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','asc')->get();
		$sanphambanchay1 = DanhSachBanner::where('id_banner','4')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','desc')->take(3)->get();
		$sanphambanchay2 = DanhSachBanner::where('id_banner','4')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','asc')->skip(3)->take(3)->get();
		$sanphammoi1 = DanhSachBanner::where('id_banner','3')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','desc')->take(3)->get();
		$sanphammoi2 = DanhSachBanner::where('id_banner','3')->join('tbsanpham','tbdanhsachbanner.id_sanpham','tbsanpham.id')
		->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->orderBy('tbdanhsachbanner.id','asc')->skip(3)->take(3)->get();
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
		$sanphamhotdeals1 = DB::table('tbsanpham')
    	->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
    	->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
    	->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
    	->where('tbdanhsachbanner.id_banner','2')
<<<<<<< HEAD
    	->orderBy('tbsanpham.id','desc')
=======
<<<<<<< HEAD
    	->orderBy('tbsanpham.id','desc')
=======
    	->orderBy('tbdanhsachbanner.id','desc')
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    	->take(3)->get();
		$sanphamhotdeals2 = DB::table('tbsanpham')
    	->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
    	->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
    	->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
    	->where('tbdanhsachbanner.id_banner','2')
<<<<<<< HEAD
    	->orderBy('tbsanpham.id','asc')
=======
<<<<<<< HEAD
    	->orderBy('tbsanpham.id','asc')
=======
    	->orderBy('tbdanhsachbanner.id','asc')
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    	->take(3)->get();
		view()->share('nhomsanpham',$nhomsanpham);
		view()->share('hangdt',$hangdt);
		view()->share('sanphammoi',$sanphammoi);
		view()->share('sanphammoi1',$sanphammoi1);
		view()->share('sanphammoi2',$sanphammoi2);
		view()->share('sanphambanchay',$sanphambanchay);
		view()->share('sanphamhotdeals',$sanphamhotdeals);
		view()->share('sanphambanchay1',$sanphambanchay1);
		view()->share('sanphambanchay2',$sanphambanchay2);
		view()->share('sanphamhotdeals1', $sanphamhotdeals1);
		view()->share('sanphamhotdeals2', $sanphamhotdeals2);
		
	}

    public function trangchu()
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
        // $sanphamhotdeals =DB::table('tbsanpham')
        // ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        // ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        // ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        // ->where('tbdanhsachbanner.id_banner','2')
        // ->get();
        // var_dump($sanphamhotdeals).'<br>';
<<<<<<< HEAD
=======
=======
    	
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
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
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();
    	$sanpham = DB::table('tbsanpham')->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
    	->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
    	->paginate(6);
    	return view('pages/danhmuc',
    		['sanpham' => $sanpham,
    		'sanphamdt' => $sanphamdt, 
    		'sanphampk' => $sanphampk,
    		'sanphamapple' => $sanphamapple,
    		'sanphamsamsung' => $sanphamsamsung,
    		'sanphamsony' => $sanphamsony,
    		'sanphamnokia' => $sanphamnokia,
    		'sanphamvsmart' => $sanphamvsmart,
    	]);
    }

    public function danhmuc1($id)
    {
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();
    	$danhmuc = NhomSanPham::find($id);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    	$sanphamdanhmuc = DB::table('tbsanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbsanpham.id_nhom',$id)
        ->orderBy('tbsanpham.id','desc')
        ->paginate(6);
<<<<<<< HEAD
=======
=======
    	$sanphamdanhmuc = SanPham::where('id_nhom',$id)->paginate(6);
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    	return view('pages/danhmuc1',
    		['danhmuc' => $danhmuc, 
    		'sanphamdanhmuc' => $sanphamdanhmuc,
    		'sanphamdt' => $sanphamdt, 
    		'sanphampk' => $sanphampk,
    		'sanphamapple' => $sanphamapple,
    		'sanphamsamsung' => $sanphamsamsung,
    		'sanphamsony' => $sanphamsony,
    		'sanphamnokia' => $sanphamnokia,
    		'sanphamvsmart' => $sanphamvsmart
		]);
       // $sanphamdanhmuctest = DB::table('tbsanpham')
       //  ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
       //  ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
       //  ->where('tbsanpham.id_nhom',$id)->orderBy('tbsanpham.id','asc')
       //  ->get();
       //  echo $sanphamdanhmuctest.'<br>';
    }

     public function danhmuc2($id)
    {
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();
    	$danhmucloai = NhomSanPham::find($id);
    	$danhmuc = HangDT::find($id);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    	$sanphamdanhmuc = DB::table('tbsanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbsanpham.id_hangdt',$id)
        ->paginate(6);
<<<<<<< HEAD
=======
=======
    	$sanphamdanhmuc = SanPham::where('id_hangdt',$id)->paginate(6);
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    	return view('pages/danhmuc2',
    		['danhmuc' => $danhmuc, 
    		'sanphamdanhmuc' => $sanphamdanhmuc,
    		'danhmucloai' => $danhmucloai,
    		'sanphamdt' => $sanphamdt, 
    		'sanphampk' => $sanphampk,
    		'sanphamapple' => $sanphamapple,
    		'sanphamsamsung' => $sanphamsamsung,
    		'sanphamsony' => $sanphamsony,
    		'sanphamnokia' => $sanphamnokia,
    		'sanphamvsmart' => $sanphamvsmart
		]);
    }

    public function chitietsp($id)
    {
    	$chitiet = SanPham::find($id);
    	$sanphamlienquan = SanPham::where('id_hangdt',$chitiet->id_hangdt)->take(4)->get();
    	//var_dump(getGiaMin($id));
    	return view('pages/chitiet',['chitiet' => $chitiet, 'sanphamlienquan' => $sanphamlienquan]);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
    public function hotdeals()
    {
        $sanphamhotdealstt = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')->paginate(6);
        return view('pages/hotdeals',['sanphamhotdealstt' => $sanphamhotdealstt]);
    }
=======
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187

}
