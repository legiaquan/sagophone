<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HangDT;
use App\NhomSanPham;
class SanPhamController extends Controller
{
    //
    public function getDanhSach()
    {
        $sanpham = SanPham::orderBy('id','DESC')->get();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }

    public function getThem()
    {
    	$hangdt = HangDT::all();
    	$nhomsp = NhomSanPham::all();
        return view('admin.sanpham.them',['hangdt'=>$hangdt,'nhomsp'=>$nhomsp]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTenSP'=>'required|min:3|unique:tbsanpham,tensp',
            'txtGia'=>'required',
            'txtMoTa'=>'required'
            
        ],
        [
            'txtTenSP.required'=>'Bạn chưa nhập tên sản phẩm',
            'txtTenSP.unique'=>'Tên sản phẩm đã tồn tại',
            'txtTenSP.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự',
            'txtGia.required'=>'Bạn chưa nhập giá',
            'txtMoTa.required'=>'Bạn chưa nhập mô tả sản phẩm'
        ]);

        $sanpham = new SanPham;
        $sanpham->tensp = $request->txtTenSP;
        $sanpham->id_hangdt = $request->HangDT;
        $sanpham->id_nhom = $request->NhomSP;
        $sanpham->gia = $request->txtGia;
        $sanpham->soluong = $request->txtSL;
        $sanpham->khuyenmai = $request->txtKM;

        //$sanpham->hinhsp = $request->flHinh;
        
        if($request->hasFile('flHinh'))
        {
        	$file = $request->file('flHinh');
        	$duoi = $file->getClientOriginalExtension();
        	if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        	{
        		return redirect('admin/sanpham/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
        	}
        	$namefile = $file->getClientOriginalName();
        	$Hinh = str_random(4)."_".$namefile;
        	while (file_exists("upload/imgSanPham/".$Hinh)) {
        		# code...
        		$Hinh = str_random(4)."_".$namefile;
        	}
        	$file->move("upload/imgSanPham",$Hinh);
        	$sanpham->hinhsp = $Hinh;
        }
        else
        {
        	$sanpham->hinhsp = "";
        }

        $sanpham->mota = $request->txtMoTa;
        $sanpham->new = $request->rdoNew;
        $sanpham->seo = $request->rdoSeo;

        $sanpham->save();

        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công '.$sanpham->tensp. ' vào CSDL!');
    }

    public function getSua($id)
    {
        $id_sanpham = SanPham::find($id);
        $hangdt = HangDT::all();
    	$nhomsp = NhomSanPham::all();
        return view('admin.sanpham.sua',['id_sanpham' => $id_sanpham, 'hangdt'=>$hangdt, 'nhomsp' => $nhomsp]);
    }

    public function postSua(Request $request,$id)
    {
        $sanpham = SanPham::find($id);
        $this->validate($request,
        [
            'txtTenSP'=>'required|min:3',
            'txtGia'=>'required',
            'txtMoTa'=>'required'
            
        ],
        [
            'txtTenSP.required'=>'Bạn chưa nhập tên sản phẩm',
           
            'txtTenSP.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự',
            'txtGia.required'=>'Bạn chưa nhập giá',
            'txtMoTa.required'=>'Bạn chưa nhập mô tả sản phẩm'
        ]);

        
        $sanpham->tensp = $request->txtTenSP;
        $sanpham->id_hangdt = $request->HangDT;
        $sanpham->id_nhom = $request->NhomSP;
        $sanpham->gia = $request->txtGia;
        $sanpham->soluong = $request->txtSL;
        $sanpham->khuyenmai = $request->txtKM;
     

        //$sanpham->hinhsp = $request->flHinh;
        
        if($request->hasFile('flHinh'))
        {
        	$file = $request->file('flHinh');
        	$duoi = $file->getClientOriginalExtension();
        	if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        	{
        		return redirect('admin/sanpham/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
        	}
        	$namefile = $file->getClientOriginalName();
        	$Hinh = str_random(4)."_".$namefile;
        	while (file_exists("upload/imgSanPham/".$Hinh)) {
        		# code...
        		$Hinh = str_random(4)."_".$namefile;
        	}

        	$file->move("upload/imgSanPham",$Hinh);
        	unlink("upload/imgSanPham/".$sanpham->Hinh);
        	$sanpham->hinhsp = $Hinh;
        }


        $sanpham->mota = $request->txtMoTa;
        $sanpham->new = $request->rdoNew;
        $sanpham->seo = $request->rdoSeo;

        $sanpham->save();
       
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id)
    {
        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Bạn đã xóa thành công '.$sanpham->tensp);
    }
}
