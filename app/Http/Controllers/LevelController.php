<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
class LevelController extends Controller
{
    public function getDanhSach()
    {
    	$level = Level::all();
    	return view('admin.level.danhsach',['level'=>$level]);
    }

    public function getThem()
    {
    	return view('admin.level.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:level,tenlevel|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên chức vụ',
    		'txtTen.unique'=>'Tên chức vụ đã tồn tại',
    		'txtTen.min'=>'Tên chức vụ phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên chức vụ phải có độ dài từ 2 cho đến 50 ký tự',
    	]);

    	$level = new Level;
    	$level->tenlevel = $request->txtTen;
    	//đổi có dấu thành không dấu
    	//echo changeTitle($request->txtTen);
    	$level->save();

    	return redirect('admin/level/them')->with('thongbao','Thêm thành công '.$level->tenlevel. ' vào CSDL!');
    }

    public function getSua($id)
    {
    	$level = Level::find($id);
    	return view('admin.level.sua',['level'=>$level]);
    }

    public function postSua(Request $request,$id)
    {
    	$level = Level::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|unique:level,tenlevel|min:2|max:50'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên hãng',
    		'txtTen.unique'=>'Tên chức vụ đã tồn tại',
    		'txtTen.min'=>'Tên chức vụ phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên chức vụ phải có độ dài từ 2 cho đến 50 ký tự',
    	]);
    	$level->tenlevel = $request->txtTen;
    	$level->save();
    	return redirect('admin/level/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getXoa($id)
    {
        $level = Level::find($id);

        return view('admin.level.xoa',['level'=>$level]);
    }
    public function postXoa(Request $request, $id)
    {
    	$level = Level::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
    	$level->delete();
    	return redirect('admin/level/danhsach')->with('thongbao','Bạn đã xóa thành công '.$level->tenhang);
    }
}
