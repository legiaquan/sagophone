<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use App\NhanVien;
use App\Level;
use App\ThanhVien;
use App\DonHang;
use DB;
class AdminController extends Controller
{
    //
    //
   
   public function index()
   {
        $sothanhvien = ThanhVien::where('trangthai',1)->count();
        $sodonhangpending = DonHang::where('tinhtrang','apending')->count();
        $soluongsanphamdaban = DB::table('tbchitietdonhang')
                ->join('tbdonhang','tbchitietdonhang.id_chitietsanpham','tbdonhang.id')
                ->where('tbdonhang.tinhtrang','complete')
                ->sum('tbchitietdonhang.soluong');
        $doanhthu = DB::table('tbchitietdonhang')
                ->join('tbdonhang','tbchitietdonhang.id_chitietsanpham','tbdonhang.id')
                ->where('tbdonhang.tinhtrang','complete')
                ->sum('tbchitietdonhang.giamua');
        $sanphambanchay = DB::table('tbchitietdonhang')
                ->join('tbchitietsanpham','tbchitietdonhang.id_chitietsanpham','tbchitietsanpham.id')
                ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                ->join('tbhangdt','tbsanpham.id_hangdt','tbhangdt.id')
                ->join('tbmau','tbchitietsanpham.id_mau','tbmau.id')
                ->selectRaw('sum(tbchitietdonhang.soluong) as soluongbanchay,tbsanpham.tensp,tbhangdt.tenhang,tbsanpham.hinhsp,tbchitietsanpham.*,tbmau.mau,tbmau.mamau')
                ->groupBy('tbchitietdonhang.id_chitietsanpham')
                ->orderBy('soluongbanchay','desc')
                ->take(10)
                ->get();
        //dd($sanphambanchay);
        return view('admin.trang-chu',compact('sothanhvien','sodonhangpending','soluongsanphamdaban','doanhthu','sanphambanchay'));
   }
	public function getLogin()
	{
		return view('admin.login');
	}
	public function postLogin(Request $request)
	{

		$this->validate($request,
			[
				'txtUsername' => 'required|exists:admins,username',
				'txtPassword' => 'required'
			],
			[
				'txtUsername.exists' => 'Tài khoản không tồn tại',
				'txtUsername.required' => 'Bạn chưa nhập username',
				'txtPassword.required' => 'Bạn chưa nhập password'
			]);
		if(Auth::guard('admin')->attempt(['username'=>$request->txtUsername,'password'=>$request->txtPassword]))
		{
            if(Auth::guard('admin')->user()->trangthai !=1)
            {
                Auth::guard('admin')->logout();
                return redirect()->back()->withInput($request->only('txtUsername'))->with('thongbao','Tài khoản đã bị khóa');
            }
			return redirect('admin/trang-chu.html');
		}
		else
		{
			return redirect()->back()->withInput($request->only('txtUsername'))->with('thongbao','Mật khẩu không đúng!');
		}

	}
	public function getLogout()
	{
		Auth::guard('admin')->logout();
        return redirect('admin/dangnhap');
	}
	 public function getSuathongtin($id)
    {
        $nhanvien = NhanVien::find($id);
        $level = Level::all();
        return view('admin.suathongtin',['nhanvien'=>$nhanvien,'level'=>$level]);
    }

    public function postSuathongtin(Request $request,$id)
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
        $nhanvien->save();

        return redirect('admin/suathongtin/'.$id)->with('thongbao','Sửa thành công '.$nhanvien->username);
    }


}
