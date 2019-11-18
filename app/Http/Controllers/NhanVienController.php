<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\Level;
class NhanVienController extends Controller
{
    public function getDanhSach()
    {
        $nhanvien = NhanVien::all();
        return view('admin/nhanvien/danhsach',['nhanvien'=>$nhanvien]);    
    }

    public function getThem()
    {
    	$level = Level::all();
    	return view('admin/nhanvien/them',['level'=>$level]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtUsername'       =>  'required|min:3|unique:admins,username',
                'txtHoten'          =>  'required',
                'txtEmail'          =>  'required|email|unique:admins,email',
                'txtPassword'       =>  'required|min:3|max:32',
                'txtPasswordAgain'  =>  'required|same:txtPassword',
                'txtSDT'            =>  'required|min:10|max:11',
                'txtDiaChi'         =>  'required'
            ],
            [
                'txtUsername.required'      =>  'Bạn chưa nhập username',
                'txtUsername.min'           =>  'Username phải có ít nhất 3 ký tự trở lên',
                'txtUsername.unique'        =>  'Username đã tồn tại',
                'txtHoten.required'         =>  'Bạn chưa nhập họ tên',
                'txtEmail.required'         =>  'Bạn chưa nhập email',
                'txtEmail.email'            =>  'Bạn chưa nhập đúng định dạng email',
                'txtEmail.unique'           =>  'Email đã tồn tại',
                'txtPassword.required'      =>  'Bạn chưa nhập password',
                'txtPassword.min'           =>  'Password phải có ít nhất 3 ký tự',
                'txtPassword.max'           =>  'Password chỉ được tối đa 32 ký tự',
                'txtPasswordAgain.required' =>  'Bạn chưa nhập lại mật khẩu',
                'txtPasswordAgain.same'     =>  'Password nhập lại chưa khớp',
                'txtSDT.required'           =>  'Bạn chưa nhập số điện thoại',
                'txtSDT.min'                =>  'SĐT không đúng',
                'txtSDT.max'                =>  'SĐT không đúng',
                'txtDiaChi.required'        =>  'Bạn chưa nhập địa chỉ'
            ]);

        $nhanvien = new NhanVien;
        $nhanvien->username = $request->txtUsername;
        $nhanvien->name = $request->txtHoten;
        $nhanvien->diachi = $request->txtDiaChi;
        $nhanvien->email = $request->txtEmail;
        $nhanvien->sdt = $request->txtSDT;
        $nhanvien->password = bcrypt($request->txtPassword);
        $nhanvien->trangthai = $request->TrangThai;
        $nhanvien->id_level = $request->Level;
        $nhanvien->save();

        return redirect('admin/nhanvien/them')->with('thongbao','Thêm thành công nhân viên '.$nhanvien->username);

    }

    public function getSua($id)
    {
        $nhanvien = NhanVien::find($id);
        $level = Level::all();
        return view('admin/nhanvien/sua',['nhanvien'=>$nhanvien,'level'=>$level]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
            [
                'txtHoten'          =>  'required',
                'txtSDT'            =>  'required|min:10|max:11',
                'txtDiaChi'         =>  'required'
            ],
            [
                'txtHoten.required'         =>  'Bạn chưa nhập họ tên',
                'txtSDT.required'           =>  'Bạn chưa nhập số điện thoại',
                'txtSDT.min'                =>  'SĐT không đúng',
                'txtSDT.max'                =>  'SĐT không đúng',
                'txtDiaChi.required'        =>  'Bạn chưa nhập địa chỉ'
            ]);

        $nhanvien = NhanVien::find($id);
        $nhanvien->name = $request->txtHoten;
        $nhanvien->diachi = $request->txtDiaChi;
        $nhanvien->sdt = $request->txtSDT;
        $nhanvien->email = $request->txtEmail;
        if(isset($request->changePass))
        {
            $this->validate($request,
            [
                'txtPassword'       =>  'required|min:3|max:32',
                'txtPasswordAgain'  =>  'required|same:txtPassword'
            ],
            [
                'txtPassword.required'      =>  'Bạn chưa nhập password',
                'txtPassword.min'           =>  'Password phải có ít nhất 3 ký tự',
                'txtPassword.max'           =>  'Password chỉ được tối đa 32 ký tự',
                'txtPasswordAgain.required' =>  'Bạn chưa nhập lại mật khẩu',
                'txtPasswordAgain.same'     =>  'Password nhập lại chưa khớp'
            ]);
            $nhanvien->pass = bcrypt($request->txtPassword);
        }
        $nhanvien->trangthai = $request->TrangThai;
        $nhanvien->id_level = $request->Level;
        $nhanvien->save();

        return redirect('admin/nhanvien/sua/'.$id)->with('thongbao','Sửa thành công '.$nhanvien->username);
    }

    public function getXoa($id)
    {
        $nhanvien = NhanVien::find($id);
        return view('admin.nhanvien.xoa',['nhanvien'=>$nhanvien]);
    }
    public function postXoa(Request $request,$id)
    {
        $nhanvien = NhanVien::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        $nhanvien->delete();
        return redirect('admin/nhanvien/danhsach/')->with('thongbao','Sửa thành công người dùng '.$nhanvien->username);
    }
}
