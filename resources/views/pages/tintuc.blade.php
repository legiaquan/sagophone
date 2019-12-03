<title>Tin Tức</title>
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
                            <li><a>Trang Chủ</a></li>
                            <li class="active"><a>Tin Tức</a></li>
                            <li class="active"><a>{{ mb_substr($tintuc->tieude,0,50,'UTF-8').'...' }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->
<!-- Page Content -->
<br>
    <div class="container">
        <div class="row">
            
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
               
                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->tieude}}</h1>

               
                


                <!-- Preview Image -->
                <img class="img-responsive" src="upload/imgTinTuc/{{$tintuc->img}}" alt="" width="1000px" height="">

          

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
                    <div class="panel-heading" style="background-color:#FA8258;"><h5 style="color: white">TIN LIÊN QUAN</h5></div>
                    <div class="panel-body">

                         <!-- item -->
                         @foreach($tinlienquan as $tlq)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tlq->id}}">
                                    <img class="img-responsive" src="upload/imgTinTuc/{{$tlq->img}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tlq->id}}"><b>{{$tlq->tieude}}</b></a>
                                <br>
                                <p>{{ mb_substr($tlq->mota,0,50,'UTF-8').'...' }}</p>
                            </div>
                            
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#FA8258;"><h5 style="color: white">TIN KHUYẾN MÃI</h5></div>
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
                                <p>{{ mb_substr($tlq->mota,0,50,'UTF-8').'...' }}</p>
                            </div>

                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>
                
            </div>
        
        </div>
        <p class="lead">
            <span class="glyphicon glyphicon-pencil"></span> Đăng vào {{$tintuc->created_at}}</p>
            Bỏi <a>{{$tenadmin}}</a>
            <p style="text-align: right; padding-right: 300px">
                <a href="loaitin" style="font-size: 20px" >Quay Lại</a>
            </p>
        </p>

        <hr>

        <!-- /.row -->
    </div>

<!-- end Page Content -->
@endsection