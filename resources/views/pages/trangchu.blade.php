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
						<li class="active"><a href="trangchu">Trang Chủ</a></li>
						<li><a href="hotdeals">Hot Deals</a></li>
						<li><a href="loaitin">Tin Tức</a></li>
						<li><a href="danhmuc">Cửa Hàng</a></li>									
						<li><a href="lienhe">Liên Hệ</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
<!-- /NAVIGATION -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">				
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Apples<br>Collection</h3>
								<a href="danhmuc" class="cta-btn">Mua Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Samsungs<br>Collection</h3>
								<a href="danhmuc" class="cta-btn">Mua Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Phụ Kiện<br>Collection</h3>
								<a href="danhmuc" class="cta-btn">Mua Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<a href="hotdeals"><h3 class="title">Sản Phẩm Hot Deals</h3></a>
							{{-- <div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach($sanphamhotdeals as $sphd)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="chitiet/{{$sphd->id_sanpham}}/{{$sphd->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$sphd->hinhsp}}" alt="">
												</a>
												
												<div class="product-label">
													<span class="sale">-30%</span>												
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$sphd->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$sphd->id_sanpham}}/{{$sphd->id}}">{{$sphd->tensp}}</a></h3>
												<h4 class="product-price">{{$sphd->gia}}<del class="product-old-price">{{$sphd->gia * 0.8}}
												</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>											
											</div>
											<div class="add-to-cart">
												<a style="color: white;font-weight: bolder;" href="{{route('add.shopping.cart',$sphd->id)}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
											</div>
										
										</div>
										<!-- /product -->
										@endforeach
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản Phẩm Mới</h3>
							{{-- <div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Apples</a></li>
									<li><a data-toggle="tab" href="#tab1">Samsungs</a></li>
									<li><a data-toggle="tab" href="#tab1">Phụ Kiện</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-2">
										@foreach($sanphammoi as $spm)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="chitiet/{{$spm->id_sanpham}}/{{$spm->id}}"><img width="250px" height="250px" src="./upload/imgSanPham/{{$spm->hinhsp}}" alt=""></a>
												<div class="product-label">
													{{-- <span class="sale">-30%</span> --}}
													<span class="new">NEW</span>
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spm->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet//{{$spm->id_sanpham}}/{{$spm->id}}">{{$spm->tensp}}</a></h3>
												<h4 class="product-price">{{$spm->gia}}</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>											
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
											</div>
										
										</div>
										@endforeach
										<!-- /product -->

										
										
									</div>
								
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản Phẩm Bán Chạy</h3>
							{{-- <div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-3">
										@foreach($sanphambanchay as $spbc)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="chitiet/{{$spbc->id_sanpham}}/{{$spbc->id}}">
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$spbc->hinhsp}}" alt="">
												</a>
												<div class="product-label">
													{{-- <span class="sale">-30%</span> --}}
													<span class="new">HOT</span>
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spbc->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$spbc->id_sanpham}}/{{$spbc->id}}">{{$spbc->tensp}}</a></h3>
												<h4 class="product-price">{{$spbc->gia}}</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>											
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
											</div>
										
										</div>
										<!-- /product -->
										@endforeach
										
									</div>
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản Phẩm Hot Deals</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								@foreach($sanphamhotdeals1 as $sphd1)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$sphd1->id_sanpham}}/{{$sphd1->id}}">
											<img src="upload/imgSanPham/{{$sphd1->hinhsp}}" alt="" width="70px" height="70px">
										</a>		
									</div>
									<div class="product-body">
										<p class="product-category">{{$sphd1->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$sphd1->id_sanpham}}/{{$sphd1->id}}">{{$sphd1->tensp}}</a></h3>
										<h4 class="product-price">{{$sphd1->gia}}<del class="product-old-price">>{{$sphd1->gia * 0.8}}</del></h4>
									</div>
								</div>
								@endforeach				
								<!-- /product widget -->			
							</div>
							<div>
								<!-- product widget -->
								@foreach($sanphamhotdeals2 as $sphd2)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$sphd2->id_sanpham}}/{{$sphd2->id}}">
											<img src="upload/imgSanPham/{{$sphd2->hinhsp}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$sphd2->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$sphd2->id_sanpham}}/{{$sphd2->id}}">{{$sphd2->tensp}}</a></h3>
										<h4 class="product-price">{{$sphd2->gia}}<del class="product-old-price">{{$sphd2->gia * 0.8}}</del></h4>
									</div>
								</div>
								@endforeach				
								<!-- /product widget -->			
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản Phẩm Mới</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">						
							<div>
								<!-- product widget -->
								@foreach($sanphammoi1 as $spm1)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$spm1->id_sanpham}}/{{$spm1->id}}">
											<img src="upload/imgSanPham/{{$spm1->hinhsp}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spm1->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spm1->id_sanpham}}/{{$spm1->id}}">{{$spm1->tensp}}</a></h3>
										<h4 class="product-price">{{$spm1->gia}} <del class="product-old-price">{{$spm1->gia *0.5}}</del></h4>
									</div>
								</div>
								@endforeach							
							</div>
							<div>
								<!-- product widget -->
								@foreach($sanphammoi2 as $spm2)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$spm2->id_sanpham}}/{{$spm2->id}}">
											<img src="upload/imgSanPham/{{$spm2->hinhsp}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spm2->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spm2->id_sanpham}}/{{$spm2->id}}">{{$spm2->tensp}}</a></h3>
										<h4 class="product-price">{{$spm1->gia}} <del class="product-old-price">{{$spm1->gia * 0.5}} </del></h4>
									</div>
								</div>
								@endforeach							
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản Phẩm Bán Chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-6" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-6">
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
										<h4 class="product-price">{{$spbc1->gia}} <del class="product-old-price">{{$spbc1->gia * 0.5}}</del></h4>
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
										<h4 class="product-price">{{$spbc2->gia}}<del class="product-old-price">{{$spbc2->gia * 0.5}}</del></h4>
									</div>
								</div>
								@endforeach							
							</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<!-- /SECTION -->

	
@endsection
	