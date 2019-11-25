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
						<li><a href="loaitin">Tin Tức</a></li>
						<li class="active"><a href="danhmuc">Danh Mục</a></li>
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

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="trangchu">Trang Chủ</a></li>
							<li><a href="danhmuc">Tất Cả Danh Mục</a></li>								
							<li><a href="danhmuc/{{$danhmuc->id}}/{{$danhmucloai->id}}">{{$danhmuc->tenhang}}</a></li>
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
						<!-- aside Widget -->
						<div class="aside">						
								<h3 class="aside-title"><a href="danhmuc" style="font-weight: bolder;">Danh Mục</a></h3>						
							@foreach($nhomsanpham as $nsp)
							<div class="checkbox-filter">						
								{{-- <div class="">
									<input type="checkbox" id="danhmuc" name="danhmuc" >
									<label for="danhmuc">
										<span></span>
										{{$nsp->tennhom}}
										@if($nsp->id == 1)
											<small>({{count($sanphamdt)}})</small>
										@else
											<small>({{count($sanphampk)}})</small>
										@endif
									</label>
								</div>					 --}}	
								<div class="">
									<label>
										<a href="danhmuc/{{$nsp->id}}">
											{{$nsp->tennhom}}
										</a>
									</label>
									
									@if($nsp->id == 1)
										<small>({{count($sanphamdt)}})</small>
									@elseif($nsp->id == 2)
										<small>({{count($sanphampk)}})</small>
									@else
										<small>(0)</small>
									@endif
								</div>
							</div>
							@endforeach
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						{{-- <div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div> --}}
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title"><a href="danhmuc" style="font-weight: bolder;">THƯƠNG HIỆU</a></h3>
							<div class="">
								@foreach($hangdt as $hdt)
								<div class="">
									<label>
										<a href="danhmuc/{{$hdt->id}}/{{$danhmucloai->id}}">
											{{$hdt->tenhang}}
										</a>
									</label>
									
									@if($hdt->id == 1)
										<small>({{count($sanphamapple)}})</small>
									@elseif($hdt->id == 2)
										<small>({{count($sanphamsamsung)}})</small>
									@elseif($hdt->id == 3)
										<small>({{count($sanphamsony)}})</small>
									@elseif($hdt->id == 4)
										<small>({{count($sanphamnokia)}})</small>
									@else
										<small>({{count($sanphamvsmart)}})</small>
									@endif

									<span></span>
										
								</div>
								@endforeach							
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Sản Phẩm Bán Chạy</h3>
							<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								@foreach($sanphambanchay1 as $spbc1)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$spbc1->id_sanpham}}/{{$spbc1->id}}">
											<img src="upload/imgSanPham/{{$spbc1->hinhsp}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spbc1->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spbc1->id_sanpham}}/{{$spbc1->id}}">{{$spbc1->tensp}}</a></h3>
										<h4 class="product-price">{{$spbc1->gia}}<del class="product-old-price">{{$spbc1->gia*0.3}}</del></h4>
									</div>
								</div>
								@endforeach							
							</div>
							<div>
								<!-- product widget -->
								@foreach($sanphambanchay2 as $spbc2)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$spbc2->id_sanpham}}/{{$spbc2->id}}">
											<img src="upload/imgSanPham/{{$spbc2->hinhsp}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spbc2->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spbc2->id_sanpham}}/{{$spbc2->id}}">{{$spbc2->tensp}}</a></h3>
										<h4 class="product-price">{{$spbc2->gia}}<del class="product-old-price">{{$spbc2->gia*0.3}}</del></h4>
									</div>
								</div>
								@endforeach							
							</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->
					<h2>
						{{$danhmuc->tenhang}}
					</h2>
					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							@foreach($sanphamdanhmuc as $sp)
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<a href="chitiet/{{$sp->id_sanpham}}/{{$sp->id}}">
											<img width="250px" height="250px" src="./upload/imgSanPham/{{$sp->hinhsp}}" alt="">
										</a>
										
										<div class="product-label">										
												<span class="new">NEW</span>
												<span class="sale">-30%</span>
										</div>									
									</div>
									<div class="product-body">
										<p class="product-category">{{$sp->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$sp->id_sanpham}}/{{$sp->id}}">{{$sp->tensp}}</a></h3>
										<h4 class="product-price">{{$sp->gia}}<del class="product-old-price">{{$sp->gia*0.5}}</del></h4>
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
											<button class="quick-view"><a href="chitiet/{{$sp->id_sanpham}}/{{$sp->id}}"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></a></button>
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
						<div class="store-filter clearfix">
							{{$sanphamdanhmuc->links()}}
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