<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhomSanPham;
class NhomSanPhamController extends Controller
{
    //
    public function getDanhSach()
    {
        $nhomsanpham = NhomSanPham::all();
        return view('admin.nhomsanpham.danhsach',['nhomsanpham'=>$nhomsanpham]);
    }

    public function getThem()
    {
        return view('admin.nhomsanpham.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTen'=>'required|unique:tbnhomsanpham,tennhom|min:2|max:50'
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên nhóm',
            'txtTen.unique'=>'Tên nhóm đã tồn tại',
            'txtTen.min'=>'Tên nhóm phải có độ dài từ 2 cho đến 50 ký tự',
            'txtTen.max'=>'Tên nhóm phải có độ dài từ 2 cho đến 50 ký tự',
        ]);

        $nhomsanpham = new NhomSanPham;
        $nhomsanpham->tennhom = $request->txtTen;
        //đổi có dấu thành không dấu
        //echo changeTitle($request->txtTen);
        $nhomsanpham->save();

        return redirect('admin/nhomsanpham/them')->with('thongbao','Thêm thành công '.$nhomsanpham->tennhom. ' vào CSDL!');
    }

    public function getSua($id)
    {
        $id_nhomsp = NhomSanPham::find($id);
        return view('admin.nhomsanpham.sua',['id_nhomsp'=>$id_nhomsp]);
    }

    public function postSua(Request $request,$id)
    {
        $nhomsp = NhomSanPham::find($id);
        $this->validate($request,
        [
            'txtTen'=>'required|unique:tbnhomsanpham,tennhom|min:2|max:50'
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên hãng',
            'txtTen.unique'=>'Tên thể loại đã tồn tại',
            'txtTen.min'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
            'txtTen.max'=>'Tên hãng phải có độ dài từ 2 cho đến 50 ký tự',
        ]);
        $nhomsp->tennhom = $request->txtTen;
        $nhomsp->save();
        return redirect('admin/nhomsanpham/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id)
    {
        $nhomsp = NhomSanPham::find($id);
        $nhomsp->delete();
        return redirect('admin/nhomsanpham/danhsach')->with('thongbao','Bạn đã xóa thành công '.$nhomsp->tennhom);
    }
}
