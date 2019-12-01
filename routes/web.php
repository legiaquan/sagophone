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
Route::get('/','PageController@trangchu');

/*=============================================
=            Admin Route START                =
=============================================*/

Route::get('admin/dangnhap','AdminController@getLogin');
Route::post('admin/dangnhap','AdminController@postLogin');

Route::get('admin/dangxuat','AdminController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('trang-chu.html','AdminController@index');

	Route::get('suathongtin/{id}','AdminController@getSuathongtin');
	Route::post('suathongtin/{id}','AdminController@postSuathongtin');
	
	/*Hang dien thoai*/
	Route::group(['prefix'=>'hangdt','middleware'=>'quanlykho'],function(){
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
	Route::group(['prefix'=>'mau','middleware'=>'quanlykho'],function(){
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
	Route::group(['prefix'=>'chitietsanpham','middleware'=>'quanlykho'],function(){
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
	Route::group(['prefix'=>'nhomsanpham','middleware'=>'quanlykho'],function(){
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
	Route::group(['prefix'=>'sanpham','middleware'=>'quanlykho'],function(){
		// admin/sanpham/danhsach
		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');
		
		Route::get('xoa/{id}','SanPhamController@getXoa');
		Route::post('xoa/{id}','SanPhamController@postXoa');
	});


	

	/*thanhvien*/
	Route::group(['prefix'=>'thanhvien','middleware'=>'quanlykho'],function(){
		// admin/thanhvien/danhsach
		Route::get('danhsach','ThanhVienController@getDanhSach');

		Route::get('sua/{id}','ThanhVienController@getSua');
		Route::post('sua/{id}','ThanhVienController@postSua');
		
		Route::get('them','ThanhVienController@getThem');
		Route::post('them','ThanhVienController@postThem');

		Route::get('xoa/{id}','ThanhVienController@getXoa');
	});

	/*Chi tiet don hang*/
	Route::group(['prefix'=>'chitietdonhang','middleware'=>'quanlykinhdoanh'],function(){
		// admin/ChiTietDonHang/danhsach
		Route::get('danhsach/{id}','ChiTietDonHangController@getDanhSach');

		Route::get('sua','ChiTietDonHangController@getSua');
		Route::get('them','ChiTietDonHangController@getThem');
	});

	/*Đơn hàng*/
	Route::group(['prefix'=>'donhang','middleware'=>'quanlykinhdoanh'],function(){
		// admin/donhang/danhsach
		Route::get('danhsach','DonHangController@getDanhSach');

		Route::get('sua/{id}','DonHangController@getSua');
		Route::post('sua/{id}','DonHangController@postSua');

		Route::get('xuly/{id}/{tinhtrang}/{id_admins}','DonHangController@getXuly');
	});

	/*Banner*/
	Route::group(['prefix'=>'banner','middleware'=>'quanlykinhdoanh'],function(){
		// admin/level/danhsach
		Route::get('danhsach','BannerController@getDanhSach');

		Route::get('sua/{id}','BannerController@getSua');
		Route::post('sua/{id}','BannerController@postSua');
		
		Route::get('them','BannerController@getThem');
		Route::post('them/{id_admins}','BannerController@postThem');

		Route::get('xoa/{id}','BannerController@getXoa');
		Route::post('xoa/{id}','BannerController@postXoa');
	});

	/*So danh sách banner*/
	Route::group(['prefix'=>'danhsachbanner','middleware'=>'quanlykinhdoanh'],function(){
		// admin/hangdt/danhsach
		Route::get('danhsach/{id}','DanhSachBannerController@getDanhSach');

		Route::get('sua/{id}/{id_sanpham}','DanhSachBannerController@getSua');
		Route::post('sua/{id}/{id_sanpham}','DanhSachBannerController@postSua');

		Route::get('them/{id}','DanhSachBannerController@getThem');
		Route::get('them/{id}/{id_sanpham}','DanhSachBannerController@activeThem');

		Route::get('xoa/{id}/{id_sanpham}','DanhSachBannerController@getXoa');
		Route::post('xoa/{id}/{id_sanpham}','DanhSachBannerController@postXoa');
	});


	/*Binh luan*/
	Route::group(['prefix'=>'comment-san-pham','middleware'=>'quanlykinhdoanh'],function(){
		// admin/comment-san-pham/danhsach
		Route::get('danhsach','BinhLuanController@getDanhSach');

		Route::get('binhluan/{id}','BinhLuanController@getBinhLuan');
		
		Route::get('binhluan/xoa/{id}/{id_sanpham}','BinhLuanController@getXoa');
	});


		/*Nhom loai tin*/
	Route::group(['prefix'=>'loaitin','middleware'=>'quanlykinhdoanh'],function(){
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
	Route::group(['prefix'=>'tintuc','middleware'=>'quanlykinhdoanh'],function(){
		// admin/tintuc/danhsach
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them/{id_admins}','TinTucController@postThem');
		
		Route::get('xoa/{id}','TinTucController@getXoa');
		Route::post('xoa/{id}','TinTucController@postXoa');
	});
	
	/*Level*/
	Route::group(['prefix'=>'level','middleware'=>'admin'],function(){
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
	Route::group(['prefix'=>'nhanvien','middleware'=>'admin'],function(){
		// admin/level/danhsach
		Route::get('danhsach','NhanVienController@getDanhSach');

		Route::get('sua/{id}','NhanVienController@getSua');
		Route::post('sua/{id}','NhanVienController@postSua');
		
		Route::get('them','NhanVienController@getThem');
		Route::post('them','NhanVienController@postThem');

		Route::get('xoa/{id}','NhanVienController@getXoa');
		Route::post('xoa/{id}','NhanVienController@postXoa');
	});
});

/*=====  End of Admin Route  ======*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//FRONTEND
Route::get('trangchu','PageController@trangchu');

Route::get('loaitin','PageController@loaitin');

Route::get('loaitin/{id}','PageController@loaitin1');

Route::get('tintuc/{id}','PageController@tintuc');

Route::get('cuahang','PageController@cuahang');

Route::get('chitiet/{id}', 'PageController@chitietsp');

Route::get('hotdeals','PageController@hotdeals');

Route::get('timkiem','PageController@timkiem')->name('find.product');

Route::get('dangnhap','PageController@getDangNhap');

Route::post('dangnhap','PageController@postDangNhap');

Route::get('dangky','PageController@getDangKy');

Route::post('dangky','PageController@postDangKy');

Route::get('dangxuat','PageController@dangxuat');

Route::post('binhluan/{id}','PageController@binhluan');

Route::get('nguoidung','PageController@getNguoiDung');

Route::post('nguoidung','PageController@postNguoiDung');

Route::prefix('shopping')->group(function(){
	Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');//thêm mới vào giỏ hàng
	Route::get('/cart','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');//trang giỏ hàng
	Route::get('/delete/{rowId}','ShoppingCartController@deleteCart')->name('delete.cart.item');//xoa item
	Route::post('/update/{rowId}','ShoppingCartController@updateCart');//update item
});

Route::get('lienhe','PageController@lienhe');

