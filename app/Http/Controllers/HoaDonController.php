<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use App\ChiTietHoaDon;
class HoaDonController extends Controller
{
    //
    public function getDanhSach()
    {
    	$hoadon = HoaDon::orderBy('id','DESC')->get();
        
    	return view('admin.hoadon.danhsach',['hoadon'=>$hoadon]);
    }

    public function getThem()
    {
    	return view('admin.hoadon.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbhoadon,tenhang|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên hãng đã tồn tại',
    		'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    	]);

    	$hoadon = new HoaDon;
    	$hoadon->tenhang = $request->txtTen;
    	//đổi có dấu thành không dấu
    	//echo changeTitle($request->txtTen);
    	$hoadon->save();

    	return redirect('admin/hoadon/them')->with('thongbao','Thêm thành công '.$hoadon->tenhang. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$id_hoadon = HoaDon::find($id);
    	return view('admin.hoadon.sua',['id_hoadon'=>$id_hoadon]);
    }

    public function postSua(Request $request,$id)
    {
    	$hoadon = HoaDon::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbhoadon,tenhang|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên thể loại đã tồn tại',
    		'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    	]);
    	$hoadon->tenhang = $request->txtTen;
    	$hoadon->save();
    	return redirect('admin/hoadon/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id)
    {
    	$hoadon = HoaDon::find($id);
    	$hoadon->delete();
    	return redirect('admin/hoadon/danhsach')->with('thongbao','Bạn đã xóa thành công '.$hoadon->tenhang);
    }
}
