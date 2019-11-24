<?php
use Illuminate\Support\Facades\DB;
//app/helpers.php

function getAllGia($id)
{
	$gia = DB::table('tbchitietsanpham')
			->where('id_sanpham',$id)
			->join('tbmau', 'tbchitietsanpham.id_mau', '=', 'tbmau.id')
			->select('tbchitietsanpham.gia','tbmau.mau','tbmau.mamau')
			->orderBy('tbmau.id','asc')
			->get();
	return $gia;
}
function giaKhuyenMai($gia,$phantram)
{
	$giaKM = $gia*(100-$phantram)/100;
	return $giaKM;
}
function getGiaMin($id)
{
	$gia = DB::table('tbchitietsanpham')
			->where('id_sanpham',$id)
			->join('tbmau', 'tbchitietsanpham.id_mau', '=', 'tbmau.id')
			->select('tbchitietsanpham.gia','tbmau.mau','tbmau.mamau','tbmau.id')
			->get();
	return $gia;
}
function avgStarSanPham($id_donhang)
{
	$avgStar = DB::table('tbchitietdonhang')
			->where('id_donhang', $id_donhang)
			->avg('tbchitietdonhang.star');
	return $avgStar;
}
function getNhanXet($id_donhang)
{
	$nhanxet = DB::table('tbchitietdonhang')
			->where('id_donhang', $id_donhang)
			->select('nhanxet')
			->get();
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