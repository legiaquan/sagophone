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
							<li class="active"><a href="dangnhap">Đăng Nhập</a></li>
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
				  	<div class="panel-heading"><h3>Đăng nhập</h3></div>
				  	<div class="panel-body">
				  		@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbaodangnhap'))
                            <div class="alert alert-danger">
                                {{session('thongbaodangnhap')}}
                            </div>
                        @endif

                        @if(session('thongbaoreset'))
                            <div class="alert alert-success">
                                {{session('thongbaoreset')}}
                            </div>
                        @endif

				    	<form action="dangnhap" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			&nbsp;<label>Tên đăng nhập hoặc Email</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên đăng nhập hoặc Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			&nbsp;<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
							</div>
							<br>
							<div>
								<button type="submit" class="btn btn-default">Đăng nhập</button>
								Chưa có tài khoản?<a href="dangky" class="btn btn-link">Đăng ký</a><br>
							</div>
							<div class="text-right">
								<a href="quenmatkhau" class="btn btn-link">Quên mật khẩu?</a><br>
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