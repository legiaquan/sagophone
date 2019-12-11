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
					<div class="w3-content w3-display-container">
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
				<!-- row -->
				<div class="row">
					
					<!-- shop -->
					<a href="cuahang?grand={{$apple->id}}">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/{{ $apple->hinhsp }}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{ $apple->hangdt->tenhang }}<br>Collection</h3>
								<a href="cuahang?grand={{$apple->id}}" class="cta-btn">Đến Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					</a>
					<!-- /shop -->
					<!-- shop -->
					<a href="cuahang?grand={{$samsung->id}}">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/{{ $samsung->hinhsp }}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{ $samsung->hangdt->tenhang }}<br>Collection</h3>
								<a href="cuahang?grand={{$samsung->id}}" class="cta-btn">Đến Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					</a>
					<!-- /shop -->
					<!-- shop -->
					<a href="cuahang?grand={{$nokia->id}}">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="250px" height="300px" src="upload/imgSanPham/{{ $nokia->hinhsp }}" alt="">
							</div>
							<div class="shop-body">
								<h3>{{ $nokia->hangdt->tenhang }}<br>Collection</h3>
								<a href="cuahang?grand={{$nokia->id}}" class="cta-btn">Đến Ngay<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					</a>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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
													@if(getBanner2($spm->id) == 4)				
															<span class="new">NEW</span>
															<span class="sale">HOT</span>
													@else
														<span class="new">NEW</span>
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
												<div class="product-btns">
												<button class="quick-view" onclick="window.location.href = 'chitiet/{{$spm->id}}';"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
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

		@if($bannernew->trangthai =='show')
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
									<div class="products-slick" data-nav="#slick-nav-3">
										@foreach($sanphambanchay as $spm)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="chitiet/{{$spm->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$spm->hinhchitiet}}" alt="">
												</a>
												
												<div class="product-label">											
													@if(getBanner($spm->id) == 3)
														<span class="sale">HOT</span>				
														<span class="new">NEW</span>
													@else
														<span class="sale">HOT</span>
													@endif					
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$spm->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$spm->id}}">{{$spm->tensp}} {{$spm->mau }}</a></h3>
												<h4 class="product-price">
													@if(getPhanTram($spm->id) != null)
													<del class="product-old-price">{{number_format($spm->gia,0,',','.')}}</del>{{number_format($spm->gia * (100 - getPhanTram($spm->id)) / 100,0,',','.')}}VND
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
												<div class="product-btns">
												<button class="quick-view" onclick="window.location.href = 'chitiet/{{$spm->id}}';"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
											</div>											
											</div>

											<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$spm->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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
					<!-- Products tab & slick -->
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
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Điện Thoại</h3>
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
									<div class="products-slick" data-nav="#slick-nav-4">
										@foreach($dienthoai as $dt)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="chitiet/{{$dt->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$dt->hinhchitiet}}" alt="">
												</a>
												
												<div class="product-label">											
													@if(getBanner($dt->id) != null)
														@if(getBanner($dt->id) == 3)
															@if(getBanner2($dt->id) == 4)				
																<span class="new">NEW</span>
																<span class="sale">HOT</span>
															@else
																<span class="new">NEW</span>
															@endif
														@elseif(getBanner($dt->id) == 2)
															@if(getBanner2($dt->id) == 4)				
																<span class="sale">-{{ getPhanTram($dt->id) }}%</span>
																<span class="sale">HOT</span>
															@else
																<span class="sale">-{{ getPhanTram($dt->id) }}%</span>
															@endif
														@elseif(getBanner($dt->id) == 4)
															@if(getBanner2($dt->id) == 3)	
																<span class="sale">HOT</span>			
																<span class="new">NEW</span>
															@elseif(getBanner2($dt->id) == 2)
																<span class="sale">HOT</span>
																<span class="sale">-{{ getPhanTram($dt->id) }}%</span>
															@else
																<span class="sale">HOT</span>
															@endif
														@endif
												@endif					
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$dt->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$dt->id}}">{{$dt->tensp}} {{$dt->mau }}</a></h3>
												<h4 class="product-price">
													@if(getPhanTram($dt->id) != null)
													<del class="product-old-price">{{number_format($dt->gia,0,',','.')}}</del>{{number_format($dt->gia * (100 - getPhanTram($dt->id)) / 100,0,',','.')}}VND
													@else
														{{number_format($dt->gia,0,',','.')}}VND
												@endif
												</h4>
												<?php
														$star = round((avgStarSanPham($dt->id)),2);
														$starnguyen = floor(avgStarSanPham($dt->id));
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
												<div class="product-btns">
												<button class="quick-view" onclick="window.location.href = 'chitiet/{{$dt->id}}';"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
											</div>											
											</div>

											<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$dt->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
										</div>
										
										</div>
										<!-- /product -->
										@endforeach

										
										
									</div>
								
									<div id="slick-nav-4" class="products-slick-nav"></div>
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
	<!-- SECTION -->
	<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Phụ Kiện</h3>
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
									<div class="products-slick" data-nav="#slick-nav-5">
										@foreach($phukien as $dt)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="chitiet/{{$dt->id}}"> 
													<img width="250px" height="250px" src="./upload/imgSanPham/{{$dt->hinhchitiet}}" alt="">
												</a>
												
												<div class="product-label">											
													@if(getBanner($dt->id) != null)
														@if(getBanner($dt->id) == 3)
															@if(getBanner2($dt->id) == 4)				
																<span class="new">NEW</span>
																<span class="sale">HOT</span>
															@else
																<span class="new">NEW</span>
															@endif
														@elseif(getBanner($dt->id) == 2)
															@if(getBanner2($dt->id) == 4)				
																<span class="sale">-{{ getPhanTram($dt->id) }}%</span>
																<span class="sale">HOT</span>
															@else
																<span class="sale">-{{ getPhanTram($dt->id) }}%</span>
															@endif
														@elseif(getBanner($dt->id) == 4)
															@if(getBanner2($dt->id) == 3)	
																<span class="sale">HOT</span>			
																<span class="new">NEW</span>
															@elseif(getBanner2($dt->id) == 2)
																<span class="sale">HOT</span>
																<span class="sale">-{{ getPhanTram($dt->id) }}%</span>
															@else
																<span class="sale">HOT</span>
															@endif
														@endif
												@endif					
												</div>
											</div>
											
											<div class="product-body">
												<p class="product-category">{{$dt->tenhang}}</p>
												<h3 class="product-name"><a href="chitiet/{{$dt->id}}">{{$dt->tensp}} {{$dt->mau }}</a></h3>
												<h4 class="product-price">
													@if(getPhanTram($dt->id) != null)
													<del class="product-old-price">{{number_format($dt->gia,0,',','.')}}</del>{{number_format($dt->gia * (100 - getPhanTram($dt->id)) / 100,0,',','.')}}VND
													@else
														{{number_format($dt->gia,0,',','.')}}VND
												@endif
												</h4>
												<?php
														$star = round((avgStarSanPham($dt->id)),2);
														$starnguyen = floor(avgStarSanPham($dt->id));
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
												<div class="product-btns">
												<button class="quick-view" onclick="window.location.href = 'chitiet/{{$dt->id}}';"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
											</div>											
											</div>

											<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$dt->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
										</div>
										
										</div>
										<!-- /product -->
										@endforeach

										
										
									</div>
								
									<div id="slick-nav-5" class="products-slick-nav"></div>
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
	<br>
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
					@foreach($tintuc as $tt)
					<div>
						<div>
							<div class="product-widget">
									<div class="product-img">
										<a href="tintuc/{{$tt->id}}">
											<img src="upload/imgTinTuc/{{$tt->img}}" alt="" width="160px" height="110px">
										</a>		
									</div>
									<div class="product-body text-justify" style="margin-left: 100px">
										<p class="product-category"><a href="loaitin?id={{ $tt->id_loaitin }}"> {{ $tt->tenloaitin }}</a></p>
										<h3 class="product-name"><a href="tintuc/{{$tt->id}}">{{$tt->tieude,0,100}}</a></h3>
										<a class="product-detail" href="tintuc/{{$tt->id}}">
											{{ mb_substr($tt->mota,0,270,'UTF-8').'...' }}
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
                            {{$tintuc->links()}}
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