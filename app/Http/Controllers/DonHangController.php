<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHang;
use App\ChiTietDonHang;
use App\ChiTietSanPham;
class DonHangController extends Controller
{
    //
    public function getDanhSach()
    {
    	$donhang = DonHang::orderBy('created_at', 'DESC')->get();
        
    	return view('admin.donhang.danhsach',['donhang'=>$donhang]);
    }

    public function getSua($id)
    {
    	$donhang = DonHang::find($id);
    	return view('admin.donhang.sua',['donhang'=>$donhang]);
    }

    public function postSua(Request $request,$id)
    {
    	$donhang = DonHang::find($id);
    	$this->validate($request,
    	[
    		'txtTen'=>'required|min:2|max:50',
            'txtSDT'=>'required|min:10|max:11',
            'txtDiachi'=>'required|min:10'
    	],
    	[
    		'txtTen.required'=>'Bạn chưa nhập tên người nhận',
    		'txtTen.min'=>'Tên người nhận phải có độ dài từ 2 cho đến 50 ký tự',
    		'txtTen.max'=>'Tên người nhận phải có độ dài từ 2 cho đến 50 ký tự',
            'txtSDT.required'=>'Bạn chưa nhập SĐT',
            'txtSDT.min'=>'SĐT phải có độ dài từ 10 cho đến 11 ký tự',
            'txtSDT.max'=>'SĐT phải có độ dài từ 10 cho đến 11 ký tự',
            'txtDiachi.required'=>'Bạn chưa nhập địa chỉ',
            'txtDiachi.min'=>'SĐT phải có độ dài từ 10 ký tự',
    	]);
    	$donhang->tennguoinhan = $request->txtTen;
        $donhang->sdtnguoinhan = $request->txtSDT;
        $donhang->diachinguoinhan = $request->txtDiachi;
    	$donhang->save();
    	return redirect('admin/donhang/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXuly($id,$tinhtrang,$id_admins)
    {
        //xu ly so luong thanh toán trong tbchitietsanpham
        $chitietdonhang = ChiTietDonHang::where('id_donhang',$id)->get();
        //lay don hang
    	$donhang = DonHang::find($id);
        
        if($tinhtrang == 'confirmed'){
            $donhang->id_admins =$id_admins;
            //giảm số lượng
            foreach($chitietdonhang as $row){
                $chitietsanpham = ChiTietSanPham::find($row->id_chitietsanpham);
                $chitietsanpham->soluong -=$row->soluong;
                $chitietsanpham->save();
                unset($chitietsanpham);
            }

        }
        if($tinhtrang == 'cancel')
        {
            if($donhang->tinhtrang != 'apending')
            {
                foreach($chitietdonhang as $row){
                    $chitietsanpham = ChiTietSanPham::find($row->id_chitietsanpham);
                    $chitietsanpham->soluong +=$row->soluong;
                    $chitietsanpham->save();
                    unset($chitietsanpham);
                }
            }
        }
        $donhang->tinhtrang = $tinhtrang;
    	$donhang->save();



        $xuly = 'Thành Công';
        if($tinhtrang =='cancel')
            $xuly ='Hủy';
        else if($tinhtrang =='confirmed')
            $xuly = 'Đã xác nhận';
        else if($tinhtrang == 'delivery')
            $xuly = 'Đang giao hàng';
        
    	return redirect('admin/donhang/danhsach')->with('thongbao','Bạn đã thanh đổi thành công trạng thái đơn hàng '.$donhang->madh.' sang trạng thái '.$xuly.'!');
    }
}
