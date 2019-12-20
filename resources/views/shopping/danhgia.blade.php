<title>Đánh Giá</title>
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
							<li><a href="trangchu">Trang Chủ</a></li>
							<li><a href="lichsumuahang">Lịch Sử Mua Hàng</a></li>
							<li><a href="chitietdonhang/{{ $chitiet->id_donhang }}">Chi Tiết Đơn Hàng {{$chitiet->donhang->madh}}</a></li>
							<li class="active"><a href="danhgia/{{ $chitiet->id }}">Đánh Giá Sản Phảm {{ $chitiet->chitietsanpham->sanpham->tensp }} {{$chitiet->chitietsanpham->mau->mau }}</a></li>
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
						<div id="review-form">
							@if($chitiet->star == null && $chitiet->nhanxet == null)
								<form class="review-form" action="danhgia/{{$chitiet->id}}" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<textarea class="input" name="danhgia" placeholder="Nhận xét của bạn ..."></textarea>
									<div class="input-rating">
										<span>Đánh giá của bạn : </span>
										<div class="stars">
											<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
											<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
											<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
											<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
											<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
										</div>
									</div>
									<button class="primary-btn">Đánh Giá</button>
								</form>
							@else
								<form class="review-form" action="danhgia/{{$chitiet->id}}" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<textarea class="input" name="danhgia" placeholder="Nhận xét gần đây ({{ $chitiet->nhanxet }})"></textarea>
									<div class="input-rating">
										<span>Đánh giá gần đây ({{$chitiet->star}} <i class="fa fa-star checked"></i>) : </span>
										<div class="stars">
											<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
											<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
											<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
											<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
											<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
										</div>
									</div>
									<button class="primary-btn">Cập Nhật</button>
								</form>
							@endif
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2 col-md-pull-5">
						
							<div class="product-preview">
								<a href="chitiet/{{ $chitiet->id_chitietsanpham }}"><img src="upload/imgSanPham/{{$chitiet->chitietsanpham->hinhchitiet}}" alt=""></a>
							</div>
							<div class="product-preview">
								<br>
							</div>
							<div class="product-preview" style="text-align: center">
								<a href="chitiet/{{ $chitiet->id_chitietsanpham }}"><h4>{{ $chitiet->chitietsanpham->sanpham->tensp }}</h4></a>
							</div>

							<div class="product-preview" style="text-align: center">
								<h5>Màu : {{$chitiet->chitietsanpham->mau->mau }}</h5> 
							</div>
							<?php
								$star = round((avgStarSanPham($chitiet->id_chitietsanpham)),1);
								$starnguyen = floor(avgStarSanPham($chitiet->id_chitietsanpham));
							?>
							<div class="product-preview" style="text-align: center">
								@if($star != null)
									<div class="review-rating">
										@for($i=0;$i<$starnguyen;$i++)
											@if($i < $star)
												<i class="fa fa-star checked"></i>
											@endif
										@endfor
										@if($star >= ($starnguyen + 0.5))
											<i class="fa fa-star-half-o checked"></i>
										@endif
									</div>
									@if(avgStarSanPham($chitiet->id_chitietsanpham) != null)
											({{ $star }} / 5 <i class="fa fa-star checked"></i>)
									@endif
								@else
									<a style="font-size: 12px">(Chưa có đánh giá)</a>
								@endif
							</div>

					</div>
					<!-- Reviews -->
					<a><h3>Tất Cả Đánh Giá ({{ $sodanhgia }})</h3></a><br>
					<div class="col-md-5">
						<div id="reviews">
							<ul class="reviews">
								@foreach($danhgia as $ct)
								<li>
									
									<div class="review-heading">									
											<h5 class="name">{{ $ct->donhang->thanhvien->name }}</h5>
											<p class="date">{{ $ct->created_at }}</p>
												<div class="review-rating">
												@if($ct->star != null)
													@for($i=0;$i<$ct->star;$i++)
														<i class="fa fa-star"></i>
													@endfor
												@else
													<div class="review-body">
														<p>(Chưa có đánh giá!)</p>
													</div>
												@endif
												</div>
									</div>
									<div class="review-body">
										<p>{{$ct->nhanxet}}</p>
									</div>
							
								</li>
								<hr/>
								@endforeach					
							</ul>
							<ul>
								{{ $danhgia->links() }}
							</ul>
						</div>
					</div>
					<!-- /Reviews -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection