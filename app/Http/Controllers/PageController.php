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

use App\KhoangGia;

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
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','3')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai', 'tbdanhsachbanner.id_banner','tbmau.mau')
                            ->get();
		$sanphambanchay =   DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','4')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai', 'tbdanhsachbanner.id_banner','tbmau.mau')
                            ->get();
		$sanphamhotdeals =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner','2')
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai','tbmau.mau'
                                ,'tbdanhsachbanner.id_banner')
                            ->get();
		view()->share('nhomsanpham',$nhomsanpham);
		view()->share('hangdt',$hangdt);
		view()->share('sanphammoi',$sanphammoi);
		view()->share('sanphambanchay',$sanphambanchay);
		view()->share('sanphamhotdeals',$sanphamhotdeals);

	}

    public function trangchu()
    {
        $banner = Banner::all();
        $apple = SanPham::join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->where('id_hangdt',1)->inRandomOrder()->first();
        $samsung = SanPham::join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->where('id_hangdt',2)->inRandomOrder()->first();
        $nokia = SanPham::join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
        ->where('id_hangdt',4)->inRandomOrder()->first();
        $bannerhotdeals = Banner::where('id',2)->first();
        $bannernew = Banner::where('id',3)->first();
        $bannerbanchay = Banner::where('id',4)->first();

        //$khuyenmai = LoaiTin::join('tbtintuc','tbloaitin.id','tbtintuc.id_loaitin')->get();
        $khuyenmai = TinTuc::join('tbloaitin','tbtintuc.id_loaitin','tbloaitin.id')->select('tbloaitin.tenloaitin','tbtintuc.*');

        $khuyenmai = $khuyenmai->paginate(6);
    	return view('pages/trangchu',[
            'apple' => $apple,
            'banner' => $banner,
            'samsung' => $samsung,
            'nokia' => $nokia,
            'bannerhotdeals' => $bannerhotdeals,
            'bannernew' => $bannernew,
            'bannerbanchay' => $bannerbanchay,
            'khuyenmai' => $khuyenmai
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
        if($request->id)
        {
            $tinmoi = TinTuc::orderBy('created_at','DESC')->where('id_loaitin',$request->id)->first();
            $tinmoi1 = TinTuc::orderBy('created_at','DESC')->where('id_loaitin',$request->id)->whereNotIn('id',$tinmoi)->take(2)->get();
            $tinmoi2 = TinTuc::orderBy('created_at','DESC')->where('id_loaitin',$request->id)->whereNotIn('id_loaitin',$tinmoi)->whereNotIn('id_loaitin',$tinmoi1)->get();
        }
        else
        {
            $tinmoi = TinTuc::orderBy('created_at','DESC')->first();
            $tinmoi1 = TinTuc::orderBy('created_at','DESC')->skip(1)->take(2)->get();
            foreach($tinmoi1 as $tm1)
            {
                $tinmoi2 = TinTuc::orderBy('created_at','DESC')
                        ->where('id','!=',$tinmoi->id)->whereNotIn('id',$tm1)->get();
            }
        }
    	return view('pages/loaitin',['loaitin' => $loaitin, 'tintuc' => $tintuc, 
            'tinmoi' => $tinmoi,
            'tinmoi1' => $tinmoi1,
            'tinmoi2' => $tinmoi2
        ]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('id_loaitin',$tintuc->id_loaitin)->where('id','<>',$id)->take(3)->get();
        $tinkhac = TinTuc::where('id_loaitin','<>',$tintuc->id_loaitin)->take(3)->get();
        $tinketiep = TinTuc::where('id_loaitin',$tintuc->id_loaitin)->where('id','<>',$id)->first();
        $tenadmin = NhanVien::where('id',$tintuc->id_admins)->value('name');
    	return view('pages/tintuc',['tintuc' => $tintuc, 'tinlienquan' => $tinlienquan, 
            'tinkhac' => $tinkhac,
            'tinketiep' => $tinketiep,
            'tenadmin' => $tenadmin
        ]);
    }

    public function cuahang(Request $request)
    {
    	$sanphamdt = DB::table('tbchitietsanpham')->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')->where('id_nhom','1')->get();
    	$sanphampk = DB::table('tbchitietsanpham')->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')->where('id_nhom','2')->get();
	
        $sanpham = DB::table('tbchitietsanpham')
                    ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                    ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                    ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                    ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbmau.mau');
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
            $sanpham = $sanpham->where('rom',$rom);
                
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

        if($request->grand)
        {
            $grand = $request->grand;
            $sanpham = $sanpham->where('id_hangdt',$grand);
               
        }
        if($request->id_banner)
        {
            $sanpham = $sanpham->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                    ->where('id_banner',$request->id_banner);
        }

        $sanpham = $sanpham->paginate(9);
        $thuonghieu = HangDT::all();
        $rom = SanPham::select('rom')->distinct()->orderBy('rom','ASC')->get();
        $khoanggia = KhoangGia::all();
        $banner = Banner::all();
    	return view('pages/cuahang',
    		['sanpham' => $sanpham,
    		'sanphamdt' => $sanphamdt, 
    		'sanphampk' => $sanphampk,
    		'thuonghieu' => $thuonghieu,
            'rom' => $rom,
            'khoanggia' => $khoanggia,
            'banner' => $banner
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

    public function getBanner($id,Request $request)
    {
        $banner =  DB::table('tbchitietsanpham')
                            ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                            ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                            ->join('tbnhomsanpham','tbsanpham.id_nhom','tbnhomsanpham.id')
                            ->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
                            ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                            ->where('tbdanhsachbanner.id_banner',$id)
                            ->select('tbsanpham.tensp','tbhangdt.tenhang','tbsanpham.hinhsp','tbchitietsanpham.*','tbdanhsachbanner.phantramkhuyenmai');
        if($request->orderby)
        {
                $orderby = $request->orderby;
                switch($orderby)
                {
                    // case 'new' :
                    //     $banner->orderBy('tbsanpham.id','DESC');
                    case 'price_max' :
                        $banner->orderBy('gia','DESC');
                        break;
                    case 'price_min' :
                        $banner->orderBy('gia','ASC');
                        break;
                    default:
                        
                }
               
        }
        if($request->price)
        {
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $banner->where('gia','<',1000000)->orderBy('gia','ASC');
                        break;
                    case '2' :
                        $banner->whereBetween('gia',[1000000,3000000])->orderBy('gia','ASC');
                        break;
                    case '3' :
                        $banner->whereBetween('gia',[3000000,5000000])->orderBy('gia','ASC');
                        break;
                    case '4' :
                        $banner->whereBetween('gia',[5000000,7000000])->orderBy('gia','ASC');
                        break;
                    case '5' :
                        $banner->whereBetween('gia',[7000000,1000000])->orderBy('gia','ASC');
                        break;
                     case '6':
                        $banner->where('gia','>',10000000)->orderBy('gia','ASC');
                        break;
                    default:
                       
                }
                
        }
          if($request->rom)
        {
                $rom = $request->rom;
                switch ($rom) {
                    case '32':
                        $banner->where('rom','32');
                        break;
                    case '64' :
                        $banner->where('rom','64');
                        break;
                    case '128':
                        $banner->where('rom','128');
                        break;
                    case '256' :
                        $banner->where('rom','256');
                        break;
                    default:
                       
                }
                
        }

        if($request->id_hang)
        {
            $id_hang = $request->id_hang;
            switch ($id_hang) {
                case '1':
                    $banner->where('id_hangdt','1');
                    break;
                case '2':
                    $banner->where('id_hangdt','2');
                    break;
                case '3':
                    $banner->where('id_hangdt','3');
                    break;
                case '4':
                    $banner->where('id_hangdt','4');
                    break;
                case '5':
                    $banner->where('id_hangdt','5');
                    break;
                default:
                     # code...
                    break;
            }
               
        }
        $sanphamhotdealstt = $banner->paginate(6);
        $hinh = Banner::where('id',$id)->value('hinhbanner');
        return view('pages/banner',['sanphamhotdealstt' => $sanphamhotdealstt, 'hinh' => $hinh]);
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
