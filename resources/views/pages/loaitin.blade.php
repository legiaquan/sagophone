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
<!-- Page Content -->
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active" style="background-color:#151515;">
                        <h4><a href="loaitin" style="color: white; font-weight: bolder;">LOẠI TIN</a></h4>
                    </li>
                    @foreach($loaitin as $lt)
                        <li class="list-group-item menu1">
                            <a class="{{Request::get('id') == $lt->id? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['id' => $lt->id]) }}"><h5 class="product-name">{{$lt->tenloaitin}}</h5></a>
                        </li>
                    @endforeach
                   
                </ul>
            </div>
            
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#151515; color:white;">
                       <h4><a href="loaitin" style="color: white; font-weight: bolder;">TẤT CẢ CÁC TIN</a></h4>
                    </div>
                    @foreach($tintuc as $tt)
                        <div class="row-item row">
                            <div class="col-md-3">
                            
                                <a href="tintuc/{{$tt->id}}">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="upload/imgTinTuc/{{$tt->img}}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <br>
                                <h3><a href="tintuc/{{$tt->id}}"> {{$tt->tieude}} </a></h3>
                                <p>{{$tt->mota}}</p>
                                <div>
                                     <a class="btn btn-primary" href="tintuc/{{$tt->id}}" style="margin-top: 75px">Chi tiết</a>
                                </div>
                               
                            </div>
                           
                        </div>
                        <hr>
                    @endforeach
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            {{$tintuc->links()}}
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
<!-- end Page Content -->
@endsection