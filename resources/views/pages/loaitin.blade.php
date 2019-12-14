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
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->

<!-- ##### Hero Area Start ##### -->

    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Add -->
                @if(Request::get('id')!=null)
                <a href="loaitin" style="align-items: center;text-decoration: overline;color: grey"><i class="glyphicon glyphicon-chevron-left"></i>Quay về trang tin tức</a>
                @endif
                <div class="col-12 col-lg-12 text-center">
                    <div class="hero-add">
                        
                        @foreach($loaitin as $lt)
                            @if(count($lt->tintuc) > 0)
                                <a
                                style="
                                @if(Request::get('id')==$lt->id)
                                   color: #AF1126; font-weight: bold;text-decoration: underline;
                                @endif
                                font-size:19px;
                                "
                                 href="{{ request()->fullUrlWithQuery(['id' => $lt->id]) }}" >{{$lt->tenloaitin}}</a>
                            @endif
                            &nbsp;
                        @endforeach

                    </div>
                </div>
            
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
    <br><br>
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">

                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="tintuc/{{ $tinmoi->id }}"><img src="upload/imgTinTuc/{{ $tinmoi->img }}" width="415px" height="262px" alt=""></a>
                                </div>
                                <br>
                                <div class="post-data">
                                    <a href="tintuc/{{ $tinmoi->id }}" class="product-name">
                                        <h4>{{ $tinmoi->tieude }}</h4>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">Đăng bởi <a>{{ $tinmoi->nhanvien->name }}</a><span style="font-style: italic;font-size: 12px;color: grey">&nbsp;&nbsp;&nbsp;{{ $tinmoi->created_at }}</span></p>

                                        
                                        <p class="post-excerp text-justify">
                                            {{ mb_substr($tinmoi->mota,0,270,'UTF-8').'...' }}
                                            <a href="tintuc/{{ $tinmoi->id }}" class="btn btn-link">Đọc tiếp</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <!-- Single Featured Post -->
                            @if(count($tinmoi1) > 0)
                                @foreach($tinmoi1 as $tm1)
                                <div class="single-blog-post featured-post-2">
                                    <div class="post-thumb">
                                        <a href="tintuc/{{ $tm1->id }}"><img src="upload/imgTinTuc/{{ $tm1->img }}" width="300px" height="200px" alt=""></a>
                                    </div>
                                    <p class="post-author">Đăng bởi <a>{{ $tinmoi->nhanvien->name }}</a><span style="font-style: italic;font-size: 12px;color: grey">&nbsp;&nbsp;&nbsp;{{ $tinmoi->created_at }}</span></p>
                                    <div class="post-data">
                                        <a href="tintuc/{{ $tm1->id }}" class="post-catagory"><h5>{{ $tm1->tieude }}</h5></a>
                                        <div class="post-meta">
                                            <p class="post-excerp text-justify">
                                                {{ mb_substr($tm1->mota,0,270,'UTF-8').'...' }}<a href="tintuc/{{ $tm1->id }}" class="btn btn-link">Đọc tiếp</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                    @if(count($tinmoi2) > 0)
                        @foreach($tinmoi2 as $tm2)
                        <div class="single-blog-post small-featured-post d-flex">
                        <div class="product-widget">
                            <div class="product-img">
                               <a href="tintuc/{{$tm2->id}}">
                                    <img src="upload/imgTinTuc/{{$tm2->img}}" alt="" width="90px" height="90px">
                                </a>        
                            </div>

                            <div class="product-body text-justify" style="margin-left: 30px">

                                <p class="product-category">{{ $tm2->tenloaitin }}</p>
                                    <h3 class="product-name"><a href="tintuc/{{$tm2->id}}">{{$tm2->tieude,0,100}}</a></h3>
                                    <p class="post-author" style="font-size: 11px">Đăng bởi <a>{{ $tinmoi->nhanvien->name }}</a><span style="font-style: italic;font-size: 9px;color: grey">&nbsp;&nbsp;&nbsp;{{ $tinmoi->created_at }}</span></p>
                                    <a href="tintuc/{{ $tm2->id }}" class="product-detail">
                                            {{ mb_substr($tm2->mota,0,90,'UTF-8').'...' }}
                                    </a>
                            </div>
                        </div>
                        </div>
                        <hr>
                         <!-- Single Featured Post -->
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection