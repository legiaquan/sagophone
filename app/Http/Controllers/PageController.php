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

use App\LoaiTin;

use App\TinTuc;

use DB;

class PageController extends Controller
{

	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$hangdt = HangDT::all();
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

    public function trangchu()
    {
        // $sanphamhotdeals =DB::table('tbsanpham')
        // ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        // ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        // ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        // ->where('tbdanhsachbanner.id_banner','2')
        // ->get();
        // var_dump($sanphamhotdeals).'<br>';
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
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('id_loaitin',$tintuc->id_loaitin)->take(3)->get();
        $tinkhuyenmai = TinTuc::where('id_loaitin', '2')->take(3)->get();
    	return view('pages/tintuc',['tintuc' => $tintuc, 'tinlienquan' => $tinlienquan, 'tinkhuyenmai' => $tinkhuyenmai]);
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
    	$sanphamdanhmuc = DB::table('tbsanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbsanpham.id_nhom',$id)
        ->orderBy('tbsanpham.id','desc')
        ->paginate(6);
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
    	$sanphamdanhmuc = DB::table('tbsanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbsanpham.id_hangdt',$id)
        ->paginate(6);
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
<<<<<<< HEAD
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

    public function timkiem(Request $request)
    {
        $loaitin = LoaiTin::all();
        $this->validate($request,
            [
                'keyword' => 'required|min:5'

            ],
            [
                'keyword.required' => 'Bạn chưa nhập từ khóa!',
                'keyword.min' => 'Vui lòng nhập nhiều hơn 5 ký tự!'
            ]
        );
        $keyword = $request->keyword;
        $tintuc = TinTuc::where('tieude','like',"%$keyword%")->orWhere('mota','like','%$keyword%')->orWhere('noidung','like','%$keyword%')
        ->take(20)->paginate(4);
        $sanpham = SanPham::where('tensp','like','%$keyword%')->orWhere('mota','like','%$keyword%')->take(30)->paginate(6);
        if($tintuc != NULL)
        {
            return view('pages/timkiem',['keyword' => $keyword, 'tintuc' => $tintuc,'loaitin' => $loaitin]);
        }
        else if($sanpham != NULL)
        {
            return view('pages/timkiem1',['keyword' => $keyword, 'sanpham' => $sanpham]);
        }
        else
        {
            echo 'Không tìm thấy!';
        }
=======
    }

    public function hotdeals()
    {
        $sanphamhotdealstt = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2')->paginate(6);
        return view('pages/hotdeals',['sanphamhotdealstt' => $sanphamhotdealstt]);
>>>>>>> bc4d78425f36d9dc9ab1362421f871dba74f6a74
    }

}
