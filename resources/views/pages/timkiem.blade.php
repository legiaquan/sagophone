<title>Tìm kiếm</title>
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
                            <li><a>Tìm Kiếm</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->        
<!-- SECTION -->
<div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                       
                       
                        
                        <!-- /aside Widget -->
                        <div class="col-md-9">
                            <br/>
                            <div class="row filter_data">

                            </div>
                        </div>

                    </div>
                    <!-- /ASIDE -->
                    
                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        @if($keyword != null && $tenhang != null)
                            <h3> ({{count($tongsanpham)}}) Kết quả tìm kiếm : ({{$tenhang}}) {{$keyword}} </h3>
                        @elseif($keyword == null && $tenhang != null)
                            <h3> ({{count($tongsanpham)}}) Kết quả tìm kiếm : ({{$tenhang}}) </h3>
                        @else
                            <h3> ({{count($tongsanpham)}}) Kết quả tìm kiếm : {{$keyword}} </h3>
                        @endif
                        <div class="row">
                            <!-- product -->
                                @foreach($sanpham as $sp)
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="chitiet/{{$sp->id}}">
                                                <img width="260px" height="250px" src="./upload/imgSanPham/{{$sp->hinhsp}}" alt="">
                                            </a>
                                           <div class="product-label">  
                                               @if(getBanner($sp->id) != null)
                                                    @if(getBanner($sp->id) == 3)
                                                        @if(getBanner2($sp->id) == 4)               
                                                            <span class="new">NEW</span>
                                                            <span class="sale">HOT</span>
                                                        @else
                                                            <span class="new">NEW</span>
                                                        @endif
                                                    @elseif(getBanner($sp->id) == 2)
                                                        @if(getBanner2($sp->id) == 4)               
                                                            <span class="sale">-{{ getPhanTram($sp->id) }}%</span>
                                                            <span class="sale">HOT</span>
                                                        @else
                                                            <span class="sale">-{{ getPhanTram($sp->id) }}%</span>
                                                        @endif
                                                    @elseif(getBanner($sp->id) == 4)
                                                        @if(getBanner2($sp->id) == 3)   
                                                            <span class="sale">HOT</span>           
                                                            <span class="new">NEW</span>
                                                        @elseif(getBanner2($sp->id) == 2)
                                                            <span class="sale">HOT</span>
                                                            <span class="sale">-{{ getPhanTram($sp->id) }}%</span>
                                                        @else
                                                            <span class="sale">HOT</span>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>                                          
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$sp->tenhang}}</p>
                                            <h3 class="product-name"><a style="white-space: nowrap;font-size: 12px" href="chitiet/{{$sp->id_sanpham}}/{{$sp->id}}">{{$sp->tensp}} {{ $sp->mau }}</a></h3>
                                            <h4 class="product-price">
                                                @if(getPhanTram($sp->id) != null)
                                                    <del class="product-old-price">{{number_format($sp->gia,0,',','.')}}</del>{{number_format($sp->gia * (100 - getPhanTram($sp->id)) / 100,0,',','.')}}VND
                                                    @else
                                                        {{number_format($sp->gia,0,',','.')}}VND
                                                @endif
                                            </h4>
                                            <?php
                                                $star = round((avgStarSanPham($sp->id)),2);
                                                $starnguyen = floor(avgStarSanPham($sp->id));
                                            ?>
                                                <div class="review-rating" style="height: 10px; margin-bottom: 5px">
                                                    @if($star != null)
                                                        @for($i=0;$i<$starnguyen;$i++)
                                                            @if($i < $star)
                                                                <i class="fa fa-star checked"></i>
                                                            @endif
                                                        @endfor
                                                        @if($star >= ($starnguyen + 0.5))
                                                            <i class="fa fa-star-half-o checked"></i>
                                                        @endif
                                                    @else
                                                        <a style="font-size: 10px">(Chưa có đánh giá)</a>
                                                    @endif
                                                </div>
                                            <div class="product-btns">
                                                
                                                <button class="quick-view"><a href="chitiet/{{$sp->id}}"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></a></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            <!-- /product -->
                                @endforeach
        
                        </div>
                        <!-- /store products -->
                        <br>
                        <!-- store bottom filter -->
                        <div class="store-filter clearfix" style="text-align: center;">
                           {{ $sanpham->appends(Request::except('find.product'))->links() }}
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
</div>
<!-- /SECTION -->

@endsection

@section('script')
    <script>
        $(function(){
            $('.input-select').change(function(){
                $("#form_order").submit();
                $('.input-select').val();
            });
        });
    </script>
@endsection
