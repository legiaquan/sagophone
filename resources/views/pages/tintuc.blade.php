<title>Chi Tiết Tin Tức</title>
@extends('layouts.index')
@section('css')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
@endsection
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
                        <li class="active"><a href="loaitin">Tin Tức</a></li>
                        <li><a href="dienthoai">Điện Thoại</a></li>
                        <li><a href="phukien">Phụ Kiện</a></li>                                 
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
                            <li><a href="trangchu">Trang Chủ</a></li>
                            <li class="active"><a href="loaitin">Tin Tức</a></li>
                            <li class="active"><a href="tintuc/{{ $tintuc->id }}">{{ mb_substr($tintuc->tieude,0,50,'UTF-8').'...' }}</a></li>
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
            <div class="w3-display-container">

                        @foreach($banner as $row)
                            @if($row->trangthai=='show' && isset($row->ngaybatdau) && count($row->danhsachbanner) > 0)
                            
                            <a href="cuahang?id_banner={{ $row->id }}"><img class="mySlides w3-animate-fading" src="./upload/imgKhuyenMai/{{$row->hinhbanner}}" style="width:100%;height:250px"></a>
                            
                            @endif
                        @endforeach

                        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                          <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                          <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                        <?php $dem = 1;?>
                          @foreach($banner as $row)
                            @if($row->trangthai=='show' && isset($row->ngaybatdau) && count($row->danhsachbanner) > 0)
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv({{ $dem }})"></span>
                            <?php $dem++;?>
                            @endif
                          @endforeach
                        </div>
                     </div>
                     <br>
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
               <a href="javascript: window.history.go(-1)" style="align-items: center;text-decoration: overline;color: grey"><i class="glyphicon glyphicon-chevron-left"></i>Quay về trang trước</a>
                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="text-justify">{{$tintuc->tieude}}</h1>
                <br>
                <span class="glyphicon glyphicon-pencil text-right"></span> Đăng vào {{$tintuc->created_at}}</p>
                Bỏi <a class="product-name text-right">{{$tenadmin}}</a>
               
                <hr>


                <!-- Preview Image -->
                <img class="img-responsive" src="upload/imgTinTuc/{{$tintuc->img}}" alt="" width="1000px" height="">

                

                <!-- Post Content -->
                <p class="lead text-justify">
                    {!! $tintuc->noidung !!} <!-- chèn css html -->
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Posted Comments -->

            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">
                @if(count($tinlienquan) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#2A140F;"><h5 style="color: white">TIN LIÊN QUAN</h5></div>
                        <div class="panel-body">

                             <!-- item -->
                             @foreach($tinlienquan as $tlq)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-lg-5">
                                    <a href="tintuc/{{$tlq->id}}">
                                        <img src="upload/imgTinTuc/{{$tlq->img}}" width="90px" height="90px" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7 text-justify">
                                    <a href="tintuc/{{$tlq->id}}" style="font-size: 13px;"><b>{{$tlq->tieude}}</b></a>
                                </div>
                                
                                <div class="break"></div>
                            </div>
                            <hr>
                            @endforeach
                            <!-- end item -->
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#AB280B;"><h5 style="color: white">TIN KHÁC</h5></div>
                    <div class="panel-body">
                        @foreach($tinkhac as $tkm)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tkm->id}}">
                                    <img src="upload/imgTinTuc/{{$tkm->img}}" width="90px" height="90px"  alt="">
                                </a>
                            </div>
                            <div class="col-md-7 text-justify">
                                <a href="tintuc/{{$tkm->id}}" style="font-size: 13px;"><b>{{$tkm->tieude}}</b></a>
                            </div>

                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <hr>
                        @endforeach
                    </div>
                </div>
                
            </div>
            
        </div>

        <p class="lead">
            <p>
                <a href="trangchu" style="font-size: 20px" >Trang Chủ</a>
                @if(isset($tinketiep))
                    <a href="tintuc/{{ $tinketiep->id }}" style="font-size: 20px; text-align: right; padding-left: 650px" >Tin Kế Tiếp</a>
                @else
                    <a href="loaitin" style="font-size: 20px; text-align: right; padding-left: 650px" >Tin Tức</a>
                @endif
            </p>
        </p>

        <hr>

        <!-- /.row -->
    </div>
<!-- end Page Content -->
@endsection
@section('script')
<script>
    var slideIndex = 1;
    showDivs(slideIndex);
    
    function plusDivs(n) {
      showDivs(slideIndex += n);
    }
    
    function currentDiv(n) {
      showDivs(slideIndex = n);
    }
    
    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
      }
      x[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " w3-white";
    }
    var myIndex = 0;
    carousel();

    function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 9000);    
    }
    </script>
@endsection
