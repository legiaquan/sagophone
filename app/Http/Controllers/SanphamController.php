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
        $sanpham = SanPham::orderBy('tensp')->get();
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
            'txtTen'=>'required|min:3|unique:tbsanpham,tensp',
            'txtMota'=>'required'
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên sản phẩm',
            'txtTen.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự',
            'txtTen.unique'=>'Tên sản phẩm đã tồn tại',
            'txtMota.required'=>'Bạn chưa nhập mô tả sản phẩm'
        ]);

        $sanpham = new SanPham;
        $sanpham->tensp = $request->txtTen;
        $sanpham->id_hangdt = $request->txtHangDT;
        $sanpham->id_nhom = $request->txtNhomSP;
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
        	$Hinh = str_random(4)."-sago-".$namefile;
        	while (file_exists("upload/imgSanPham/".$Hinh)) {
        		# code...
        		$Hinh = str_random(4)."-".$namefile;
        	}
        	$file->move("upload/imgSanPham",$Hinh);
        	$sanpham->hinhsp = $Hinh;
        }
        else
        {
        	$sanpham->hinhsp = "";
        }
        $sanpham->manhinh = $request->txtManhinh;
        $sanpham->hedieuhanh = $request->txtHedieuhanh;
        $sanpham->camtruoc = $request->txtCamtruoc;
        $sanpham->camsau = $request->txtCamsau;
        $sanpham->cpu = $request->txtCPU;
        $sanpham->thesim = $request->txtThesim;
        $sanpham->dungluongpin = $request->txtPin;
        $sanpham->mota = $request->txtMota;
        $sanpham->ram = $request->txtRam;
        $sanpham->rom = $request->txtRom;

        $sanpham->save();

        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công '.$sanpham->tensp.' - '.$sanpham->ram.'/'.$sanpham->rom.'GB'.' vào CSDL!');
    }

    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        $hangdt = HangDT::all();
    	$nhomsp = NhomSanPham::all();
        return view('admin.sanpham.sua',['sanpham' => $sanpham, 'hangdt'=>$hangdt, 'nhomsp' => $nhomsp]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'txtTen'=>'required|min:3',
            'txtMota'=>'required'
            
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên sản phẩm',
            'txtTen.unique'=>'Tên sản phẩm đã tồn tại',
            'txtTen.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự',
            'txtMota.required'=>'Bạn chưa nhập mô tả sản phẩm'
        ]);

        $sanpham = SanPham::find($id);
        $sanpham->tensp = $request->txtTen;
        $sanpham->id_hangdt = $request->txtHangDT;
        $sanpham->id_nhom = $request->txtNhomSP;
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
                $Hinh = str_random(4)."-".$namefile."-sago";
            }

            $file->move("upload/imgSanPham",$Hinh);
            // unlink("upload/imgSanPham/".$sanpham->Hinh);
            $sanpham->hinhsp = $Hinh;
        }
        else
        {
            $sanpham->hinhsp = $sanpham->hinhsp;
        }
        $sanpham->manhinh = $request->txtManhinh;
        $sanpham->hedieuhanh = $request->txtHedieuhanh;
        $sanpham->camtruoc = $request->txtCamtruoc;
        $sanpham->camsau = $request->txtCamsau;
        $sanpham->cpu = $request->txtCPU;
        $sanpham->thesim = $request->txtThesim;
        $sanpham->dungluongpin = $request->txtPin;
        $sanpham->mota = $request->txtMota;
        $sanpham->ram = $request->txtRam;
        $sanpham->rom = $request->txtRom;

        $sanpham->save();
       
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công '.$sanpham->tensp.' - '.$sanpham->ram.'/'.$sanpham->rom.'GB'.' vào CSDL!');
    }
    public function getXoa($id)
    {
        $sanpham = SanPham::find($id);
        return view('admin.sanpham.xoa',['sanpham'=>$sanpham]);
    }
    public function postXoa(Request $request,$id)
    {
        $sanpham = SanPham::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Bạn đã xóa thành công '.$sanpham->tensp);
    }
}
