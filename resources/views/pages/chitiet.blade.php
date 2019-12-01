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
						<li><a href="danhmuc">Danh Mục</a></li>
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


<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>
							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->sanpham->hinhsp}}" alt="">
							</div>
							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<!-- Get giá -->
							<?php 
								$getgiasp = getGiaMin($chitiet->id_sanpham);
								$getphantram = getPhanTram($chitiet->id);
								$getdanhgia = getNhanXet($chitiet->id);
								$dembinhluan = demBinhLuan($chitiet->id_sanpham);
							?>
							<h2 class="product-name">{{$chitiet->sanpham->tensp}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">{{count($getdanhgia)}} Đánh giá(s)</a>
							</div>
							
							<div>
								<h3 class="product-price">
									{{-- @if(Request::get('id_mau')!=null)					
										{{$chitiet->gia}}
										<del class="product-old-price">{{$chitiet->gia * $chitiet->phantramkhuyenmai}}</del>
									@else
										{{$chitiet->gia}}
										@if($chitiet->phantramkhuyenmai != null)
											<del class="product-old-price">{{$chitiet->id * $chitiet->phantramkhuyenmai}}</del>
										@endif
									@endif --}}
									
									@if($getphantram != null)
										{{$chitiet->gia * (100 - $getphantram) / 100}}
										<del class="product-old-price">{{$chitiet->gia}}</del>
									@else
										{{$chitiet->gia}}
									@endif
								</h3>
								<span class="product-available">Còn Hàng</span>
							</div>
							
							<div>	
								 
									<label>
										Màu Sắc :
									</label>
									<form action="chitiet/{{$chitiet->id}}" method="GET" class="tree-most" id="form_color">
										<select name="id_mau" class="input-select">
											@foreach($getgiasp as $sp)
												<option value="{{$sp->id}}"
													@if($chitiet->id_mau == $sp->id)
														{{'selected="selected"'}}
													@endif
													>{{$sp->mau}}</option>
											@endforeach
										</select>
									</form>
									{{-- <div class="linked-products f-left">
										<div class="linked">
											@foreach($getgiasp as $sp)
												<a class="item i-18373 active" href="chitiet/{{$chitiet->id}}/">
													<span><i class="iconmobile-opt"></i>{{$sp->mau}}</span>
													<strong>{{$sp->gia}}</strong>
												</a>
												&nbsp;			
											@endforeach
										</div>
									</div>
								 --}}

							</div>
							<br>
							
							<div>
								
								<label>
									RAM :
								</label>
								{{$chitiet->sanpham->ram}}GB
								&nbsp
								
								<label>
									ROM :
									
								</label>
								{{$chitiet->sanpham->rom}}GB
							</div>
							<br>
							<div>
								
								<label>
									Màn Hình :	
								</label>
								{{$chitiet->sanpham->manhinh}}
							</div>
							<br>
							<div>
								
								<label>
									Hệ Điều Hành :	
								</label>
								{{$chitiet->sanpham->hedieuhanh}}
							</div>
							<br>
							<div>
								
								<label>
									CAM Trước :
								</label>
								{{$chitiet->sanpham->camtruoc}}
								&nbsp
								
								<label>
									CAM Sau :
								</label>
								{{$chitiet->sanpham->camsau}}
							</div>
							<br>
							<div>
								
								<label>
									CPU :
								</label>
								{{$chitiet->sanpham->cpu}}
								&nbsp													
							</div>
							<br>
							<div>
								<label>
									Thẻ SIM :	
								</label>
								{{$chitiet->sanpham->thesim}}
							</div>
							<br>
							<div>
								
								<label>
									Dung Lượng PIN :
								</label>
								{{$chitiet->sanpham->dungluongpin}}
							</div>
							<br>
							<div class="add-to-cart">
								<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$chitiet->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
							</div>
						</div>
					</div>
					<!-- /Product details -->
					
					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô Tả</a></li>				
								<li><a data-toggle="tab" href="#tab2">Bình Luận ({{$dembinhluan}})</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{!!$chitiet->sanpham->mota!!}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

					
								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											@foreach($chitiet->sanpham->binhluan as $cmt)
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">{{$cmt->thanhvien->name}}</h5>
															<p class="date">{{$cmt->created_at}}</p>
															
														</div>
														<div class="review-body">
															<p>{{$cmt->binhluan}}</p>
														</div>
													</li>
													
												</ul>
												
											</div>
										
											@endforeach
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										@if(Auth::user() != null)		
										<div class="col-md-3">	
											<h4><span class="glyphicon glyphicon-pencil"></span>&nbsp;...Bình luận</h4>

											@if(session('thongbao'))
												<div class="alert alert-success">
													{{session('thongbao')}}
												</div>
											@endif
										
											<div id="review-form">
												<form action="binhluan/{{$chitiet->id}}" class="review-form" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}">
													{{-- <input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email"> --}}
													<textarea name="binhluan" class="input" placeholder="Bình luận của bạn"></textarea>
													{{-- <div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div> --}}
													<button class="primary-btn">Gửi</button>
												</form>
											</div>
										</div>
										@else
											<div class="col-md-3">	
											<h4><span class="glyphicon glyphicon-pencil"></span>&nbsp;...Bình luận</h4>

											@if(session('thongbao'))
												<div class="alert alert-success">
													{{session('thongbao')}}
												</div>
											@endif
										
											<div id="review-form">
												<form action="binhluan/{{$chitiet->id}}" class="review-form" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}">
													
													<textarea name="binhluan" class="input" placeholder="(Đăng nhập để bình luận!)" disabled=""></textarea>
													
													<button class="primary-btn" disabled="">Gửi</button>
												</form>
											</div>
										</div>
										@endif
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab2  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->

			</div>
			<!-- /container -->
		</div>
<!-- /SECTION -->

<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Sản Phẩm Liên Quan</h3>
						</div>
					</div>

					<!-- product -->
					@foreach($sanphamlienquan as $splq)
					<div class="col-md-3 col-xs-6">
						
						<div class="product">
							
							<div class="product-img">
								<a href="chitiet/{{$splq->id_sanpham}}/{{$splq->id}}">				
									<img src="upload/imgSanPham/{{$splq->hinhsp}}" alt="" width="250px" height="250px"> 
								</a>
							
		
								
								<div class="product-label">
									@if($splq->id_banner == 2)
										<span class="sale">-30%</span>
									@elseif($splq->id_banner == 3)
										<span class="new">NEW</span>
									@else
										<span class="new">HOT</span>
									@endif
								</div>
							
							</div>
							<div class="product-body">
								<p class="product-category">{{$splq->tenhang}}</p>
								<h3 class="product-name"><a href="chitiet/{{$splq->id_sanpham}}/{{$splq->id}}">{{$splq->tensp}}</a></h3>
								<h4 class="product-price">{{$splq->gia}}</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">								
									<button class="quick-view"><a href="chitiet/{{$splq->id_sanpham}}/{{$splq->id}}"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></a></button>
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
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<!-- /Section -->
@endsection

@section('script')
    <script>
 		$(function(){
 			$('.input-select').change(function(){
 				$("#form_color").submit();
 				$('.input-select').val();
 			});
 		});
    </script>
@endsection
		