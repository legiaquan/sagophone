<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHang;
use App\ChiTietDonHang;
class DonHangController extends Controller
{
    //
    public function getDanhSach()
    {
    	$donhang = DonHang::orderBy('id','DESC')->get();
        
    	return view('admin.donhang.danhsach',['donhang'=>$donhang]);
    }

    public function getThem()
    {
    	return view('admin.DonHang.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbdonhang,tenhang|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên hãng đã tồn tại',
    		'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    	]);

    	$donhang = new DonHang;
    	$donhang->tenhang = $request->txtTen;
    	//đổi có dấu thành không dấu
    	//echo changeTitle($request->txtTen);
    	$donhang->save();

    	return redirect('admin/donhang/them')->with('thongbao','Thêm thành công '.$donhang->tenhang. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$id_donhang = DonHang::find($id);
    	return view('admin.donhang.sua',['id_donhang'=>$id_donhang]);
    }

    public function postSua(Request $request,$id)
    {
    	$donhang = DonHang::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbdonhang,tenhang|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên thể loại đã tồn tại',
    		'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    	]);
    	$donhang->tenhang = $request->txtTen;
    	$donhang->save();
    	return redirect('admin/donhang/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id)
    {
    	$donhang = DonHang::find($id);
    	$donhang->delete();
    	return redirect('admin/donhang/danhsach')->with('thongbao','Bạn đã xóa thành công '.$donhang->tenhang);
    }
}
