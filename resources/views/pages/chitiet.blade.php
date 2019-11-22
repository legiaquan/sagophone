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
							<li><a href="danhmuc/{{$chitiet->id_nhom}}/{{$chitiet->nhomsanpham->tennhom}}">{{$chitiet->nhomsanpham->tennhom}}</a></li>
							<li><a href="danhmuc/{{$chitiet->id_hangdt}}/{{$chitiet->nhomsanpham->tennhom}}/{{$chitiet->hangdt->tenhang}}">{{$chitiet->hangdt->tenhang}}</a></li>
							<li class="active"><a href="chitiet/{{$chitiet->id}}/{{$chitiet->tensp}}">{{$chitiet->tensp}}</a></li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>
							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>
							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>

							<div class="product-preview">
								<img src="upload/imgSanPham/{{$chitiet->hinhsp}}" alt="">
							</div>
							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$chitiet->tensp}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Đánh giá(s)</a>
							</div>
							<!-- Get giá -->
							<?php $getgiasp = getGiaMin($chitiet->id)?>
							<div>
								<h3 class="product-price">
									@foreach($getgiasp as $sp)
									{{$sp->gia}}
									<del class="product-old-price">{{$chitiet->gia * 0.5}}</del>
									@endforeach
								</h3>
								<span class="product-available">Còn Hàng</span>
							</div>
							
							
							<div class="product-options">	

								<label>
									Màu Sắc
									<select class="input-select">
										@foreach($getgiasp as $sp)
										<option value="{{$sp->id}}"> {{$sp->mau}}</option>
										@endforeach
									</select>
								</label>

							</div>
							
							<div>
								RAM :
								<label>
									{{$chitiet->ram}}GB
								</label>
								&nbsp
								ROM :
								<label>
									{{$chitiet->rom}}GB
								</label>
							</div>
							<br>
							<div>
								Màn Hình :
								<label>
									{{$chitiet->manhinh}}
								</label>
							</div>
							<br>
							<div>
								Hệ Điều Hành :
								<label>
									{{$chitiet->hedieuhanh}}
								</label>
							</div>
							<br>
							<div>
								CAM Trước :
								<label>
									{{$chitiet->camtruoc}}
								</label>
								&nbsp
								CAM Sau :
								<label>
									{{$chitiet->camsau}}
								</label>
							</div>
							<br>
							<div>
								CPU :
								<label>
									{{$chitiet->cpu}}
								</label>
								&nbsp
								Thẻ SIM :
								<label>
									{{$chitiet->thesim}}
								</label>								
							</div>
							<br>
							<div>
								Dung Lượng PIN :
								<label>
									{{$chitiet->dungluongpin}}
								</label>
							</div>
							<br>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
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
								<li><a data-toggle="tab" href="#tab2">Đánh Giá (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{$chitiet->mota}}</p>
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
											@foreach($chitiet->binhluan as $cmt)
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">{{$cmt->thanhvien->hoten}}</h5>
															<p class="date">{{$cmt->create_at}}</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
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
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
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
								<img src="upload/imgSanPham/{{$splq->hinhsp}}" alt="">
								@foreach($splq->dsbanner as $sqlqbanner)
								<div class="product-label">
									@if($sqlqbanner->id_banner == 2)
										<span class="sale">-30%</span>
									@elseif($sqlqbanner->id_banner == 3)
										<span class="new">NEW</span>
									@else
										<span class="new">HOT</span>
									@endif
								</div>
								@endforeach
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
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
		