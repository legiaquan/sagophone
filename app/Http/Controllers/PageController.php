<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Mapper;

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

use App\BinhLuan;

use App\ThanhVien;

use App\NhanVien;

use DB;

use Session;

class PageController extends Controller
{

	function __construct()
	{
		$nhomsanpham = NhomSanPham::all();
		$hangdt = HangDT::all();
		$sanphammoi =       DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','3')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphambanchay =   DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','4')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphamhotdeals =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','2')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphambanchay1 =   DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','4')
                            ->orderBy('id','DESC')->take(3)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphambanchay2 =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','4')
                            ->take(3)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphammoi1 =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','3')
                            ->orderBy('id','DESC')->take(3)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphammoi2 =      DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','3')
                            ->take(3)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphamhotdeals1 =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','2')
                            ->orderBy('id','DESC')->take(3)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
		$sanphamhotdeals2 = DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','2')
                            ->take(3)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai')
                            ->get();
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
        $hinh = Banner::where('id',2)->value('hinhbanner');
        $hangdt3 = HangDT::take(3)->get();
    	return view('pages/trangchu',[
            'hangdt3' => $hangdt3,
            'hinh' => $hinh
        ]);
    	
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
        $tinlienquan = TinTuc::where('id_loaitin',$tintuc->id_loaitin)->where('id','<>',$id)->take(3)->get();
        $tinkhuyenmai = TinTuc::where('id_loaitin', '2')->where('id','<>',$id)->take(3)->get();
        $tenadmin = NhanVien::where('id',$tintuc->id_admins)->value('name');
    	return view('pages/tintuc',['tintuc' => $tintuc, 'tinlienquan' => $tinlienquan, 
            'tinkhuyenmai' => $tinkhuyenmai,
            'tenadmin' => $tenadmin
        ]);
    }

    public function cuahang(Request $request)
    {
    	$sanphamdt = DB::table('tbsanpham')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbsanpham')->where('id_nhom','2')->get();
    	$sanphamapple = SanPham::where('id_hangdt','1')->get();
    	$sanphamsamsung = SanPham::where('id_hangdt','2')->get();
    	$sanphamsony = SanPham::where('id_hangdt','3')->get();
    	$sanphamnokia = SanPham::where('id_hangdt','4')->get();
    	$sanphamvsmart = SanPham::where('id_hangdt','5')->get();	
        // $sanpham = DB::table('tbsanpham')->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        // ->join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham');
        $sanpham = DB::table('tbchitietsanpham')
                    ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                    ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                    ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                    ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
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
         if($request->rom)
        {
                $rom = $request->rom;
                switch ($rom) {
                    case '32':
                        $sanpham->where('rom','32');
                        break;
                    case '64' :
                        $sanpham->where('rom','64');
                        break;
                    case '128':
                        $sanpham->where('rom','128');
                        break;
                    case '256' :
                        $sanpham->where('rom','256');
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
                        $sanpham->orderBy('id','DESC');
                        break;
                    case 'price_max' :
                        $sanpham->orderBy('gia','DESC');
                        break;
                    case 'price_min' :
                        $sanpham->orderBy('gia','ASC');
                        break;
                    default:
                        $sanpham->inRandomOrder();
                }
               
        }

        $sanpham = $sanpham->paginate(9);
        
    	return view('pages/cuahang',
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

   
    public function chitietsp($id, Request $request)
    {
    	$chitiet = ChiTietSanPham::find($id);
    	$sanphamlienquan =   DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')                          
                            ->where('tbchitietsanpham.id','<>',$id)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai','tbdanhsachbanner.id_banner')
                            ->where('id_nhom',$chitiet->sanpham->id_nhom)
                            ->inRandomOrder()->take(4)->get();
    	//var_dump(getGiaMin($id));
        $hinhchitiet = ChiTietSanPham::where('id_sanpham',$chitiet->id_sanpham)->get();
        if($request->id_mau)
        {
            if($request->id_mau == 1)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','1')->first();
            }
            else if($request->id_mau == 2)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','2')->first();
            }
            else if($request->id_mau == 3)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','3')->first();
            }
            else if($request->id_mau == 4)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','4')->first();
            }
             else if($request->id_mau == 5)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','5')->first();
            }
            else if($request->id_mau == 6)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','6')->first();
            }
            else if($request->id_mau == 7)
            {
                $chitiet = $chitiet->where('id_sanpham',$chitiet->id_sanpham)->where('id_mau','7')->first();
            }
        }
        else
            $chitiet = $chitiet;
        
    	return view('pages/chitiet',['chitiet' => $chitiet, 'sanphamlienquan' => $sanphamlienquan, 'hinhchitiet' => $hinhchitiet]);
    }

    public function hotdeals(Request $request)
    {
        $sanphamhotdealstt =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','2')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai');
        if($request->orderby)
        {
                $orderby = $request->orderby;
                switch($orderby)
                {
                    // case 'new' :
                    //     $sanphamhotdealstt->orderBy('tbsanpham.id','DESC');
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
          if($request->rom)
        {
                $rom = $request->rom;
                switch ($rom) {
                    case '32':
                        $sanphamhotdealstt->where('rom','32');
                        break;
                    case '64' :
                        $sanphamhotdealstt->where('rom','64');
                        break;
                    case '128':
                        $sanphamhotdealstt->where('rom','128');
                        break;
                    case '256' :
                        $sanphamhotdealstt->where('rom','256');
                        break;
                    default:
                       
                }
                
        }

        if($request->id_hang)
        {
            $id_hang = $request->id_hang;
            switch ($id_hang) {
                case '1':
                    $sanphamhotdealstt->where('id_hangdt','1');
                    break;
                case '2':
                    $sanphamhotdealstt->where('id_hangdt','2');
                    break;
                case '3':
                    $sanphamhotdealstt->where('id_hangdt','3');
                    break;
                case '4':
                    $sanphamhotdealstt->where('id_hangdt','4');
                    break;
                case '5':
                    $sanphamhotdealstt->where('id_hangdt','5');
                    break;
                default:
                     # code...
                    break;
            }
               
        }
        $sanphamhotdealstt = $sanphamhotdealstt->paginate(6);
        $hinh = Banner::where('id',2)->value('hinhbanner');
        return view('pages/hotdeals',['sanphamhotdealstt' => $sanphamhotdealstt, 'hinh' => $hinh]);
    }

    public function timkiem(Request $request)
    {
        // $this->validate($request,
        //     [
        //     'keyword' => 'required'
        //     ]
        // ,
        //     [
        //         'keyword.required' => 'Vui lòng nhập từ khóa!'
        //     ]);

        $keyword = $request->keyword;
        if($keyword == null && $request->timkiem == null)
        {
            return redirect()->back()->with('thongbao','Vui lòng chọn hãng hoặc nhập từ khóa!');
        }
        if($keyword == null)
        {
            if($request->timkiem)
            {
                if($request->timkiem == 1)
                {
                    $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','1')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 2)
                {
                    $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','2')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 3)
                {
                    $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','3')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 4)
                {
                   $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','4')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 5)
                {
                   $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','5')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }

            }
            
            else
            {
                $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
            }
        }
        else
        {
            if($request->timkiem)
            {
                if($request->timkiem == 1)
                {
                    $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','1')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 2)
                {
                    $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','2')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 3)
                {
                    $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','3')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 4)
                {
                   $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','4')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }
                else if($request->timkiem == 5)
                {
                   $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('id_hangdt','5')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
                }

            }
            
            else
            {
                $sanpham = DB::table('tbchitietsanpham')
                        ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                        ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                        ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                        ->where('tensp','like','%'.$keyword.'%')
                        ->orWhere('mota','like','%'.$keyword.'%')
                        ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.id_banner','tbdanhsachbanner.phantramkhuyenmai');
            }
        }  
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
        $tongsanpham = $sanpham->get();
        $sanpham = $sanpham->paginate(6);
        return view('pages/timkiem',['keyword' => $keyword, 'sanpham' => $sanpham, 'tongsanpham' => $tongsanpham]);
        
    }

    public function lienhe()
    {
        return view('pages.lienhe');
    }

    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Bạn chưa nhập email!',
                'password.required' => 'Bạn chưa nhập password!'
            ]
        );
        if(Auth::attempt(['username' => $request->email, 'password' => $request->password])
            || Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
             return redirect('trangchu');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Sai tên đăng nhập, Email hoặc mật khẩu');
        }
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    public function binhluan(Request $request, $id)
    {
        $sanpham = SanPham::find($id);
        $binhluan = new BinhLuan;
        $binhluan->id_sanpham = $id;
        $binhluan->id_thanhvien = Auth::user()->id;
        $binhluan->binhluan = $request->binhluan;
        $binhluan->save();
        return redirect("chitiet/$id/".$sanpham->id.".html")->with('thongbao','Bình luận thành công!');
    }

    public function getNguoiDung()
    {
        return view('pages.nguoidung');
    }

    public function postNguoiDung(Request $request)
    {
        $user = Auth::user();
        $this->validate($request,
            [
                'Name' => 'required|min:5',
                // 'Email' => 'required|unique:users,email',
              
            ],
            [
                'Name.required' => 'Bạn chưa nhập tên người dùng!',
                'Name.min' => 'Tên người dùng phải có ít nhất 3 ký tự!'
                // 'Email.required' => 'Bạn chưa nhập email!',
                // 'Email.email' => 'Bạn nhập chưa đúng dạng email!',
                // 'Email.unique' => 'Email đã có người sử dụng!',
               
            ]
        );
        $user->name = $request->Name;
        $user->diachi = $request->Address;
        if($request->changePassword == "on")
        {
            $this->validate($request,
            [
                
                'Password' => 'required|min:6|max:30',
                'againPassword' => 'required|same:Password'
            ],
            [
                'Password.required' => 'Bạn chưa nhập mật khẩu!',
                'Password.min' => 'Mật khẩu phải có nhiều hơn 6 ký tự!',
                'Password.max' => 'Mật khẩu không được nhiều hơn 30 ký tự!',
                'againPassword.required' => 'Bạn chưa nhập lại mật khẩu!',
                'againPassword.same' => 'Mật khẩu không trùng khớp!',             
            ]
        );
            $user->password = bcrypt($request->Password);
        }
        $user->sdt = $request->Phone;
        $user->save();
        return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công');
    }

    public function getDangKy()
    {
        return view('pages.dangky');
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request,
            [
                'Ten' => 'required|min:5|unique:tbthanhvien,username',
                'Email' => 'required|unique:tbthanhvien,email',
                'Password' => 'required|min:6|max:30',
                'againPassword' => 'required|same:Password'
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên đăng nhập!',
                'Ten.min' => 'Tên đăng nhập phải có ít nhất 3 ký tự!',
                'Ten.unique' => 'Đã có người sử dụng tên!',
                'Email.required' => 'Bạn chưa nhập email!',
                'Email.email' => 'Bạn nhập chưa đúng định dạng email!',
                'Email.unique' => 'Email đã có người sử dụng!',
                'Password.required' => 'Bạn chưa nhập mật khẩu!',
                'Password.min' => 'Mật khẩu phải có nhiều hơn 6 ký tự!',
                'Password.max' => 'Mật khẩu không được nhiều hơn 30 ký tự!',
                'againPassword.required' => 'Bạn chưa nhập lại mật khẩu!',
                'againPassword.same' => 'Mật khẩu không trùng khớp!',             
            ]
        );
        $user = new ThanhVien;
        $user->username = $request->Ten;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->trangthai = 1;
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng ký tài khoản thành công!');
    }
}
