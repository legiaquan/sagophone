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
use App\ChiTietDonHang;
use App\DonHang;
use App\ThanhVien;
Route::get('/', function () {
    return view('welcome');
});

/*=============================================
=            Admin Route START                =
=============================================*/

Route::get('admin/dangnhap','AdminController@getLogin');
Route::post('admin/dangnhap','AdminController@postLogin');

Route::group(['prefix'=>'admin'],function(){
	Route::get('trang-chu.html','AdminController@index');
	/*=============================================
	=            Quan ly san pham                 =
	=============================================*/

	/*Hang dien thoai*/
	Route::group(['prefix'=>'hangdt'],function(){
		
		// admin/hangdt/danhsach
		Route::get('danhsach','HangDTController@getDanhSach');

		Route::get('sua/{id}','HangDTController@getSua');
		Route::post('sua/{id}','HangDTController@postSua');

		Route::get('them','HangDTController@getThem');
		Route::post('them','HangDTController@postThem');

		Route::get('xoa/{id}','HangDTController@getXoa');
		Route::post('xoa/{id}','HangDTController@postXoa');
	});

	/*Mau sp*/
	Route::group(['prefix'=>'mau'],function(){
		// admin/hangdt/danhsach
		Route::get('danhsach','MauController@getDanhSach');

		Route::get('sua/{id}','MauController@getSua');
		Route::post('sua/{id}','MauController@postSua');

		Route::get('them','MauController@getThem');
		Route::post('them','MauController@postThem');

		Route::get('xoa/{id}','MauController@getXoa');
		Route::post('xoa/{id}','MauController@postXoa');
	});

	/*Chi tiết sản phẩm*/
	Route::group(['prefix'=>'chitietsanpham'],function(){
		// admin/hangdt/danhsach
		Route::get('danhsach','ChiTietSanPhamController@getDanhSach');

		Route::get('sua/{id}/{id_mau}','ChiTietSanPhamController@getSua');
		Route::post('sua/{id}/{id_mau}','ChiTietSanPhamController@postSua');

		Route::get('them/{id}','ChiTietSanPhamController@getThem');
		Route::post('them/{id}','ChiTietSanPhamController@postThem');

		Route::get('xoa/{id}/{id_mau}','ChiTietSanPhamController@getXoa');
		Route::post('xoa/{id}/{id_mau}','ChiTietSanPhamController@postXoa');
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
		Route::post('xoa/{id}','NhomSanPhamController@postXoa');
	
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
		Route::post('xoa/{id}','SanPhamController@postXoa');
	});
	/*=============================================
	=            End of Quan ly san pham          =
	=============================================*/

	/*=============================================
	=               Quan ly don hang              =
	=============================================*/
	/*Chi tiet hoa don*/
	Route::group(['prefix'=>'chitietdonhang'],function(){
		// admin/ChiTietDonHang/danhsach
		Route::get('danhsach','ChiTietDonHangController@getDanhSach');
		Route::get('sua','ChiTietDonHangController@getSua');
		Route::get('them','ChiTietDonHangController@getThem');
	});
	

	/*Hoa don*/
	Route::group(['prefix'=>'donhang'],function(){
		// admin/donhang/danhsach
		Route::get('danhsach','DonHangController@getDanhSach');
		Route::get('sua','DonHangController@getSua');
		Route::get('them','DonHangController@getThem');
	});
	/*=============================================
	=            End of Quan ly don hang          =
	=============================================*/
	
	/*Nhom loai tin*/
	Route::group(['prefix'=>'loaitin'],function(){
		// admin/loaitin/danhsach
		Route::get('danhsach','LoaiTinController@getDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSua');
		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');
		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}','LoaiTinController@getXoa');
		Route::post('xoa/{id}','LoaiTinController@postXoa');
	
	});

	/*tin tuc*/
	Route::group(['prefix'=>'tintuc'],function(){
		// admin/tintuc/danhsach
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');
		
		Route::get('xoa/{id}','TinTucController@getXoa');
		Route::post('xoa/{id}','TinTucController@postXoa');
	});

	/*thanhvien*/
	Route::group(['prefix'=>'thanhvien'],function(){
		// admin/thanhvien/danhsach
		Route::get('danhsach','ThanhVienController@getDanhSach');

		Route::get('sua/{id}','ThanhVienController@getSua');
		Route::post('sua/{id}','ThanhVienController@postSua');
		
		Route::get('them','ThanhVienController@getThem');
		Route::post('them','ThanhVienController@postThem');

		Route::get('xoa/{id}','ThanhVienController@getXoa');
		Route::post('xoa/{id}','ThanhVienController@postXoa');
	});

	/*Level*/
	Route::group(['prefix'=>'level'],function(){
		// admin/level/danhsach
		Route::get('danhsach','LevelController@getDanhSach');

		Route::get('sua/{id}','LevelController@getSua');
		Route::post('sua/{id}','LevelController@postSua');
		
		Route::get('them','LevelController@getThem');
		Route::post('them','LevelController@postThem');

		Route::get('xoa/{id}','LevelController@getXoa');
		Route::post('xoa/{id}','LevelController@postXoa');
	});

	/*Admin*/
	Route::group(['prefix'=>'nhanvien'],function(){
		// admin/level/danhsach
		Route::get('danhsach','NhanVienController@getDanhSach');

		Route::get('sua/{id}','NhanVienController@getSua');
		Route::post('sua/{id}','NhanVienController@postSua');
		
		Route::get('them','NhanVienController@getThem');
		Route::post('them','NhanVienController@postThem');

		Route::get('xoa/{id}','NhanVienController@getXoa');
		Route::post('xoa/{id}','NhanVienController@postXoa');
	});

	/*Banner*/
	Route::group(['prefix'=>'banner'],function(){
		// admin/level/danhsach
		Route::get('danhsach','BannerController@getDanhSach');

		Route::get('sua/{id}','BannerController@getSua');
		Route::post('sua/{id}','BannerController@postSua');
		
		Route::get('them','BannerController@getThem');
		Route::post('them','BannerController@postThem');

		Route::get('xoa/{id}','BannerController@getXoa');
		Route::post('xoa/{id}','BannerController@postXoa');
	});

	/*So danh sách banner*/
	Route::group(['prefix'=>'danhsachbanner'],function(){
		// admin/hangdt/danhsach
		Route::get('danhsach/{id}','DanhSachBannerController@getDanhSach');

		Route::get('sua/{id}/{id_sanpham}','DanhSachBannerController@getSua');
		Route::post('sua/{id}/{id_sanpham}','DanhSachBannerController@postSua');

		Route::get('them/{id}','DanhSachBannerController@getThem');
		Route::get('them/{id}/{id_sanpham}','DanhSachBannerController@activeThem');

		Route::get('xoa/{id}/{id_sanpham}','DanhSachBannerController@getXoa');
		Route::post('xoa/{id}/{id_sanpham}','DanhSachBannerController@postXoa');
	});
	
});

/*=====  End of Admin Route  ======*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//FRONTEND
Route::get('trangchu','PageController@trangchu');

Route::get('dangnhap','PageController@getDangNhap');

Route::post('dangnhap','PageController@postDangNhap');

Route::get('dangky','PageController@getDangKy');

Route::post('dangky','PageController@postDangKy');

Route::get('loaitin','PageController@loaitin');

Route::get('tintuc/{id}','PageController@tintuc');

Route::get('danhmuc','PageController@danhmuc');

Route::get('danhmuc/{id}/{tennhom}','PageController@danhmuc1');

Route::get('danhmuc/{id}/{tennhom}/{tenhang}','PageController@danhmuc2');

Route::get('chitiet/{id}/{tennhom}', 'PageController@chitietsp');
<<<<<<< HEAD

Route::get('hotdeals','PageController@hotdeals');
<<<<<<< HEAD
=======
=======
>>>>>>> b0e34d83e0670cde46972d2d0d833c12cd529187
>>>>>>> c5a7fe980409e3f67704af103f70873b9c6f6328
