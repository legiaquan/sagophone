<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\DanhSachBanner;
use App\Banner;
use App\ChiTietSanPham;
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

    public function activeThem(Request $request,$id,$id_chitietsanpham)
    {
        $chitietsanpham = ChiTietSanPham::find($id_chitietsanpham);
        $sanpham = SanPham::find($chitietsanpham->id_sanpham);
        $danhsachbanner = new DanhSachBanner;
        $danhsachbanner->id_banner = $id;
        $danhsachbanner->id_chitietsanpham = $id_chitietsanpham;
        $danhsachbanner->phantramkhuyenmai = 0;
        $danhsachbanner->save();
        

       	return redirect('admin/danhsachbanner/them/'.$id)->with('thongbao','Thêm thành công '.$sanpham->tensp.' - '.$chitietsanpham->mau->mau."!");
    }

    public function getSua($id)
    {
       	$danhsachbanner = DanhSachBanner::find($id);
        $chitietsanpham = ChiTietSanPham::find($danhsachbanner->id_chitietsanpham);
        $sanpham = SanPham::find($chitietsanpham->id_sanpham);
        $banner = Banner::find($danhsachbanner->id_banner);
        return view('admin.danhsachbanner.sua',['danhsachbanner'=>$danhsachbanner,'sanpham'=>$sanpham,'banner'=>$banner]);
    }

    public function postSua($id, Request $request)
    {
        $this->validate($request,
        [
            'txtKhuyenmai'=>'max:2'
            
        ],
        [
            'txtKhuyenmai.min'=>'Khuyến mãi tối đa 99%',
        ]);

        $danhsachbanner = DanhSachBanner::find($id);
        $danhsachbanner->phantramkhuyenmai = $request->txtKhuyenmai;
        $danhsachbanner->save();
        
        return redirect('admin/danhsachbanner/sua/'.$id)->with('thongbao','Sửa thành công !');
    }
    public function getXoa($id,$id_chitietsanpham)
    {
        $chitietsanpham = ChiTietSanPham::find($id_chitietsanpham);
        $sanpham = SanPham::find($chitietsanpham->id_sanpham);
        $danhsachbanner = DanhSachBanner::where('id_banner',$id)->where('id_chitietsanpham',$id_chitietsanpham)->first();

        return view('admin.danhsachbanner.xoa',['danhsachbanner'=>$danhsachbanner,'sanpham'=>$sanpham,'chitietsanpham'=>$chitietsanpham]);
    }
    public function postXoa(Request $request,$id,$id_chitietsanpham)
    {   $chitietsanpham = ChiTietSanPham::find($id_chitietsanpham);
        $sanpham = SanPham::find($chitietsanpham->id_sanpham);
    	$tensp = $sanpham->tensp;
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        DB::table('tbdanhsachbanner')->where('id_banner', $id)->where('id_chitietsanpham',$id_chitietsanpham)->delete();
        return redirect('admin/danhsachbanner/danhsach/'.$id)->with('thongbao','Bạn đã xóa thành công '.$tensp.' - '.$chitietsanpham->mau->mau."!");
    }
}
