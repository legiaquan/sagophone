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
<<<<<<< HEAD

use App\LoaiTin;

use App\TinTuc;
=======
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36

use DB;

class PageController extends Controller
{

<<<<<<< HEAD
	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$hangdt = HangDT::all();
		$sanphammoi = DB::table('tbsanpham')
=======
    function __construct()
    {
        $nhomsanpham = NhomSanPham::all();
        $hangdt = HangDT::all();
        $sanphammoi = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','3')
        ->get();
<<<<<<< HEAD
		$sanphambanchay = DB::table('tbsanpham')
=======
        $sanphambanchay = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','4')
        ->get();
<<<<<<< HEAD
		$sanphamhotdeals =DB::table('tbsanpham')
=======
        $sanphamhotdeals =DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')
        ->get();
<<<<<<< HEAD
		$sanphambanchay1 =  DB::table('tbsanpham')
=======
        $sanphambanchay1 =  DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','4')
        ->orderBy('tbsanpham.id','desc')
        ->take(3)->get();
<<<<<<< HEAD
		$sanphambanchay2 = DB::table('tbsanpham')
=======
        $sanphambanchay2 = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','4')
        ->orderBy('tbsanpham.id','asc')
        ->take(3)->get();
<<<<<<< HEAD
		$sanphammoi1 = DB::table('tbsanpham')
=======
        $sanphammoi1 = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','3')
        ->orderBy('tbsanpham.id','desc')
        ->take(3)->get();
<<<<<<< HEAD
		$sanphammoi2 = DB::table('tbsanpham')
=======
        $sanphammoi2 = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','3')
        ->orderBy('tbsanpham.id','asc')
        ->take(3)->get();
<<<<<<< HEAD
		$sanphamhotdeals1 = DB::table('tbsanpham')
    	->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
    	->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
    	->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
    	->where('tbdanhsachbanner.id_banner','2')
    	->orderBy('tbsanpham.id','desc')
    	->take(3)->get();
		$sanphamhotdeals2 = DB::table('tbsanpham')
    	->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
    	->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
    	->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
    	->where('tbdanhsachbanner.id_banner','2')
    	->orderBy('tbsanpham.id','asc')
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
=======
        $sanphamhotdeals1 = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')
        ->orderBy('tbsanpham.id','desc')
        ->take(3)->get();
        $sanphamhotdeals2 = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')
        ->orderBy('tbsanpham.id','asc')
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
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36

    public function trangchu()
    {
        // $sanphamhotdeals =DB::table('tbsanpham')
        // ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        // ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        // ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        // ->where('tbdanhsachbanner.id_banner','2')
        // ->get();
        // var_dump($sanphamhotdeals).'<br>';
<<<<<<< HEAD
    	return view('pages/trangchu');
    	
=======
        return view('pages/trangchu');
        
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
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
<<<<<<< HEAD
        $loaitin = LoaiTin::all();
        $tintuc = DB::table('tbtintuc')->paginate(4);

    	return view('pages/loaitin',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function loaitin1($id)
    {
        $loaitin = LoaiTin::all();
        $loaitin1 = LoaiTin::find($id);
        $tintuc = TinTuc::where('id_loaitin',$id)->paginate(4);
        return view('pages/loaitin1',['loaitin' => $loaitin, 'loaitin1' => $loaitin1, 'tintuc' => $tintuc]);
        //var_dump($loaitin1);
=======
        return view('pages/loaitin');
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
    }

    public function tintuc($id)
    {
<<<<<<< HEAD
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('id_loaitin',$tintuc->id_loaitin)->take(3)->get();
        $tinkhuyenmai = TinTuc::where('id_loaitin', '2')->take(3)->get();
    	return view('pages/tintuc',['tintuc' => $tintuc, 'tinlienquan' => $tinlienquan, 'tinkhuyenmai' => $tinkhuyenmai]);
=======
        return view('pages/tintuc');
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
    }

    public function danhmuc()
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
    }

    public function danhmuc1($id)
    {
<<<<<<< HEAD
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();
    	$danhmuc = NhomSanPham::find($id);
    	$sanphamdanhmuc = DB::table('tbsanpham')
=======
        $sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
        $sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
        $sanphamapple = SanPham::where('id_hangdt','1')->get();
        $sanphamsamsung = SanPham::where('id_hangdt','2')->get();
        $sanphamsony = SanPham::where('id_hangdt','3')->get();
        $sanphamnokia = SanPham::where('id_hangdt','4')->get();
        $sanphamvsmart = SanPham::where('id_hangdt','5')->get();
        $danhmuc = NhomSanPham::find($id);
        $sanphamdanhmuc = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbsanpham.id_nhom',$id)
        ->orderBy('tbsanpham.id','desc')
        ->paginate(6);
<<<<<<< HEAD
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
=======
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
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
       // $sanphamdanhmuctest = DB::table('tbsanpham')
       //  ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
       //  ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
       //  ->where('tbsanpham.id_nhom',$id)->orderBy('tbsanpham.id','asc')
       //  ->get();
       //  echo $sanphamdanhmuctest.'<br>';
    }

     public function danhmuc2($id)
    {
<<<<<<< HEAD
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();
    	$danhmucloai = NhomSanPham::find($id);
    	$danhmuc = HangDT::find($id);
    	$sanphamdanhmuc = DB::table('tbsanpham')
=======
        $sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
        $sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
        $sanphamapple = SanPham::where('id_hangdt','1')->get();
        $sanphamsamsung = SanPham::where('id_hangdt','2')->get();
        $sanphamsony = SanPham::where('id_hangdt','3')->get();
        $sanphamnokia = SanPham::where('id_hangdt','4')->get();
        $sanphamvsmart = SanPham::where('id_hangdt','5')->get();
        $danhmucloai = NhomSanPham::find($id);
        $danhmuc = HangDT::find($id);
        $sanphamdanhmuc = DB::table('tbsanpham')
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbsanpham.id_hangdt',$id)
        ->paginate(6);
<<<<<<< HEAD
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
=======
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
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
    }

    public function chitietsp($id)
    {
<<<<<<< HEAD
    	$chitiet = SanPham::find($id);
    	$sanphamlienquan = SanPham::where('id_hangdt',$chitiet->id_hangdt)->take(4)->get();
    	//var_dump(getGiaMin($id));
    	return view('pages/chitiet',['chitiet' => $chitiet, 'sanphamlienquan' => $sanphamlienquan]);
=======
        $chitiet = SanPham::find($id);
        $sanphamlienquan = SanPham::where('id_hangdt',$chitiet->id_hangdt)->take(4)->get();
        //var_dump(getGiaMin($id));
        return view('pages/chitiet',['chitiet' => $chitiet, 'sanphamlienquan' => $sanphamlienquan]);
>>>>>>> 6f089390ad29a6996ea7099eaf67e657e0960f36
    }

    public function hotdeals()
    {
        $sanphamhotdealstt = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')->paginate(6);
        return view('pages/hotdeals',['sanphamhotdealstt' => $sanphamhotdealstt]);
    }

}
