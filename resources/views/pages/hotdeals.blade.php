<title>Hot Deals</title>
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
						<li class="active"><a href="hotdeals">Hot Deals</a></li>
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
							<li><a>Trang Chủ</a></li>
							<li class="active"><a>Hot Deals</a></li>
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
				<img width="1140px" height="250px" src="./upload/imgKhuyenMai/{{$hinh}}" alt="">
				<hr>
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<div class="aside">
							<h3 class="aside-title"><a style="font-weight: bolder;">Thương Hiệu</a></h3>
							@foreach($hangdt as $hdt)
								
								<ul>
									<li><a class="{{Request::get('id_hang') == $hdt->id? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['id_hang' => $hdt->id]) }}">{{$hdt->tenhang}}</a></li><br>
								</ul>
								
							@endforeach
							
						</div>
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title"><a style="font-weight: bolder;">Lọc Theo Giá</a></h3>
							
								<ul>
									<li><a class="{{Request::get('gia') == 1 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 1.000.000 VND</a></li><br>
									<li><a class="{{Request::get('gia') == 2 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 2]) }}">1.000.000 - 3.000.000 VND</a></li><br>
									<li><a class="{{Request::get('gia') == 3 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 3]) }}">3.000.000 - 5.000.000 VND</a></li><br>
									<li><a class="{{Request::get('gia') == 4 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 4]) }}">5.000.000 - 7.000.000 VND</a></li><br>
									<li><a class="{{Request::get('gia') == 5 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 5]) }}">7.000.000 - 10.000.000 VND</a></li><br>
									<li><a class="{{Request::get('gia') == 6 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 6]) }}">Trên 10.000.000 VND</a></li><br>
								</ul>
						
							
							
						</div>
						<div class="aside">
							<h3 class="aside-title"><a style="font-weight: bolder;">ROM</a></h3>
							
								<ul>
									<li><a class="{{Request::get('rom') == 32 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['rom' => 32]) }}">32 GB</a></li><br>
									<li><a class="{{Request::get('rom') == 64 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['rom' => 64]) }}">64 GB</a></li><br>
									<li><a class="{{Request::get('rom') == 128 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['rom' => 128]) }}">128 GB</a></li><br>
									<li><a class="{{Request::get('rom') == 256 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['rom' => 256]) }}">256 GB</a></li><br>
								</ul>
			
						</div>
						
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
						
							<!-- store top filter -->
							<div class="store-filter clearfix" style="text-align: right;">

								<form class="tree-most" id="form_order" method="GET">
								<div class="store-sort">
										Sắp xếp theo :  			
											<select name="orderby" class="input-select">
												<option class="{{Request::get('orderby') == "" ? 'selected' : ''}}" {{Request::get('orderby') == "" ? "selected = 'selected'" : ""}}  value="">click chọn...</option>
												<option class="{{Request::get('orderby') == "new" ? 'selected' : ''}}" {{Request::get('orderby') == "new" ? "selected = 'selected'" : ""}} {{ request()->fullUrlWithQuery(['orderby' => "new"]) }} value="new">Sản phẩm mới</option>
												<option class="{{Request::get('orderby') == "price_min" ? 'active' : ''}}" {{Request::get('orderby') == "price_min" ? "selected = 'selected'" : ""}} value="price_min">Giá tăng dần</option>
												<option class="{{Request::get('orderby') == "price_max" ? 'active' : ''}}" {{Request::get('orderby') == "price_max" ? "selected = 'selected'" : ""}} value="price_max">Giá giảm dần</option>
											</select>	
									</label>
								
								</div>
								</form>
							</div>
							<!-- /store top filter -->
						
						<!-- store products -->
						<div class="row">
							<!-- product -->
								@foreach($sanphamhotdealstt as $sp)
								<div class="col-md-4 col-xs-6">
									<div class="product">
										<div class="product-img">
											<a href="chitiet/{{$sp->id}}">
												<img width="260px" height="250px" src="./upload/imgSanPham/{{$sp->hinhsp}}" alt="">
											</a>
											<div class="product-label">
													@if($sp->phantramkhuyenmai != null)
														<span class="sale">-{{$sp->phantramkhuyenmai}}%</span>	
													@endif											
												</div>							
										</div>
										<div class="product-body">
											<p class="product-category">{{$sp->tenhang}}</p>
											<h3 class="product-name"><a style="white-space: nowrap;font-size: 12px" href="chitiet/{{$sp->id_sanpham}}">{{$sp->tensp}}</a></h3>
											<h4 class="product-price">
												@if($sp->phantramkhuyenmai != null)
													<del class="product-old-price">{{number_format($sp->gia,0,',','.')}}</del>{{number_format($sp->gia * (100 - $sp->phantramkhuyenmai) / 100,0,',','.')}}VND
													@else
														{{number_format($sp->gia,0,',','.')}}VND
												@endif
											</h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-btns">
												{{-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> --}}
												<button class="quick-view" onclick="window.location.href = 'chitiet/{{$sp->id}}';"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$sp->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
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
							{{ $sanphamhotdealstt->appends(request()->query())->links() }}
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
 				//$("#form_order").submit();
 				$('.input-select').val();
 			});
 		});
    </script>
@endsection
