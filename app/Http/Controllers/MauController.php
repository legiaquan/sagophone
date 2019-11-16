<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mau;
class MauController extends Controller
{
    //
    public function getDanhSach()
    {
    	$mau = Mau::all();
    	return view('admin.mau.danhsach',['mau'=>$mau]);
    }

    public function getThem()
    {
    	return view('admin.mau.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:tbmau,mau|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên màu',
    		'txtTen.unique'=>'Tên màu đã tồn tại',
    		'txtTen.min'=>'Tên màu phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên màu phải có độ dài từ 2 cho đến 50 ký tự',
    	]);

    	$mau = new Mau;
    	$mau->mau = $request->txtTen;
    	$mau->mamau = $request->txtMamau;
    	//đổi có dấu thành không dấu
    	//echo changeTitle($request->txtTen);
    	$mau->save();

    	return redirect('admin/mau/them')->with('thongbao','Thêm thành công '.$mau->mau. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$mau = Mau::find($id);
    	return view('admin.mau.sua',['mau'=>$mau]);
    }

    public function postSua(Request $request,$id)
    {
    	$mau = Mau::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên màu',
    		'txtTen.min'=>'Tên màu phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên màu phải có độ dài từ 2 cho đến 50 ký tự',
    	]);
    	$mau->mau = $request->txtTen;
    	$mau->mamau = $request->txtMamau;
    	$mau->save();
    	return redirect('admin/mau/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getXoa($id)
    {
        $mau = Mau::find($id);

        return view('admin.mau.xoa',['mau'=>$mau]);
    }
    public function postXoa(Request $request, $id)
    {
    	$mau = Mau::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
    	$mau->delete();
    	return redirect('admin/mau/danhsach')->with('thongbao','Bạn đã xóa thành công '.$mau->tenhang);
    }
}
