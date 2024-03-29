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
                    <form class="tree-most" id="form_order1" method="GET" action="timkiem">
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">                     
                            <h3 class="aside-title">Nhóm Sản Phẩm</h3>
                            <div class="checkbox-filter">
                                <?php $dem=0; ?>
                                @foreach($nhomsanpham as $nsp)
                                <?php $dem++; ?>
                                <div class="input-radio">
                                    <input
                                    @if($nsp->id == Request::get('id_nhom'))
                                        checked
                                    @endif
                                    type="radio" name="id_nhom" value="{{ $nsp->id }}" id="category-{{ $dem }}">
                                    <label for="category-{{ $dem }}">
                                        <span></span>
                                        {{$nsp->tennhom}}
                                    </label>
                                </div>
                                @endforeach
                            </div>  
                        </div>
                        <!-- /aside Widget -->
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Theo khoảng giá</h3>
                            <div class="price-filter">
                                <div class="input-number price-min">
                                    <input id="price-min" type="number" name="minprice" value="{{ Request::get('minprice') }}" placeholder="Thấp nhất" >
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number" name="maxprice" value="{{ Request::get('maxprice') }}" placeholder="Lớn nhất">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-raised btn-primary" style="width: 100%">
                                    <i class="fa fa-check-square-o"></i> Chọn
                            </button>
                            <br>
                            <h3 class="aside-title">Khoảng giá</h3>         
                            <div class="radio-filter">
                                @foreach($khoanggia as $kg)
                                <?php $dem++; ?>
                                <div>
                                    <a
                                    href="{{ request()->fullUrlWithQuery(['maxprice' => $kg->maxprice,'minprice'=>$kg->minprice]) }}"
                                    @if(Request::get('maxprice')==$kg->maxprice && Request::get('minprice')==$kg->minprice)
                                        style="color: #D10024"
                                    @endif
                                    id="category-{{ $dem }}" name="price" value="{{ $kg->id }}">
                                    <label for="category-{{ $dem }}" >
                                        <span></span>
                                        {{$kg->khoanggia}}
                                    </label>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">ROM</h3>
                            <div class="checkbox-filter">
                                @foreach($rom as $r)
                                    @if($r->rom !=null)
                                        <?php $dem++; ?>
                                        <div class="input-radio">
                                            <input
                                            @if($r->rom == Request::get('rom'))
                                                checked
                                            @endif
                                            type="radio" id="category-{{ $dem }}" name="rom" value="{{ $r->rom }}">
                                            <label for="category-{{ $dem }}">
                                                <span></span>
                                                {{$r->rom}} GB
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        
                        </div>
                        <a href="timkiem?timkiem={{ $finding }}&keyword={{ $keyword }}"  class="btn btn-raised btn-warning mr-1" style="width: 100%">
                            <i class="ft-refresh-ccw"></i> Xóa tất cả lựa chọn
                        </a>
                        
                    </div>
                    <!-- /ASIDE -->
                     @if($keyword != null && $tenhang != null)
                            <h3> ({{count($tongsanpham)}}) Kết quả tìm kiếm : ({{$tenhang}}) {{$keyword}} </h3>
                        @elseif($keyword == null && $tenhang != null)
                            <h3> ({{count($tongsanpham)}}) Kết quả tìm kiếm : ({{$tenhang}}) </h3>
                        @else
                            <h3> ({{count($tongsanpham)}}) Kết quả tìm kiếm : {{$keyword}} </h3>
                        @endif
                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <div class="store-filter clearfix">
                                <div class="store-sort">
                                    
                                        <label>
                                            <a style="font-size: 13px; font-weight: bolder; padding-left: 15px">Sắp Xếp Theo</a>
                                            <select name="sortby" class="input-select5 btn-sm">
                                                <option value="">click chọn...</option>
                                                <option {{Request::get('sortby') == 'tangdan' ? "selected = 'selected'" : ""}} value="tangdan">Giá Tăng Dần</option>
                                                <option {{Request::get('sortby') == 'giamdan' ? "selected = 'selected'" : ""}} value="giamdan">Giá Giảm Dần</option>
                                            </select>
                                        </label>
                                </div>
                            </div>

                        <!-- /store top filter -->
                        </form>
                        <!-- store products -->
                       
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
                                              @if(getBanner($sp->id) == 3)
                                                        @if(getBanchay1($sp->id))           
                                                            <span class="new">NEW</span>
                                                            <span class="sale">HOT</span>   
                                                        @else
                                                            <span class="new">NEW</span>
                                                        @endif
                                                    @elseif(getBanner($sp->id) == 7)
                                                        <span class="new">BlackFriday</span>
                                                        @if(getPhanTram($sp->id) != 0)
                                                            <span class="sale">-{{ getPhanTram($sp->id) }}%</span>
                                                        @endif
                                                        @if(getBanchay1($sp->id))           
                                                            <span class="sale">HOT</span>   
                                                        @endif
                                                    @elseif(getBanner($sp->id) == 8)
                                                        <span class="new">SEA GAMES 30</span>
                                                        @if(getPhanTram($sp->id) != 0)
                                                            <span class="sale">-{{ getPhanTram($sp->id) }}%</span>
                                                        @endif
                                                        @if(getBanchay1($sp->id))           
                                                            <span class="sale">HOT</span>   
                                                        @endif
                                                    @else
                                                        @if(getBanchay1($sp->id))           
                                                            <span class="sale">HOT</span>   
                                                        @endif
                                                        @if(getPhanTram($sp->id) != 0)
                                                            <span class="sale">-{{ getPhanTram($sp->id) }}%</span>
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
            $('.input-radio').change(function(){
                $("#form_order1").submit();
            });
            $('.input-radio1').change(function(){
                $("#form_order1").submit();
            });
            $('.input-select5').change(function(){
                $("#form_order1").submit()
            });
            $('input[type=radio]').click(function(){
                if (this.previous) {
                    this.checked = false;
                    $("#form_order1").submit();
                }
                this.previous = this.checked;
            });
        });

    </script>
@endsection
