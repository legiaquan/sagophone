<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem()
    {
    	$loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['loaitin'=>$loaitin]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTen'=>'required|min:3|unique:tbtintuc,tieude',
            'txtMota'=>'required',
            'txtNoidung'=>'required'
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên tiêu đề',
            'txtTen.min'=>'Tên tiêu đề phải có ít nhất 3 ký tự',
            'txtTen.unique'=>'Tên tiêu đề đã tồn tại',
            'txtMota.required'=>'Bạn chưa nhập mô tả tin tức',
            'txtNoidung.required'=>'Bạn chưa nhập nội dung tin tức'
        ]);

        $tintuc = new TinTuc;
        $tintuc->tieude = $request->txtTen;
        $tintuc->id_loaitin = $request->txtLoaitin;
        $tintuc->id_admins = 1;
        $tintuc->mota = $request->txtMota;
        //$tintuc->img = $request->flHinh;
        
        if($request->hasFile('flHinh'))
        {
        	$file = $request->file('flHinh');
        	$duoi = $file->getClientOriginalExtension();
        	if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        	{
        		return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
        	}
        	$namefile = $file->getClientOriginalName();
        	$Hinh = str_random(4)."-sago-".$namefile;
        	while (file_exists("upload/imgTinTuc/".$Hinh)) {
        		# code...
        		$Hinh = str_random(4)."-".$namefile;
        	}
        	$file->move("upload/imgTinTuc",$Hinh);
        	$tintuc->img = $Hinh;
        }
        else
        {
        	$tintuc->img = "";
        }
        $tintuc->noidung = $request->txtNoidung;

        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công vào CSDL!');
    }

    public function getSua($id)
    {
        $tintuc = TinTuc::find($id);
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.sua',['tintuc' => $tintuc, 'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'txtTen'=>'required|min:3',
            'txtMota'=>'required',
            'txtNoidung'=>'required'
            
        ],
        [
            'txtTen.required'=>'Bạn chưa nhập tên tiêu đề',
            'txtTen.min'=>'Tên tiêu đề phải có ít nhất 3 ký tự',
            'txtMota.required'=>'Bạn chưa nhập mô tả tin tức',
            'txtNoidung.required'=>'Bạn chưa nhập nội dung tin tức'
        ]);

        $tintuc =  TinTuc::find($id);
        $tintuc->tieude = $request->txtTen;
        $tintuc->id_loaitin = $request->txtLoaitin;
        $tintuc->id_admins = 1;
        $tintuc->mota = $request->txtMota;
        
       	if($request->hasFile('flHinh'))
        {
            $file = $request->file('flHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            $namefile = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$namefile;
            while (file_exists("upload/imgTinTuc/".$Hinh)) {
                # code...
                $Hinh = str_random(4)."-".$namefile."-sago";
            }

            $file->move("upload/imgTinTuc",$Hinh);
            // unlink("upload/imgtintuc/".$tintuc->Hinh);
            $tintuc->img = $Hinh;
        }
        $tintuc->noidung = $request->txtNoidung;
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công vào CSDL!');
    }
    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.xoa',['tintuc'=>$tintuc]);
    }
    public function postXoa(Request $request,$id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
            'confirm'=>'required'
        ],
        [
            'confirm.required'=>'Bạn chưa check vào "Tôi đồng ý"'
        ]);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công '.$tintuc->tieude);
    }
}
