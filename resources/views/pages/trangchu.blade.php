@extends('layouts.index')
@section('css')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
						<li class="active"><a href="trangchu">Trang Chủ</a></li>
						<li><a href="hotdeals">Hot Deals</a></li>
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
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- /shop -->
					{{-- <a href="hotdeals" ><img width="1140px" height="250px" src="./upload/imgKhuyenMai/{{$hinh}}" alt=""></a> --}}
					<div class="w3-content w3-display-container" >
						@foreach($banner as $row)
							@if($row->trangthai=='show' && isset($row->ngaybatdau))
							
							<a href="banner/{{ $row->id }}"><img class="mySlides w3-animate-fading" src="./upload/imgKhuyenMai/{{$row->hinhbanner}}" style="width:100%;height:250px"></a>
							
							@endif
						@endforeach
						<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
						  <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
						  <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
						<?php $dem = 1;?>
						  @foreach($banner as $row)
							@if($row->trangthai=='show' && isset($row->ngaybatdau))
							<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv({{ $dem }})"></span>
							<?php $dem++;?>
							@endif
						  @endforeach
						</div>
					  </div>
				<!-- row -->
				<div class="row">				
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/6.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Apple<br>Collection</h3>
								<a href="cuahang" class="cta-btn">Mua Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/1.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Samsung<br>Collection</h3>
								<a href="cuahang" class="cta-btn">Mua Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/product02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Phụ Kiện<br>Collection</h3>
								<a href="cuahang" class="cta-btn">Mua Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					
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
												<a href="chitiet/{{$sphd->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$sphd->hinhchitiet}}" alt="">
												</a>
												
												<div class="product-label">
													@if($sphd->phantramkhuyenmai != null)
														<span class="sale">-{{$sphd->phantramkhuyenmai}}%</span>
													@endif											
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$sphd->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$sphd->id}}">{{$sphd->tensp}}</a></h3>
												<h4 class="product-price">
													@if($sphd->phantramkhuyenmai != null)
													<del class="product-old-price">{{number_format($sphd->gia,0,',','.')}}</del>{{number_format($sphd->gia * (100 - $sphd->phantramkhuyenmai) / 100,0,',','.')}}VND
													@else
														{{number_format($sphd->gia,0,',','.')}}VND
													@endif
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
												<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$sphd->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
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
												<a href="chitiet/{{$spm->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$spm->hinhchitiet}}" alt="">
												</a>
												
												<div class="product-label">
													
														<span class="new">NEW</span>
																							
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spm->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$spm->id}}">{{$spm->tensp}}</a></h3>
												<h4 class="product-price">
													@if($spm->phantramkhuyenmai != null)
													<del class="product-old-price">{{number_format($spm->gia,0,',','.')}}</del>{{number_format($spm->gia * (100 - $spm->phantramkhuyenmai) / 100,0,',','.')}}VND
													@else
														{{number_format($spm->gia,0,',','.')}}VND
													@endif
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
												<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$spm->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
											</div>
										
										</div>
										<!-- /product -->
										@endforeach

										
										
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
												<a href="chitiet/{{$spbc->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$spbc->hinhchitiet}}" alt="">
												</a>
												
												<div class="product-label">
													<span class="sale">HOT</span>									
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spbc->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$spbc->id}}">{{$spbc->tensp}}</a></h3>
												<h4 class="product-price">
													@if($spbc->phantramkhuyenmai != null)
													<del class="product-old-price">{{number_format($spbc->gia,0,',','.')}}</del>{{number_format($spbc->gia * (100 - $spbc->phantramkhuyenmai) / 100,0,',','.')}}VND
													@else
														{{number_format($spbc->gia,0,',','.')}}VND
													@endif
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
												<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$spbc->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
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
										<a href="chitiet/{{$sphd1->id}}">
											<img src="upload/imgSanPham/{{$sphd1->hinhchitiet}}" alt="" width="70px" height="70px">
										</a>		
									</div>
									<div class="product-body">
										<p class="product-category">{{$sphd1->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$sphd1->id}}">{{$sphd1->tensp}}</a></h3>
										<h4 class="product-price">
											@if($sphd1->phantramkhuyenmai != null)
												<del class="product-old-price">{{number_format($sphd1->gia,0,',','.')}}</del>{{number_format($sphd1->gia * (100 - $sphd1->phantramkhuyenmai) / 100,0,',','.')}}VND
												@else
													{{number_format($sphd1->gia,0,',','.')}}VND
											@endif
										</h4>
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
										<a href="chitiet/{{$sphd2->id}}">
											<img src="upload/imgSanPham/{{$sphd2->hinhchitiet}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$sphd2->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$sphd2->id_sanpham}}/{{$sphd2->id}}">{{$sphd2->tensp}}</a></h3>
										<h4 class="product-price">
											@if($sphd2->phantramkhuyenmai != null)
												<del class="product-old-price">{{number_format($sphd2->gia,0,',','.')}}</del>{{number_format($sphd2->gia * (100 - $sphd2->phantramkhuyenmai) / 100,0,',','.')}}VND
												@else
													{{number_format($sphd2->gia,0,',','.')}}VND
											@endif
										</h4>
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
										<a href="chitiet/{{$spm1->id}}">
											<img src="upload/imgSanPham/{{$spm1->hinhchitiet}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spm1->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spm1->id_sanpham}}/{{$spm1->id}}">{{$spm1->tensp}}</a></h3>
										<h4 class="product-price">
											@if($spm1->phantramkhuyenmai != null)
												<del class="product-old-price">{{number_format($spm1->gia,0,',','.')}}</del>{{number_format($spm1->gia * (100 - $spm1->phantramkhuyenmai) / 100,0,',','.')}}VND
												@else
													{{number_format($spm1->gia,0,',','.')}}VND
											@endif
										</h4>
									</div>
								</div>
								@endforeach							
							</div>
							<div>
								<!-- product widget -->
								@foreach($sanphammoi2 as $spm2)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$spm2->id}}">
											<img src="upload/imgSanPham/{{$spm2->hinhchitiet}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spm2->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spm2->id}}">{{$spm2->tensp}}</a></h3>
										<h4 class="product-price">
											@if($spm2->phantramkhuyenmai != null)
												<del class="product-old-price">{{number_format($spm2->gia,0,',','.')}}</del>{{number_format($spm2->gia * (100 - $spm2->phantramkhuyenmai) / 100,0,',','.')}}VND
												@else
													{{number_format($spm2->gia,0,',','.')}}VND
											@endif
										</h4>
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
										<a href="chitiet/{{$spbc1->id}}">
											<img src="upload/imgSanPham/{{$spbc1->hinhchitiet}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spbc1->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spbc1->id}}">{{$spbc1->tensp}}</a></h3>
										<h4 class="product-price">
											@if($spbc1->phantramkhuyenmai != null)
												<del class="product-old-price">{{number_format($spbc1->gia,0,',','.')}}</del>{{number_format($spbc1->gia * (100 - $spbc1->phantramkhuyenmai) / 100,0,',','.')}}VND
												@else
													{{number_format($spbc1->gia,0,',','.')}}VND
											@endif
										</h4>
									</div>
								</div>
								@endforeach							
							</div>
							<div>
								<!-- product widget -->
								@foreach($sanphambanchay2 as $spbc2)
								<div class="product-widget">
									<div class="product-img">
										<a href="chitiet/{{$spbc2->id}}">
											<img src="upload/imgSanPham/{{$spbc2->hinhchitiet}}" alt="" width="70px" height="70px">
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{$spbc2->tenhang}}</p>
										<h3 class="product-name"><a href="chitiet/{{$spbc2->id}}">{{$spbc2->tensp}}</a></h3>
										<h4 class="product-price">
											@if($spbc2->phantramkhuyenmai != null)
												<del class="product-old-price">{{number_format($spbc2->gia,0,',','.')}}</del>{{number_format($spbc2->gia * (100 - $spbc2->phantramkhuyenmai) / 100,0,',','.')}}VND
												@else
													{{number_format($spbc2->gia,0,',','.')}}VND
											@endif
										</h4>
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
	<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							
							<ul class="newsletter-follow">
								<li>
									<a href="https://www.facebook.com/100003864792199"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://www.facebook.com/100003864792199"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://www.facebook.com/100003864792199"><i class="fa fa-instagram"></i></a>
								</li>							
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<!-- /NEWSLETTER -->
	
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