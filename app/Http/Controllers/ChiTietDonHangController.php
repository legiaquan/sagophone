<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\DonHang;
use App\ChiTietDonHang;
class ChiTietDonHangController extends Controller
{
    public function getDanhSach($id)
    {
        $chitietdonhang = DB::table('tbchitietdonhang')
        					->where('tbchitietdonhang.id_donhang',$id)
        					->join('tbchitietsanpham','tbchitietdonhang.id_chitietsanpham','=','tbchitietsanpham.id')
        					->join('tbsanpham','tbchitietsanpham.id_sanpham','=','tbsanpham.id')
        					->select('tbchitietdonhang.giamua','tbchitietdonhang.soluong','tbchitietdonhang.star','tbchitietdonhang.nhanxet','tbsanpham.tensp','tbsanpham.hinhsp')
        					->get();
        $donhang = Donhang::find($id);

        //var_dump($chitietdonhang);
        return view('admin.chitietdonhang.danhsach',['chitietdonhang'=>$chitietdonhang,'donhang'=>$donhang]);
    }
}
