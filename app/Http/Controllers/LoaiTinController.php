<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
class LoaiTinController extends Controller
{
     public function getDanhSach()
    {
    	$loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem()
    {
    	return view('admin.loaitin.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbloaitin,tenloaitin|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên loại tin',
    		'txtTen.unique'=>'Tên loại tin đã tồn tại',
    		'txtTen.min'=>'Tên loại tin phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên loại tin phải có độ dài từ 2 cho đến 50 ký tự',
    	]);

    	$loaitin = new LoaiTin;
    	$loaitin->tenloaitin = $request->txtTen;
    	$loaitin->trangthai = $request->txtTrangthai;
    	//đổi có dấu thành không dấu
    	//echo changeTitle($request->txtTen);
    	$loaitin->save();

    	return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công '.$loaitin->tenloaitin. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$loaitin = LoaiTin::find($id);
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id)
    {
    	$loaitin = LoaiTin::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbloaitin,tenloaitin|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên loại tin đã tồn tại',
    		'txtTen.min'=>'Tên loại tin phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên loại tin phải có độ dài từ 2 cho đến 50 ký tự',
    	]);
    	$loaitin->tenloaitin = $request->txtTen;
    	$loaitin->trangthai = $request->txtTrangthai;
    	$loaitin->save();
    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getXoa($id)
    {
        $loaitin = LoaiTin::find($id);

        return view('admin.loaitin.xoa',['loaitin'=>$loaitin]);
    }
    public function postXoa(Request $request, $id)
    {
    	$loaitin = LoaiTin::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
    	$loaitin->delete();
    	return redirect('admin/loaitin/danhsach')->with('thongbao','Bạn đã xóa thành công '.$loaitin->tenhang);
    }
}
