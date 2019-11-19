<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\DanhSachBanner;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
     public function getDanhSach()
    {
    	$banner = Banner::all();
        $dembanner= DB::table('tbdanhsachbanner')->get();
        //var_dump($dembanner);
    	return view('admin.banner.danhsach',['banner'=>$banner,'dembanner'=>$dembanner]);
    }

    public function getThem()
    {
    	return view('admin.banner.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbbanner,tenbanner|min:2|max:255',
            'txtNgaybatdau'=>'required',
            'txtNgayketthuc'=>'required'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên banner',
    		'txtTen.unique'=>'Tên banner đã tồn tại',
    		'txtTen.min'=>'Tên banner phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên banner phải có độ dài từ 2 cho đến 50 ký tự',
            'txtNgaybatdau.required'=>'Bạn chưa chọn ngày bắt đầu',
            'txtNgayketthuc.required'=>'Bạn chưa chọn ngày kết thúc'
    	]);

    	$banner = new Banner;
    	$banner->tenbanner = $request->txtTen;
        if($request->hasFile('flHinh'))
        {
            $file = $request->file('flHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/banner/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            // $namefile = $file->getClientOriginalName();
            $namefile = time();
            $Hinh = str_random(4)."-sago-".$namefile.".".$duoi;
            while (file_exists("upload/imgKhuyenMai/".$Hinh)) {
                # code...
                $Hinh = str_random(4)."-".$namefile;
            }
            $file->move("upload/imgKhuyenMai",$Hinh);
            $banner->hinhbanner = $Hinh;
        }
        else
        {
            $banner->hinhbanner = "";
        }
        $banner->ngaybatdau = $request->txtNgaybatdau;
        $banner->ngayketthuc = $request->txtNgayketthuc;
        $banner->trangthai = $request->txtTrangthai;
        $banner->id_admins=1;

        //echo $namefile;
    	// đổi có dấu thành không dấu
    	// echo changeTitle($request->txtTen);
    	$banner->save();

    	return redirect('admin/banner/them')->with('thongbao','Thêm thành công '.$banner->tenbanner. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$banner = Banner::find($id);
    	return view('admin.banner.sua',['banner'=>$banner]);
    }

    public function postSua(Request $request,$id)
    {
    	$this->validate($request,
        [
            'txtTen'=>'required|unique:tbbanner,tenbanner|min:2|max:255',
            'txtNgaybatdau'=>'required',
            'txtNgayketthuc'=>'required'
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên banner',
            'txtTen.unique'=>'Tên banner đã tồn tại',
            'txtTen.min'=>'Tên banner phải có độ dài từ 2 cho đến 50 ký tự',
            'txtTen.max'=>'Tên banner phải có độ dài từ 2 cho đến 50 ký tự',
            'txtNgaybatdau.required'=>'Bạn chưa chọn ngày bắt đầu',
            'txtNgayketthuc.required'=>'Bạn chưa chọn ngày kết thúc'
        ]);

        $banner = Banner::find($id);
        $banner->tenbanner = $request->txtTen;
        if($request->hasFile('flHinh'))
        {
            $file = $request->file('flHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/banner/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            // $namefile = $file->getClientOriginalName();
            $namefile = time();
            $Hinh = str_random(4)."-sago-".$namefile.".".$duoi;
            while (file_exists("upload/imgKhuyenMai/".$Hinh)) {
                # code...
                $Hinh = str_random(4)."-".$namefile;
            }
            $file->move("upload/imgKhuyenMai",$Hinh);
            $banner->hinhbanner = $Hinh;
        }
        // else
        // {
        //     $banner->hinhbanner = $banner->hinhbanner;
        // }
        $banner->ngaybatdau = $request->txtNgaybatdau;
        $banner->ngayketthuc = $request->txtNgayketthuc;
        $banner->trangthai = $request->txtTrangthai;
        $banner->id_admins=1;

        //echo $namefile;
        // đổi có dấu thành không dấu
        // echo changeTitle($request->txtTen);
        $banner->save();

        return redirect('admin/banner/sua/'.$id)->with('thongbao','Sửa thành công '.$banner->tenbanner. ' vào CSDL!');
    }
    public function getXoa($id)
    {
        $banner = Banner::find($id);

        return view('admin.banner.xoa',['banner'=>$banner]);
    }
    public function postXoa(Request $request, $id)
    {
    	$banner = Banner::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
    	$banner->delete();
    	return redirect('admin/banner/danhsach')->with('thongbao','Bạn đã xóa thành công '.$banner->tenbanner);
    }
}
