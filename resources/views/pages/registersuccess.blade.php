<title>Register Success</title>
@extends('layouts.index')

@section('content')
<!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
						<ul class="main-nav nav navbar-nav">
						<li><a href="trangchu">Trang Chủ</a></li>
						<li><a href="loaitin">Tin Tức</a></li>
						<li><a href="dienthoai">Điện Thoại</a></li>
						<li><a href="phukien">Phụ Kiện</a></li>									
						<li class="active"><a href="lienhe">Liên Hệ</a></li>
					</ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
<!-- /NAVIGATION -->
	<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
	        <br><br> <h2 style="color:#0fad00">Kích Hoạt Tài Khoản Thành Công</h2>
	        <i class="fa fa-check-circle" style="font-size: 50px"></i><br>
	        <h3>Chúc mừng!</h3>
	        <p style="font-size:20px;color:#5C5C5C;">Tài khoản của bạn đã được kích hoạt! </p>
	        <p style="font-size:20px;color:#5C5C5C;">Bạn đã có thể đăng nhập vào hệ thống.</p>
	    	<br>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
	        <a href="trangchu" class="btn btn-primary">     Trang Chủ <i class="fa fa-undo"></i>     </a>
	        <a href="dangnhap" class="btn btn-info">    Đăng Nhập <i class="fa fa-list-alt"></i>     </a>
	    <br><br>
        </div>
	</div>
</div>
@endsection