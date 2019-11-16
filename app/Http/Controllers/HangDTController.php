<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HangDT;
class HangDTController extends Controller
{
    //
    public function getDanhSach()
    {
    	$hangdt = HangDT::all();
    	return view('admin.hangdt.danhsach',['hangdt'=>$hangdt]);
    }

    public function getThem()
    {
    	return view('admin.hangdt.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbhangdt,tenhang|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên hãng đã tồn tại',
    		'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    	]);

    	$hangdt = new HangDT;
    	$hangdt->tenhang = $request->txtTen;
    	//đổi có dấu thành không dấu
    	//echo changeTitle($request->txtTen);
    	$hangdt->save();

    	return redirect('admin/hangdt/them')->with('thongbao','Thêm thành công '.$hangdt->tenhang. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$hangdt = HangDT::find($id);
    	return view('admin.hangdt.sua',['hangdt'=>$hangdt]);
    }

    public function postSua(Request $request,$id)
    {
    	$hangdt = HangDT::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbhangdt,tenhang|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên thể loại đã tồn tại',
    		'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
    	]);
    	$hangdt->tenhang = $request->txtTen;
    	$hangdt->save();
    	return redirect('admin/hangdt/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getXoa($id)
    {
        $hangdt = HangDT::find($id);

        return view('admin.hangdt.xoa',['hangdt'=>$hangdt]);
    }
    public function postXoa(Request $request, $id)
    {
    	$hangdt = HangDT::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
    	$hangdt->delete();
    	return redirect('admin/hangdt/danhsach')->with('thongbao','Bạn đã xóa thành công '.$hangdt->tenhang);
    }
}
