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
							<li class="active"><a href="dangky">Đăng Ký</a></li>
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
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading"><h3>Đăng ký tài khoản</h3></div>
				  	<div class="panel-body">
				  		{{-- @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif --}}

                        @if(session('thongbaodangky'))
                            <div class="alert alert-success">
                                {{session('thongbaodangky')}}
                            </div>
                        @endif
				    	<form action="dangky" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Tên đăng nhập</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên người dùng" name="Ten" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Nhập email" name="Email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>								
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="againPassword" aria-describedby="basic-addon1" placeholder="Nhập lại mật khẩu">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
@endsection