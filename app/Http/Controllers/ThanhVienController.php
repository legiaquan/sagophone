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

        $thanhvien = new ThanhVien;
        $thanhvien->username = $request->txtUsername;
        $thanhvien->name = $request->txtHoten;
        $thanhvien->diachi = $request->txtDiaChi;
        $thanhvien->email = $request->txtEmail;
        $thanhvien->sdt = $request->txtSDT;
        $thanhvien->password = bcrypt($request->txtPassword);
        $thanhvien->trangthai = $request->TrangThai;
        $thanhvien->save();

        return redirect('admin/thanhvien/them')->with('thongbao','Thêm thành công nhân viên '.$thanhvien->username);

    }

    public function getSua($id)
    {
        $thanhvien = ThanhVien::find($id);
        return view('admin/thanhvien/sua',['thanhvien'=>$thanhvien]);
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

        $thanhvien = ThanhVien::find($id);
        $thanhvien->name = $request->txtHoten;
        $thanhvien->diachi = $request->txtDiaChi;
        $thanhvien->sdt = $request->txtSDT;
        $thanhvien->email = $request->txtEmail;
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
            $thanhvien->pass = bcrypt($request->txtPassword);
        }
        $thanhvien->trangthai = $request->TrangThai;
        $thanhvien->save();

        return redirect('admin/thanhvien/sua/'.$id)->with('thongbao','Sửa thành công '.$thanhvien->username);
    }

    public function getXoa($id)
    {
        $thanhvien = thanhvien::find($id);
        return view('admin.thanhvien.xoa',['thanhvien'=>$thanhvien]);
    }
    public function postXoa(Request $request,$id)
    {
        $thanhvien = ThanhVien::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        $thanhvien->delete();
        return redirect('admin/thanhvien/danhsach/')->with('thongbao','Sửa thành công người dùng '.$thanhvien->username);
    }
}
