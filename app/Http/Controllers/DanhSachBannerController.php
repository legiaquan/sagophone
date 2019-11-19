<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\DanhSachBanner;
use App\Banner;
use Illuminate\Support\Facades\DB;
class DanhSachBannerController extends Controller
{
    public function getDanhSach($id)
    {
    	$banner = Banner::find($id);
        $danhsachbanner = DanhSachBanner::where('id_banner',$id)->get();
        return view('admin.danhsachbanner.danhsach',['danhsachbanner'=>$danhsachbanner,'banner'=>$banner]);
        
    }

    public function getThem($id)
    {
        $banner = Banner::find($id);
        $sanpham = SanPham::all();
        $danhsachbanner = DanhSachBanner::where('id_banner',$id)->get();
        //var_dump($sanpham);
        return view('admin.danhsachbanner.them',['sanpham'=>$sanpham,'banner'=>$banner,'danhsachbanner'=>$danhsachbanner]);
    }

    public function activeThem(Request $request,$id,$id_sanpham)
    {
        $sanpham = SanPham::find($id_sanpham);
        $danhsachbanner = new DanhSachBanner;
        $danhsachbanner->id_banner = $id;
        $danhsachbanner->id_sanpham = $id_sanpham;
        $danhsachbanner->save();
        

       	return redirect('admin/danhsachbanner/them/'.$id)->with('thongbao','Thêm thành công '.$sanpham->tensp."!");
    }

    public function getSua($id,$id_sanpham)
    {
       	$danhsachbanner = DanhSachBanner::where('id_banner',$id)->where('id_sanpham',$id_sanpham)->first();
        return view('admin.danhsachbanner.sua',['danhsachbanner'=>$danhsachbanner]);
    }

    public function postSua($id,$id_sanpham, Request $request)
    {
        $this->validate($request,
        [
            'txtKhuyenmai'=>'required|min:2'
            
        ],
        [
            'txtKhuyenmai.min'=>'Khuyến mãi tối đa 99%',
            'txtKhuyenmai.required'=>'Bạn khuyến mãi mới'
        ]);

        $danhsachbanner = DB::table('tbdanhsachbanner')
	        ->where('id_banner',$id)->where('id_sanpham',$id_sanpham)
	        ->update(['phantramkhuyenmai'=>$request->txtKhuyenmai]);
        
        return redirect('admin/danhsachbanner/sua/'.$id.'/'.$id_sanpham)->with('thongbao','Sửa thành công !');
    }
    public function getXoa($id,$id_sanpham)
    {
        $danhsachbanner = DanhSachBanner::where('id_banner',$id)->where('id_sanpham',$id_sanpham)->first();
        return view('admin.danhsachbanner.xoa',['danhsachbanner'=>$danhsachbanner]);
    }
    public function postXoa(Request $request,$id,$id_sanpham)
    {
    	$sanpham = SanPham::find($id_sanpham);
    	$tensp = $sanpham->tensp;
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        DB::table('tbdanhsachbanner')->where('id_banner', $id)->where('id_sanpham',$id_sanpham)->delete();
        return redirect('admin/danhsachbanner/danhsach/'.$id)->with('thongbao','Bạn đã xóa thành công '.$tensp."!");
    }
}
