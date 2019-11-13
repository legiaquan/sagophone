<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class SanphamController extends Controller
{
    //
    public function index()
    {
    	// $sanpham = SanPham::where('ten','like','%iphone%')->Paginate(3)->setPath('sanpham');
    	$sanpham = SanPham::paginate(3);
    	return view('sanpham',['sanpham'=>$sanpham]);
    }

}
