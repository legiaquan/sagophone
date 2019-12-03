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

<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a>Trang Chủ</a></li>
							<li class="active"><a>Liên Hệ</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div style="width: 70%; height: 300px; float: left; padding-left: 10px">
       				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.955133440402!2d106.67572371502094!3d10.73794146283856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1575357971936!5m2!1svi!2s" width="700" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    				</div>

				    <div style="width: 300px; height: 300px;float: right; padding-top: 30px">
				            <h2>Thông tin liên lạc </h2><br>
				            <ul >
				                        <li><a><i class="fa fa-phone"></i>Số điện thoại :  +1900-1560</a></li><br>
				                        <li><a><i class="fa fa-envelope-o"></i>Địa chỉ Gmail : sagophone@gmail.com</a></li><br>
				                        <li><a target="_blank" href="https://goo.gl/maps/JLcSzPrHN7a2P8Kg8"><i class="fa fa-map-marker"></i> Địa chỉ : 180 Cao Lỗ, Quận 8</a></li>
				            </ul>
				            <ul>
								
				            </ul>
				       
				    </div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

</div>
@endsection
