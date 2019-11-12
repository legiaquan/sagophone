<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\NhomSanPham;
use App\HangDt;
use App\ChiTietHoaDon;
use App\HoaDon;
use App\ThanhVien;
Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/dangnhap','AdminController@getLogin');
Route::post('admin/dangnhap','AdminController@postLogin');

Route::group(['prefix'=>'admin'],function(){

	/*Hang dien thoai*/
	Route::group(['prefix'=>'hangdt'],function(){
		// admin/hangdt/danhsach
		Route::get('danhsach','HangDTController@getDanhSach');

		Route::get('sua/{id}','HangDTController@getSua');
		Route::post('sua/{id}','HangDTController@postSua');

		Route::get('them','HangDTController@getThem');
		Route::post('them','HangDTController@postThem');

		Route::get('xoa/{id}','HangDTController@getXoa');
	});

	/*Chi tiet hoa don*/
	Route::group(['prefix'=>'chitiethoadon'],function(){
		// admin/ChiTietHoaDon/danhsach
		Route::get('danhsach','ChiTietHoaDonController@getDanhSach');
		Route::get('sua','ChiTietHoaDonController@getSua');
		Route::get('them','ChiTietHoaDonController@getThem');
	});

	/*Hoa don*/
	Route::group(['prefix'=>'hoadon'],function(){
		// admin/hoadon/danhsach
		Route::get('danhsach','HoaDonController@getDanhSach');
		Route::get('sua','HoaDonController@getSua');
		Route::get('them','HoaDonController@getThem');
	});

	/*Nhom san pham*/
	Route::group(['prefix'=>'nhomsanpham'],function(){
		// admin/nhomsanpham/danhsach
		Route::get('danhsach','NhomSanPhamController@getDanhSach');

		Route::get('sua/{id}','NhomSanPhamController@getSua');
		Route::post('sua/{id}','NhomSanPhamController@postSua');

		Route::get('them','NhomSanPhamController@getThem');
		Route::post('them','NhomSanPhamController@postThem');

		Route::get('xoa/{id}','NhomSanPhamController@getXoa');
	
	});

	/*San pham*/
	Route::group(['prefix'=>'sanpham'],function(){
		// admin/sanpham/danhsach
		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');
		
		Route::get('xoa/{id}','SanPhamController@getXoa');
	});

	//thanhvien
	Route::group(['prefix'=>'thanhvien'],function(){
		// admin/thanhvien/danhsach
		Route::get('danhsach','ThanhVienController@getDanhSach');

		Route::get('sua/{id}','ThanhVienController@getSua');
		Route::post('sua/{id}','ThanhVienController@postSua');
		
		Route::get('them','ThanhVienController@getThem');
		Route::post('them','ThanhVienController@postThem');

		Route::get('xoa/{id}','ThanhVienController@getXoa');
	});

	//quanlydonhang
	Route::group(['prefix'=>'quanlydonhang'],function(){
		// admin/quanlydonhang/danhsach
		Route::get('danhsach','QuanLyDonHangController@getDanhSach');

		Route::get('sua/{id}','QuanLyDonHangController@getSua');
		Route::post('sua/{id}','QuanLyDonHangController@postSua');
		
		Route::get('them','QuanLyDonHangController@getThem');
		Route::post('them','QuanLyDonHangController@postThem');

		Route::get('xoa/{id}','QuanLyDonHangController@getXoa');
	});

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
