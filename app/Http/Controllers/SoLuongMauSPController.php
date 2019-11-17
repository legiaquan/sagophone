<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Mau;
use App\SoLuongMauSP;
use Illuminate\Support\Facades\DB;
class SoLuongMauSPController extends Controller
{
    public function getDanhSach()
    {
        $soluongmausp = SoLuongMauSP::all();
        return view('admin.soluongmausp.danhsach',['soluongmausp'=>$soluongmausp]);
    }

    public function getThem($id)
    {
    	$sanpham = SanPham::find($id);
    	$mau = Mau::all();
    	$soluongmausp = DB::table('tbsoluongmausp')->where('id_sanpham',$id)->get();
        return view('admin.soluongmausp.them',['sanpham'=>$sanpham,'mau'=>$mau,'soluongmausp'=>$soluongmausp]);
    }

    public function postThem(Request $request,$id)
    {
        $this->validate($request,
        [
            'txtSoluong'=>'required|min:1',
            'txtGia'=>'required|min:6',
        ],
        [
            'txtSoluong.required'=>'Bạn chưa nhập số lượng sản phẩm',
            'txtSoluong.min'=>'Số lượng sản phẩm phải có ít nhất 1 ký tự',
            'txtGia.min'=>'Giá sản phẩm phải có ít nhất từ 100.000 VNĐ',
            'txtGia.required'=>'Bạn chưa nhập giá sản phẩm',

        ]);

        $soluongmausp = new SoLuongMauSP;
        $soluongmausp->id_sanpham = $id;
        $soluongmausp->id_mau = $request->txtMau;
        $soluongmausp->soluong = $request->txtSoluong;
        $soluongmausp->gia = $request->txtGia;
        

        $soluongmausp->save();

        return redirect('admin/soluongmausp/them/'.$id)->with('thongbao','Thêm thành công '.$soluongmausp->sanpham->tensp.' '.$soluongmausp->sanpham->ram.'GB '.$soluongmausp->sanpham->rom.'GB '.$soluongmausp->mau->mau.' ,Giá: '.number_format($soluongmausp->gia).'VNĐ ,Số lượng: '.$soluongmausp->soluong.' vào hiển thị!');
    }

    public function getSua($id,$id_mau)
    {
        $soluongmausp = SoLuongMauSP::where('id_sanpham',$id)->where('id_mau',$id_mau)->first();
    	$mau = Mau::all();
    	//echo $soluongmausp->gia;
    	//var_dump($soluongmausp);
        return view('admin.soluongmausp.sua',['soluongmausp'=>$soluongmausp,'mau'=>$mau]);
    }

    public function postSua($id,$id_mau, Request $request)
    {
        $this->validate($request,
        [
            'txtSoluong'=>'required|min:1',
            'txtGia'=>'required|min:6'
            
        ],
        [
            'txtSoluong.required'=>'Bạn chưa nhập số lượng sản phẩm',
            'txtSoluong.min'=>'Số lượng sản phẩm phải có ít nhất 1 ký tự',
            'txtGia.min'=>'Giá sản phẩm phải có ít nhất từ 100.000 VNĐ',
            'txtGia.required'=>'Bạn chưa nhập giá sản phẩm'
        ]);
        // $soluongmausp = DB::table('tbsoluongmausp')->where('id_sanpham',$id)->where('id_mau',$id_mau)->first();
        // //var_dump($soluongmausp);
        // $soluongmausp->id_mau = $request->txtMau;
        // $soluongmausp->soluong = $request->txtSoluong;
        // $soluongmausp->gia = $request->txtGia;
        // $soluongmausp->ram = $request->txtRam;
        // $soluongmausp->rom = $request->txtRom;
        // $soluongmausp->save(['id_sanpham'=>$id]);
        $sp = SanPham::find($id);
        $tensp = $sp->tensp;
        $ram = $sp->ram;
        $rom = $sp->rom;
        DB::table('tbsoluongmausp')
            ->where('id_sanpham',$id)->where('id_mau',$id_mau)
            ->update(['id_mau' => $request->txtMau, 'soluong'=> $request->txtSoluong, 'gia'=> $request->txtGia]);
        return redirect('admin/soluongmausp/sua/'.$id.'/'.$request->txtMau)->with('thongbao','Sửa thành công '.$tensp.' '.$ram.'GB '.$rom.'GB '.$request->txtMau.' ,Giá: '.number_format($request->txtGia).'VNĐ ,Số lượng: '.$request->txtSoluong.' vào hiển thị!');
    }
    public function getXoa($id,$id_mau)
    {
        $sanpham = SanPham::find($id);
        $mau = Mau::find($id_mau);
        return view('admin.soluongmausp.xoa',['sanpham'=>$sanpham,'mau'=>$mau]);
    }
    public function postXoa(Request $request,$id,$id_mau)
    {
        $sp = SanPham::find($id);
        $tensp = $sp->tensp;
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        DB::table('tbsoluongmausp')->where('id_sanpham', $id)->where('id_mau',$id_mau)->delete();
        return redirect('admin/soluongmausp/danhsach')->with('thongbao','Bạn đã xóa thành công '.$tensp);
    }
}
