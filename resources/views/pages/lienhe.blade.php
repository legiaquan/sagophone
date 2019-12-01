<title>Liên Hệ</title>
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
						<li><a href="hotdeals">Hot Deals</a></li>
						<li><a href="loaitin">Tin Tức</a></li>
						<li><a href="cuahang">Cửa Hàng</a></li>									
						<li class="active"><a href="lienhe">Liên Hệ</a></li>
					</ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
<!-- /NAVIGATION -->
<br>

<div style=" width: 90%;
   padding: 10px;">
    <div style="width: 70%; height: 300px; float: left; padding-left: 100px;">
        {!!
            Mapper::render()
        !!}
    </div>

    <div style="width: 300px; height: 300px;float: right; padding-top: 80px">
            <h2>Thông tin liên lạc </h2><br>
            <ul >
                        <li><a><i class="fa fa-phone"></i>Số điện thoại :  +1900-1560</a></li><br>
                        <li><a><i class="fa fa-envelope-o"></i>Địa chỉ Gmail : sagophone@gmail.com</a></li><br>
                        <li><a target="_blank" href="https://goo.gl/maps/JLcSzPrHN7a2P8Kg8"><i class="fa fa-map-marker"></i> Địa chỉ : 180 Cao Lỗ, Quận 8</a></li>
            </ul>
       
    </div>
</div>
@endsection