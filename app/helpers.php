<?php
use Illuminate\Support\Facades\DB;
//app/helpers.php

function getAllGia($id)
{
	$gia = DB::table('tbchitietsanpham')
			->where('id_sanpham',$id)
			->join('tbmau', 'tbchitietsanpham.id_mau', '=', 'tbmau.id')
			->select('tbchitietsanpham.id','tbchitietsanpham.gia','tbchitietsanpham.id_mau','tbchitietsanpham.soluong','tbmau.mau','tbmau.mamau')
			->orderBy('tbmau.id','asc')
			->get();
	return $gia;
}
function giaKhuyenMai($gia,$phantram)
{
	$giaKM = $gia*(100-$phantram)/100;
	return $giaKM;
}

function avgStarSanPham($id_donhang)
{
	$avgStar = DB::table('tbchitietdonhang')
			->where('id_chitietsanpham', $id_donhang)
			->avg('tbchitietdonhang.star');
	return $avgStar;
}
function getNhanXet($id)
{
	$nhanxet = DB::table('tbchitietdonhang')
			->where('id_chitietsanpham', $id)
			->where('star','<>','null')
			->select('star')->get();
	return $nhanxet;
}
function demBinhLuan($id)
{
	$demBinhLuan = DB::table('tbbinhluan')
        				->where('id_sanpham',$id)
        				->join('tbthanhvien','tbbinhluan.id_thanhvien','=','tbthanhvien.id')
        				->count();
	return $demBinhLuan;
}
function getNameLevel($id_level)
{
	$name = DB::table('level')
				->where('id',$id_level)
				->value('tenlevel');
	return $name;
}

function getGiaMin($id)
{
	$gia = DB::table('tbchitietsanpham')
			->where('id_sanpham',$id)
			->join('tbmau', 'tbchitietsanpham.id_mau', '=', 'tbmau.id')
			->select('tbchitietsanpham.gia','tbchitietsanpham.id','tbmau.mau','tbmau.mamau','tbmau.id')
			->get();
	return $gia;
}


function getDanhSanhBannerSanPham($id)
{
	$ds = DB::table('tbchitietsanpham')
				->where('tbchitietsanpham.id',$id)
				->join('tbsanpham', 'tbchitietsanpham.id_sanpham', '=', 'tbsanpham.id')
				->join('tbmau', 'tbchitietsanpham.id_mau', '=', 'tbmau.id')
				->select('tbchitietsanpham.gia','tbchitietsanpham.hinhchitiet','tbsanpham.hinhsp','tbsanpham.tensp','tbsanpham.ram','tbsanpham.rom','tbmau.mau','tbmau.mamau')
				->first();
	return $ds;
}
function checkTonTaiSPBanner($id_chitietsanpham,$id_banner)
{
	$check = DB::table('tbdanhsachbanner')
			->where('tbdanhsachbanner.id_chitietsanpham',$id_chitietsanpham)->where('tbdanhsachbanner.id_banner',$id_banner)
			->count();
	return $check;
}
function getSoLuongCTDH($id_chitietsanpham,$id_donhang)
{
	$check = DB::table('tbchitietdonhang')
			->where('tbchitietdonhang.id_chitietsanpham',$id_chitietsanpham)->where('tbchitietdonhang.id_donhang',$id_donhang)
			->value('tbchitietdonhang.soluong');
	return $check;
}
function getBanner($id)
{
	
	$banner = DB::table('tbchitietsanpham')
			->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
			->where('id_chitietsanpham',$id)
			->orderBy('id_banner','ASC')
			->value('tbdanhsachbanner.id_banner');
	return $banner;
}
function getBanner2($id)
{
	
	$banner = DB::table('tbchitietsanpham')
			->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
			->where('id_chitietsanpham',$id)
			->orderBy('id_banner','DESC')
			->value('tbdanhsachbanner.id_banner');
	return $banner;

}

function getPhanTram($id)
{
	$phantram = DB::table('tbchitietsanpham')
			->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
			->where('id_chitietsanpham',$id)
			->orderBy('id_banner','ASC')
			->value('tbdanhsachbanner.phantramkhuyenmai');
	return $phantram;
}
function getPhanTram2($id)
{
	$phantram = DB::table('tbchitietsanpham')
			->join('tbdanhsachbanner','tbchitietsanpham.id','tbdanhsachbanner.id_chitietsanpham')
			->where('id_chitietsanpham',$id)
			->orderBy('id_banner','DESC')
			->value('tbdanhsachbanner.phantramkhuyenmai');
	return $phantram;
}

function getStar($id)
{
	$star = DB::table('tbchitietdonhang')
		->where('id_chitietsanpham',$id)
		->select('star')->get();
	return $star;
}
function demSPNhom($id_nhom)
{
	$dem = DB::table('tbchitietsanpham')
                    ->join('tbsanpham','tbchitietsanpham.id_sanpham','tbsanpham.id')
                    ->where('tbsanpham.id_nhom',$id_nhom)
                    ->count();
    return $dem;
}