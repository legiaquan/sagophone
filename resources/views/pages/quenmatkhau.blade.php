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
                        <li><a href="cuahang">Cửa Hàng</a></li>                                   
                        <li><a href="lienhe">Liên Hệ</a></li>
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
                            <li><a href="dangnhap">Trang Chủ</a></li>
                            <li><a href="dangnhap">Đăng Nhập</a></li>
                            <li class="active"><a href="quenmatkhau">Quên Mật Khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->
<div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading"><h3>Quên Mật Khẩu</h3></div>
				  	<div class="panel-body">
				  		@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbaoquen'))
                            <div class="alert alert-danger">
                                {{session('thongbaoquen')}}
                            </div>
                        @endif

                        @if(session('thongbaoguiquen'))
                            <div class="alert alert-success">
                                {{session('thongbaoguiquen')}}
                            </div>
                        @endif

				    	<form action="quenmatkhau" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			&nbsp;<label>Tên đăng nhập</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="name" 
							  	>
							</div>
							<br>	
							<div>
				    			&nbsp;<label>Nhập Email</label>
							  	<input type="text" class="form-control" placeholder="Nhập Email" name="email" 
							  	>
							</div>
							<br>
							<div>
								<button type="submit" class="btn btn-default">Gửi</button>
								Chưa có tài khoản?<a href="dangky" class="btn btn-link">Đăng ký</a><br>
							</div>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
@endsection