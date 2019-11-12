<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThanhVien;

class ThanhVienController extends Controller
{
    //
    public function getDanhSach()
    {
        $thanhvien = ThanhVien::all();
        return view('admin/thanhvien/danhsach',['thanhvien'=>$thanhvien]);    
    }

    public function getThem()
    {
    	return view('admin/thanhvien/them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtUsername'       =>  'required|min:3|unique:tbthanhvien,username',
                'txtHoten'          =>  'required',
                'txtEmail'          =>  'required|email|unique:tbthanhvien,email',
                'txtPassword'       =>  'required|min:3|max:32',
                'txtPasswordAgain'  =>  'required|same:txtPassword',
                'txtSDT'            =>  'required|min:10|max:12',
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

        $user = new ThanhVien;
        $user->username = $request->txtUsername;
        $user->hoten = $request->txtHoten;
        $user->diachi = $request->txtDiaChi;
        $user->email = $request->txtEmail;
        $user->sdt = $request->txtSDT;
        $user->pass = bcrypt($request->txtPassword);
        $user->trangthai = $request->TrangThai;
        $user->level = $request->Level;
        $user->save();

        return redirect('admin/thanhvien/them')->with('thongbao','Thêm thành công');

    }

    public function getSua($id)
    {
        $user = ThanhVien::find($id);
        return view('admin/thanhvien/sua',['user'=>$user]);
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

        $user = ThanhVien::find($id);
        $user->hoten = $request->txtHoten;
        $user->diachi = $request->txtDiaChi;
        $user->sdt = $request->txtSDT;
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
            $user->pass = bcrypt($request->txtPassword);
        }
        $user->trangthai = $request->TrangThai;
        $user->level = $request->Level;
        $user->save();

        return redirect('admin/thanhvien/sua/'.$id)->with('thongbao','Sửa thành công '.$user->username);
    }

    public function getXoa($id)
    {
        $user = ThanhVien::find($id);
        $user->delete();
        return redirect('admin/thanhvien/danhsach/')->with('thongbao','Sửa thành công người dùng '.$id);
    }
}
