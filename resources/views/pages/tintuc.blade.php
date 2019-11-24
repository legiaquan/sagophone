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
                        <li class="active"><a href="loaitin">Tin Tức</a></li>
                        <li><a href="danhmuc">Danh Mục</a></li>
                        <li><a href="danhmuc/1/Điện thoại}">Điện Thoại</a></li>                                 
                        <li><a href="danhmuc/2/Phụ kiện">Phụ Kiện</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
<!-- /NAVIGATION -->
<!-- Page Content -->
<br>
    <div class="container">
        <div class="row">
            
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->tieude}}</h1>

                <!-- Author -->
                <p class="lead">
                    Đăng bởi <a href="#">{{$tintuc->id_admins}}</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/imgSanPham/{{$tintuc->img}}" alt="" width="200px" height="200px">

                <!-- Date/Time -->
                <p  style="text-align: right;" ><span class="glyphicon glyphicon-pencil"></span> Đăng vào {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {!! $tintuc->noidung !!} <!-- chèn css html -->
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Posted Comments -->

            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#D10024;"><h5 style="color: white">TIN LIÊN QUAN</h5></div>
                    <div class="panel-body">

                         <!-- item -->
                         @foreach($tinlienquan as $tlq)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tlq->id}}">
                                    <img class="img-responsive" src="upload/imgTinTuc/{{$tlq->img}}" alt="">
                                </a>
                            </div>
                            <!-- <div class="col-md-7"> -->
                                <a href="tintuc/{{$tlq->id}}"><b>{{$tlq->tieude}}</b></a>
                                <br>
                                <p>&emsp;&emsp;&emsp;{{mb_substr($tlq->mota,0,160-3,'UTF-8').'...' }}</p>
                            <!-- </div> -->
                            
                            <div class="break"></div><hr>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#D10024;"><h5 style="color: white">TIN KHUYẾN MÃI</h5></div>
                    <div class="panel-body">
                        @foreach($tinkhuyenmai as $tkm)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tkm->id}}">
                                    <img class="img-responsive" src="upload/imgSanPham/{{$tkm->img}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tkm->id}}"><b>{{$tkm->tieude}}</b></a>
                                <br>
                                <p>{{$tkm->mota}}</p>
                            </div>

                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
<!-- end Page Content -->
@endsection