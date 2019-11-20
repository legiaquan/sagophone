<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Mau;
use App\ChiTietSanPham;
use Illuminate\Support\Facades\DB;
class ChiTietSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $chitietsanpham = ChiTietSanPham::all();
        return view('admin.chitietsanpham.danhsach',['chitietsanpham'=>$chitietsanpham]);
    }

    public function getThem($id)
    {
    	$sanpham = SanPham::find($id);
    	$mau = Mau::all();
    	$chitietsanpham = DB::table('tbchitietsanpham')->where('id_sanpham',$id)->get();
        //var_dump($chitietsanpham);
        return view('admin.chitietsanpham.them',['sanpham'=>$sanpham,'mau'=>$mau,'chitietsanpham'=>$chitietsanpham]);
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

        $chitietsanpham = new ChiTietSanPham;
        $chitietsanpham->id_sanpham = $id;
        $chitietsanpham->id_mau = $request->txtMau;
        $chitietsanpham->soluong = $request->txtSoluong;
        $chitietsanpham->gia = $request->txtGia;
        

        $chitietsanpham->save();

        return redirect('admin/chitietsanpham/them/'.$id)->with('thongbao','Thêm thành công '.$chitietsanpham->sanpham->tensp.' '.$chitietsanpham->sanpham->ram.'GB '.$chitietsanpham->sanpham->rom.'GB '.$chitietsanpham->mau->mau.' ,Giá: '.number_format($chitietsanpham->gia).'VNĐ ,Số lượng: '.$chitietsanpham->soluong.' vào hiển thị!');
    }

    public function getSua($id,$id_mau)
    {
        $chitietsanpham = ChiTietSanPham::where('id_sanpham',$id)->where('id_mau',$id_mau)->first();
        $dshienthi = DB::table('tbchitietsanpham')->where('id_sanpham',$id)->get();
    	$mau = Mau::all();
    	//echo $chitietsanpham->gia;
    	//var_dump($chitietsanpham);
        return view('admin.chitietsanpham.sua',['chitietsanpham'=>$chitietsanpham,'mau'=>$mau,'dshienthi'=>$dshienthi]);
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
        // $chitietsanpham = DB::table('tbchitietsanpham')->where('id_sanpham',$id)->where('id_mau',$id_mau)->first();
        // //var_dump($chitietsanpham);
        // $chitietsanpham->id_mau = $request->txtMau;
        // $chitietsanpham->soluong = $request->txtSoluong;
        // $chitietsanpham->gia = $request->txtGia;
        // $chitietsanpham->ram = $request->txtRam;
        // $chitietsanpham->rom = $request->txtRom;
        // $chitietsanpham->save(['id_sanpham'=>$id]);
        $sp = SanPham::find($id);
        $tensp = $sp->tensp;
        $ram = $sp->ram;
        $rom = $sp->rom;
        DB::table('tbchitietsanpham')
            ->where('id_sanpham',$id)->where('id_mau',$id_mau)
            ->update(['id_mau' => $request->txtMau, 'soluong'=> $request->txtSoluong, 'gia'=> $request->txtGia]);
        return redirect('admin/chitietsanpham/sua/'.$id.'/'.$request->txtMau)->with('thongbao','Sửa thành công '.$tensp.' '.$ram.'GB '.$rom.'GB '.$request->txtMau.' ,Giá: '.number_format($request->txtGia).'VNĐ ,Số lượng: '.$request->txtSoluong.' vào hiển thị!');
    }
    public function getXoa($id,$id_mau)
    {
        $sanpham = SanPham::find($id);
        $mau = Mau::find($id_mau);
        return view('admin.chitietsanpham.xoa',['sanpham'=>$sanpham,'mau'=>$mau]);
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
        DB::table('tbchitietsanpham')->where('id_sanpham', $id)->where('id_mau',$id_mau)->delete();
        return redirect('admin/chitietsanpham/danhsach')->with('thongbao','Bạn đã xóa thành công '.$tensp);
    }
}
