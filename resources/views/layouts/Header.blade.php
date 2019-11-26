<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="tel:19001560"><i class="fa fa-phone"></i> +1900-1560</a></li>
						<li><a href="mailto:sagophone@gmail.com"><i class="fa fa-envelope-o"></i> sagophone@gmail.com</a></li>
						<li><a target="_blank" href="https://goo.gl/maps/JLcSzPrHN7a2P8Kg8"><i class="fa fa-map-marker"></i> 180 Cao Lỗ, Quận 8</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VND </a></li>
						<li><a href="dangnhap"><i class="fa fa-user-o"></i> Đăng Nhập </a></li>
						<li><a href="dangky"><i class="fa fa-user-o"></i> Đăng Ký </a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="trangchu" class="logo" style="font-size: 35pt;color: white">
									Sagophone
								</a>
							</div>
						</div>
						<!-- /LOGO -->
					
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								@if(count($errors)>0)
		                            <div class="alert alert-danger">
		                                @foreach($errors->all() as $err)
		                                    {{$err}}<br>
		                                @endforeach
		                            </div>
		                        @endif

		                        @if(session('thongbao'))
		                            <div class="alert alert-success">
		                                {{session('thongbao')}}
		                            </div>
		                        @endif
								<form action="timkiem" role="search" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<select class="input-select">
										<option value="1" selected="selected">Sản Phẩm</option>
										<option value="2">Tin Tức</option>
									</select>
									
										<input class="input" name="keyword" placeholder="Tìm kiếm tại đây">
									<button type="submit" class="search-btn">Tìm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								{{-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div> --}}
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a href="{{route('get.list.shopping.cart')}}" class="dropdown-toggle" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ Hàng</span>
										<div class="qty">{{Cart::count()}}</div>
									</a>
									{{-- <div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div> --}}
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
<!-- /HEADER -->


