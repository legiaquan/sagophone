<?php
use Illuminate\Support\Facades\DB;
//app/helpers.php

function helloWorld()
{
    return 'Hello, World!';
}
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
