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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello",function (){
	return "hello";
});
Route::get("/hello/{ten}",function ($ten){
	return "hello ban: ".$ten;
});
Route::get("/ngay/{ngay}",function ($ngay){
	return "Ngay: ".$ngay;
})->where(['ngay'=>'[0-9]+']);
//dat ten co route
Route::get("Route1",function(){
	echo "day la Route 1";
})->name('MyRoute1');

Route::get("goiten",function(){
	return redirect()->route('MyRoute1');
});
//Group
Route::group(['prefix'=>'MyGroup'],function(){
	
	Route::get('User1',function(){
		echo "User1";
	});
	Route::get('User2',function(){
		echo "User2";
	});
	Route::get('User3',function(){
		echo "User3";
	});
});
//Goi controller
Route::get('GoiController','MyController@XinChao');
Route::get('TinhTong/{a}&{b}','MyController@TinhTong');
//Request dung de lay ten URL
Route::get('MyRequest','MyController@GetURL');

//gui du lieu voi request FORM
//
Route::get('getForm',function(){
	return view('postForm');
});

Route::post('postForm',[
 'as'=>'postForm',
 'uses'=>'MyController@postForm'
]);

//Cookie
//

Route::get('setCookie','MyController@setCookie');
route::get('getCookie','MyController@getCookie');

/*
	up load file
 */


Route::get('uploadFile',function(){
	return view('postFile');
});

Route::post('postFile',['as'=>'postFile','uses'=>'MyController@postFile']);

/*
	tra de du lieu Json
 */

Route::get('getJson','MyController@getJson');

/*
	View
 */
Route::get('myView','MyController@myView');
//truyen tham so cho view
Route::get('Time/{t}','MyController@Time');
//view share
View::share('HoTen','quan dep trai');

/*
	blade template
 */

Route::get('blade',function(){
	return view('pages.noiDung');
});

Route::get('BladeTemplate/{str}','MyController@blade');

//database

Route::get('daatabase',function(){
	// Schema::create('loaisanpham',function($table){
	// 		$table->increments('id');
	// 		$table->string('ten',200)->nullable();
	// });
	Schema::create('theloai',function($table){
			$table->increments('id');
			$table->string('ten',200)->nullable();
			$table->string('nsx')->default('nha san xuat');

	});
	echo "Da thuc hien lenh tao bang";
});

Route::get('lienketbang',function(){
	Schema::create('sanpham',function($table){
			$table->increments('id');
			$table->string('ten');
			$table->float('gia');
			$table->integer('soluong')->default(0);
			$table->integer('id_loaisanpham')->unsigned();
			$table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
	});
	echo "Da thuc hien lenh tao bang";
});
Route::get('suabang',function(){
	Schema::table('theloai',function($table){
			$table->dropColumn('nsx');
			
	});
	echo "Da thuc hien lenh sua bang";
});
Route::get('themcot',function(){
	Schema::table('theloai',function($table){
			$table->string('nsx')->default('nha san xuat');
			
	});
	echo "Da thuc hien lenh sua bang";
});
Route::get('doiten',function(){
	Schema::rename('theloai','nguoidung');
	echo "Da thuc hien lenh sua bang";
});

/*queryBuilder*/

Route::get('qb/get',function(){
	$data = DB::table('users')->get();
	//var_dump($data);
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});
//select * from users where id = 2
Route::get('qb/where',function(){
	$data = DB::table('users')->where('id','=',2)->get();
	//var_dump($data);
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});
//select id,name,email,..
Route::get('qb/select',function(){
	$data = DB::table('users')->select(['id','name','email'])->where('id',2)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});
//select name as hoten form...
Route::get('qb/raw',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id',2)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});
//order by
Route::get('qb/orderby',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->orderBy('id','desc')->skip(1)->take(5)->get();
	var_dump($data);
	echo $data->count();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});
//update
Route::get('qb/update',function(){
	DB::table('users')->where('id',1)->update(['name'=>'quan le','email'=>'quanle297@gmail.com']);
	echo "Da update";
});
//delete
Route::get('qb/delete',function(){
	DB::table('users')->where('id',1)->delete();
	echo "Da xoa";
});

/*model*/

//insert
Route::get('model/save',function(){
	$user = new App\User();
	$user->name = "Quan Le";
	$user->email = "quanle@email.com";
	$user->password="matkhau";
	//insert
	$user->save();
	echo "Da thuc hien save";
});

//goi truy van user ra
Route::get('model/query',function(){
	$user = App\User::find(4);
	echo $user->name;
});

Route::get('model/sanpham/save',function(){
	$sanpham = new App\SanPham();
	$sanpham->ten = "Iphone 6";
	$sanpham->soluong = 100;
	$sanpham->save();

	echo "Da thuc hien lenh save";
});

Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\SanPham();
	$sanpham->ten = $ten;
	$sanpham->soluong = 100;
	$sanpham->save();

	echo "Da thuc hien lenh save".$ten;
});
Route::get('model/sanpham/all',function(){
	$sanpham = App\SanPham::all()->toArray();
	var_dump($sanpham);
	// foreach ($sanpham as $row) {
	// 	# code...
	// 	echo $row->ten;
	// 	echo $row->soluong;
	// 	echo "<br>";
	// }
	echo "Da thuc hien lenh all";
});

Route::get('model/sanpham/ten',function(){
	$sanpham = App\SanPham::where('ten','ipad')->get()->toArray();
	var_dump($sanpham);
	echo $sanpham[0]['ten'];
	
	echo "Da thuc hien lenh all";
});

Route::get('model/sanpham/delete',function(){
	App\SanPham::destroy(4);
	
	echo "Da xoa";
});

Route::get('taocot',function(){
	Schema::table('sanpham',function($table){
		$table->integer('id_loaisanpham')->unsigned();
	});
});

Route::get('lienket',function(){
	$data = App\SanPham::find(3)->loaisanpham->toArray();
	var_dump($data);
});

Route::get('lienketloaisp',function(){
	$data = App\LoaiSanPham::find(3)->sanpham->toArray();
	var_dump($data);
});

Route::get('diem',function(){
	echo 'ban da du diem';
})->middleware('Mymiddle')->name('diem');
Route::get('loi',function(){
	echo 'error4 ban chua du diem';
})->name('loi');

Route::get('nhapdiem',function(){
	return view('nhapdiem');
})->name('nhapdiem');

/*Auth*/
Route::get('dangnhap',function(){
	return view('dangnhap');
});
Route::post('login','AuthController@login')->name('login');

Route::get('logout','AuthController@logout');

Route::get('thu',function(){
	return view('thanhcong');
});



/*SESSION*/

Route::group(['middleware'=>['web']],function(){
	//
	Route::get('Session',function(){
		Session::put('KhoaHoc','Laravel');
		echo "Da dat Session";
		echo "<br>";
		Session::flash('mess','Hello');
		echo Session::get('KhoaHoc');
		echo Session::get('mess');
		if(Session::has('KhoaHoc'))
			echo "Da co Session";
		else
			echo "Chua co Session";
	});

	Route::get('Session/flash',function(){
		echo Session::get('mess');
	});
});

/*phantrang*/

Route::get('sp','SanphamController@index');