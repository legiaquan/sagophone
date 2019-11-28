<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\BinhLuan;
use DB;
class BinhLuanController extends Controller
{
    //
    public function getDanhSach()
    {
        $sanpham = SanPham::orderBy('tensp')->get();
        return view('admin.comment-san-pham.danhsach',['sanpham'=>$sanpham]);
    }
    public function getBinhLuan($id)
    {
        $binhluan = DB::table('tbbinhluan')
        				->where('id_sanpham',$id)
        				->join('tbthanhvien','tbbinhluan.id_thanhvien','=','tbthanhvien.id')
        				->select('tbbinhluan.*','tbthanhvien.username','tbthanhvien.name')
        				->orderBy('tbbinhluan.created_at','desc')
        				->get();
        //var_dump($binhluan);
        $sanpham = SanPham::find($id);
        return view('admin.comment-san-pham.binhluan',['binhluan'=>$binhluan,'sanpham'=>$sanpham]);
    }
    public function getXoa($id,$id_sanpham)
    {
    	$binhluan = BinhLuan::find($id);
    	$binhluan->delete();

    	return redirect('admin/comment-san-pham/binhluan/'.$id_sanpham);
    }
}
