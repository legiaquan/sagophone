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

use App\Cart;

use DB;

use Session;

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

    public function loaitin(Request $request)
    {
        $loaitin = LoaiTin::all();
        $tintuc = DB::table('tbtintuc');
        if($request->id)
        {
            $idlt = $request->id;
            switch ($idlt){
                case '2':
                    $tintuc->where('id_loaitin','2');
                    break;
                case '3':
                    $tintuc->where('id_loaitin','3');
                    break;
                case '4':
                    $tintuc->where('id_loaitin','4');
                    break;
                case '5':
                    $tintuc->where('id_loaitin','5');
                    break;
                case '6':
                    $tintuc->where('id_loaitin','6');
                    break;
                case '7':
                    $tintuc->where('id_loaitin','7');
                    break;
                case '8':
                    $tintuc->where('id_loaitin','8');
                    break;
                default:
                    # code...
                    break;
            }

        }
        $tintuc = $tintuc->paginate(4);
    	return view('pages/loaitin',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('id_loaitin',$tintuc->id_loaitin)->take(3)->get();
        $tinkhuyenmai = TinTuc::where('id_loaitin', '2')->take(3)->get();
    	return view('pages/tintuc',['tintuc' => $tintuc, 'tinlienquan' => $tinlienquan, 'tinkhuyenmai' => $tinkhuyenmai]);
    }

    public function danhmuc(Request $request)
    {
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();	
        $sanpham = DB::table('tbsanpham')->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham');
        
        if($request->price)
        {
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $sanpham->where('gia','<',1000000)->orderBy('gia','ASC');
                        break;
                    case '2' :
                        $sanpham->whereBetween('gia',[1000000,3000000])->orderBy('gia','ASC');
                        break;
                    case '3' :
                        $sanpham->whereBetween('gia',[3000000,5000000])->orderBy('gia','ASC');
                        break;
                    case '4' :
                        $sanpham->whereBetween('gia',[5000000,7000000])->orderBy('gia','ASC');
                        break;
                    case '5' :
                        $sanpham->whereBetween('gia',[7000000,1000000])->orderBy('gia','ASC');
                        break;
                     case '6':
                        $sanpham->where('gia','>',10000000)->orderBy('gia','ASC');
                        break;
                    default:
                       
                }
                
        }

        if($request->id_nhom)
        {
            $id_nhom = $request->id_nhom;
            switch ($id_nhom) {
                case '1':
                    $sanpham->where('id_nhom','1');
                    break;
                case '2':
                    $sanpham->where('id_nhom','2');
                default:
                    # code...
                    break;
            }
        }

        if($request->id_hang)
        {
            $id_hang = $request->id_hang;
            switch ($id_hang) {
                case '1':
                    $sanpham->where('id_hangdt','1');
                    break;
                case '2':
                    $sanpham->where('id_hangdt','2');
                    break;
                case '3':
                    $sanpham->where('id_hangdt','3');
                    break;
                case '4':
                    $sanpham->where('id_hangdt','4');
                    break;
                case '5':
                    $sanpham->where('id_hangdt','5');
                    break;
                default:
                     # code...
                    break;
            }
               
        }
        if($request->orderby)
        {
                $orderby = $request->orderby;
                switch($orderby)
                {
                    case 'new' :
                        $sanpham->orderBy('tbsanpham.id','DESC');
                    case 'price_max' :
                        $sanpham->orderBy('gia','DESC');
                        break;
                    case 'price_min' :
                        $sanpham->orderBy('gia','ASC');
                        break;
                    default:
                        
                }
               
        }

        $sanpham = $sanpham->paginate(6);
        
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
        //var_dump($request->orderby);
    }

   
    public function chitietsp($id)
    {
    	$chitiet = SanPham::find($id);
    	$sanphamlienquan = SanPham::where('id_hangdt',$chitiet->id_hangdt)->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')->take(4)->get();
    	//var_dump(getGiaMin($id));
    	return view('pages/chitiet',['chitiet' => $chitiet, 'sanphamlienquan' => $sanphamlienquan]);
    }

    public function hotdeals(Request $request)
    {
        $sanphamhotdealstt = DB::table('tbsanpham')
        ->join('tbdanhsachbanner','tbsanpham.id','tbdanhsachbanner.id_sanpham')
        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
        ->where('tbdanhsachbanner.id_banner','2');
        if($request->orderby)
        {
                $orderby = $request->orderby;
                switch($orderby)
                {
                    case 'new' :
                        $sanphamhotdealstt->orderBy('tbsanpham.id','DESC');
                    case 'price_max' :
                        $sanphamhotdealstt->orderBy('gia','DESC');
                        break;
                    case 'price_min' :
                        $sanphamhotdealstt->orderBy('gia','ASC');
                        break;
                    default:
                        
                }
               
        }
         if($request->price)
        {
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $sanphamhotdealstt->where('gia','<',1000000)->orderBy('gia','ASC');
                        break;
                    case '2' :
                        $sanphamhotdealstt->whereBetween('gia',[1000000,3000000])->orderBy('gia','ASC');
                        break;
                    case '3' :
                        $sanphamhotdealstt->whereBetween('gia',[3000000,5000000])->orderBy('gia','ASC');
                        break;
                    case '4' :
                        $sanphamhotdealstt->whereBetween('gia',[5000000,7000000])->orderBy('gia','ASC');
                        break;
                    case '5' :
                        $sanphamhotdealstt->whereBetween('gia',[7000000,1000000])->orderBy('gia','ASC');
                        break;
                     case '6':
                        $sanphamhotdealstt->where('gia','>',10000000)->orderBy('gia','ASC');
                        break;
                    default:
                       
                }
                
        }
        $sanphamhotdealstt = $sanphamhotdealstt->paginate(6);
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
        if(isset($tintuc))
        {
            return view('pages/timkiem',['keyword' => $keyword, 'tintuc' => $tintuc,'loaitin' => $loaitin]);
        }
        else if(isset($sanpham))
        {
            return view('pages/timkiem1',['keyword' => $keyword, 'sanpham' => $sanpham]);
        }
        else
        {
            echo 'Không tìm thấy!';
        }
    }

    public function lienhe()
    {
        return view('pages.lienhe');
    }

}
