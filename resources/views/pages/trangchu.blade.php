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
						<li class="active"><a href="trangchu">Trang Chủ</a></li>
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
					<div class="w3-content w3-display-container">
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
								<img width="250px" height="300px" src="upload/imgSanPham/{{ $apple->hinhsp }}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{ $apple->hangdt->tenhang }}<br>Collection</h3>
								<a href="cuahang?id_hang={{$apple->id}}" class="cta-btn">Đến Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/{{ $samsung->hinhsp }}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{ $samsung->hangdt->tenhang }}<br>Collection</h3>
								<a href="cuahang?id_hang={{$samsung->id}}" class="cta-btn">Đến Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/{{ $nokia->hinhsp }}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{ $nokia->hangdt->tenhang }}<br>Collection</h3>
								<a href="cuahang?id_hang={{$nokia->id}}" class="cta-btn">Đến Ngay<i class="fa fa-arrow-circle-right"></i></a>
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
		@if($bannerhotdeals->trangthai =='show' && $bannerhotdeals->ngaybatdau != null)
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<a href="hotdeals"><h3 class="title">Sản Phẩm Hot Deals</h3></a>
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
														<span class="sale">-{{$sphd->phantramkhuyenmai}}%</span>
														@if(getBanner($sphd->id) == 3)
															<span class="new">NEW</span>
														@elseif(getBanner($sphd->id) == 4)
															<span class="sale">HOT</span>
														@endif
													</div>
												</div>
												
												<div class="product-body">
													<p class="product-category">{{$sphd->tenhang}}</p>
													<h3 class="product-name"><a href="chitiet/{{$sphd->id}}">{{$sphd->tensp}} {{$sphd->mau }}</a></h3>
													<h4 class="product-price">
														@if($sphd->phantramkhuyenmai != null)
														<del class="product-old-price">{{number_format($sphd->gia,0,',','.')}}</del>{{number_format($sphd->gia * (100 - $sphd->phantramkhuyenmai) / 100,0,',','.')}}VND
														@else
															{{number_format($sphd->gia,0,',','.')}}VND
														@endif
													</h4>
													<?php
														$star = round((avgStarSanPham($sphd->id)),2);
														$starnguyen = floor(avgStarSanPham($sphd->id));
													?>
													<div class="review-rating">
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
															<a style="font-size: 14px;">(Chưa có đánh giá)</a>
														@endif
													</div>										
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$sphd->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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
			@else
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<a><h3 class="title">Sản Phẩm Hot Deals</h3></a>&nbsp;<a style="font-size: 20px; color: red">(COMING SOON)</a>
							</div>
						</div>
						<!-- /section title -->

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			@endif
			<!-- /SECTION -->


		<!-- SECTION -->
		@if($bannernew->trangthai =='show')
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
													@if($spm->id_banner == 4)
														<span class="hot">HOT</span>
													@endif									
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spm->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$spm->id}}">{{$spm->tensp}} {{$spm->mau }}</a></h3>
												<h4 class="product-price">
													@if($spm->phantramkhuyenmai != null)
													<del class="product-old-price">{{number_format($spm->gia,0,',','.')}}</del>{{number_format($spm->gia * (100 - $spm->phantramkhuyenmai) / 100,0,',','.')}}VND
													@else
														{{number_format($spm->gia,0,',','.')}}VND
													@endif
												</h4>
												<?php
														$star = round((avgStarSanPham($spm->id)),2);
														$starnguyen = floor(avgStarSanPham($spm->id));
													?>
													<div class="review-rating">
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
															<a style="font-size: 14px;">(Chưa có đánh giá)</a>
														@endif
													</div>											
											</div>
											<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$spm->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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
		@endif
		
		@if($bannerbanchay->trangthai =='show' && $bannerbanchay->ngaybatdau != null)
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
													@if(getPhanTram($spbc->id) != null)
														@if(getBanner($spbc->id) == 3)	
															<span class="sale">HOT</span>			
															<span class="new">NEW</span>
														@elseif(getBanner2($spbc->id) == 2)
															<span class="sale">HOT</span>
															<span class="sale">-{{ getPhanTram($spbc->id) }}%</span>
														@endif
													@else
														<span class="sale">HOT</span>
													@endif							
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spbc->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$spbc->id}}">{{$spbc->tensp}} {{ $spbc->mau }}</a></h3>
												<h4 class="product-price">
													@if(getPhanTram($spbc->id) != null)
													<del class="product-old-price">{{number_format($spbc->gia,0,',','.')}}</del>{{number_format($spbc->gia * (100 - getPhanTram($spbc->id)) / 100,0,',','.')}}VND
													@else
														{{number_format($spbc->gia,0,',','.')}}VND
												@endif
												</h4>
												<?php
														$star = round((avgStarSanPham($spbc->id)),2);
														$starnguyen = floor(avgStarSanPham($spbc->id));
													?>
													<div class="review-rating">
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
															<a style="font-size: 14px;">(Chưa có đánh giá)</a>
														@endif
													</div>											
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$spbc->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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
		@endif
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
						<div>
							<div class="section-title">
								<a href="hotdeals"><h3 class="title">Tin Tức</h3></a>
							</div>
						</div>
						<!-- /section title -->
					@foreach($khuyenmai as $km)
					<div>
						<div>
							<div class="product-widget">
									<div class="product-img">
										<a href="tintuc/{{$km->id}}">
											<img src="upload/imgTinTuc/{{$km->img}}" alt="" width="160px" height="110px">
										</a>		
									</div>
									<div class="product-body" style="margin-left: 100px">
										<p class="product-category">{{ $km->tenloaitin }}</p>
										<h3 class="product-name"><a href="tintuc/{{$km->id}}">{{$km->tieude,0,100}}</a></h3>
										<a class="product-detail">
											{{ mb_substr($km->mota,0,270,'UTF-8').'...' }}
										</a>
									</div>
							</div>								
						</div>
					</div> 
					<hr>
					@endforeach

					 <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            {{$khuyenmai->links()}}
                        </div>
                    </div>
                    <!-- /.row -->
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