<title>Cửa Hàng</title>
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
						<li class="active"><a href="cuahang">Cửa Hàng</a></li>									
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
							<li class="active"><a href="cuahang">Cửa Hàng</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

<!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                
                   

                <!-- Hero Add -->
                <div class="col-3 col-lg-15 text-center" style="padding-left: 100px; font-size: 20px; font-weight: bolder;">
                    <div class="hero-add">

                        &nbsp;&nbsp;
                        @foreach($banner as $bn)
                            @if(count($bn->danhsachbanner) > 0)
                                <a class="{{Request::get('id_banner') == $bn->id ? 'btn btn-success btn-lg active' : ''}}" href="{{ request()->fullUrlWithQuery(['id_banner' => $bn->id]) }}" class="product-category" style="font-size: 20px; font-weight: bolder; border: dotted; color: black">{{$bn->tenbanner}}</a>
                            @endif
                            &nbsp;&nbsp;
                        @endforeach
                    </div>
                </div>
            
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
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
								<h3 class="aside-title"><a href="cuahang" style="font-weight: bolder;">Danh Mục</a></h3>						
							@foreach($nhomsanpham as $nsp)
							<div class="checkbox-filter">							
								<div class="">
									<label>
										<a class="{{Request::get('id_nhom') == $nsp->id? 'btn btn-info' : ''}}" href="{{ request()->fullUrlWithQuery(['id_nhom' => $nsp->id]) }}"style="font-size: 15px; font-weight: bolder; color: black">
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
							<div class="store-filter" style="text-align: left;">

								<form class="tree-most" id="form_order1" method="GET">
								<div class="store-sort col-lg-3">
										<a>Thương Hiệu</a>			
											<select name="grand" class="input-select1">
												<option class="{{Request::get('grand') == "" ? 'selected' : ''}}" {{Request::get('grand') == "" ? "selected = 'selected'" : ""}}  value="">click chọn...</option>
												@foreach($thuonghieu as $th)
													<option class="{{Request::get('grand') == $th->id ? 'selected' : ''}}" {{Request::get('grand') == $th->id ? "selected = 'selected'" : ""}} value="{{ $th->id }}">{{ $th->tenhang }}</option>
												@endforeach
											</select>	
									</label>
								
								</div>
								</form>
								<form class="tree-most" id="form_order2" method="GET">
								<div class="store-sort col-lg-3">
										<a>ROM</a>(Red Only Memory)			
											<select name="rom" class="input-select2">
												<option class="{{Request::get('rom') == "" ? 'selected' : ''}}" {{Request::get('rom') == "" ? "selected = 'selected'" : ""}}  value="">click chọn...</option>
												@foreach($rom as $r)
													<option class="{{Request::get('rom') == $r->rom ? 'selected' : ''}}" {{Request::get('rom') == $r->rom ? "selected = 'selected'" : ""}} value="{{ $r->rom }}">{{ $r->rom }}GB</option>
												@endforeach
											</select>		
									</label>
								
								</div>
								</form>


								<form class="tree-most" id="form_order3" method="GET">
								<div class="store-sort col-lg-3">
										<a>Khoảng Giá</a>  			
											<select name="price" class="input-select3">
												<option class="{{Request::get('price') == "" ? 'selected' : ''}}" {{Request::get('price') == "" ? "selected = 'selected'" : ""}}  value="">click chọn...</option>
												@foreach($khoanggia as $kg)
													<option class="{{Request::get('price') == $kg->id ? 'selected' : ''}}" {{Request::get('price') == $kg->id ? "selected = 'selected'" : ""}} value="{{ $kg->id }}">{{ $kg->khoanggia }}</option>
												@endforeach
											</select>	
									</label>
								
								</div>
								</form>

								<form class="tree-most text-right" id="form_order4" method="GET">
								<div class="store-sort col-lg-3">
										<a href="cuahang" class="btn btn-primary">Reset bộ lọc</a>
								</div>
								</form>
							
							
						</div>
							<!-- /store top filter -->
							<!-- store top filter -->
							
							<!-- /store top filter -->
						
						<!-- store products -->
						<div class="row">
							<!-- product -->
								@foreach($sanpham as $sp)
								<div class="col-md-4 col-xs-5">
									<div class="product" style="height: 415px;margin-bottom: 50px ">
										<div class="product-img">
											<a href="chitiet/{{$sp->id}}">
												<img width="260px" height="250px" src="./upload/imgSanPham/{{$sp->hinhsp}}" alt="">
											</a>
											<div class="product-label">	
												@if(getBanner($sp->id) != null)
													@if(getBanner($sp->id) == 3)
														@if(getBanner2($sp->id) == 4)				
															<span class="new">NEW</span>
															<span class="sale">HOT</span>
														@else
															<span class="new">NEW</span>
														@endif
													@elseif(getBanner($sp->id) == 2)
														@if(getBanner2($sp->id) == 4)				
															<span class="sale">-{{ getPhanTram($sp->id) }}%</span>
															<span class="sale">HOT</span>
														@else
															<span class="sale">-{{ getPhanTram($sp->id) }}%</span>
														@endif
													@elseif(getBanner($sp->id) == 4)
														@if(getBanner2($sp->id) == 3)	
															<span class="sale">HOT</span>			
															<span class="new">NEW</span>
														@elseif(getBanner2($sp->id) == 2)
															<span class="sale">HOT</span>
															<span class="sale">-{{ getPhanTram($sp->id) }}%</span>
														@else
															<span class="sale">HOT</span>
														@endif
													@endif
												@endif
											</div>									
										</div>
										<div class="product-body">
											<p class="product-category">{{$sp->tenhang}}</p>
											<h3 class="product-name"><a style="white-space: nowrap;font-size: 12px" href="chitiet/{{$sp->id}}">{{$sp->tensp}} {{ $sp->mau }}</a></h3>
											<h4 class="product-price">
												@if(getPhanTram($sp->id) != null)
													<del class="product-old-price">{{number_format($sp->gia,0,',','.')}}</del>{{number_format($sp->gia * (100 - getPhanTram($sp->id)) / 100,0,',','.')}}VND
													@else
														{{number_format($sp->gia,0,',','.')}}VND
												@endif
											</h4>
											<?php
												$star = round((avgStarSanPham($sp->id)),2);
												$starnguyen = floor(avgStarSanPham($sp->id));
											?>
												<div class="review-rating" style="height: 10px; margin-bottom: 5px">
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
														<a style="font-size: 10px">(Chưa có đánh giá)</a>
													@endif
												</div>				
											<div class="product-btns">
												<button class="quick-view" onclick="window.location.href = 'chitiet/{{$sp->id}}';"><i class="fa fa-eye"></i><span class="tooltipp">Xem chi tiết</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" onclick="window.location.href = '{{route('add.shopping.cart',$sp->id)}}';"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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
							{{ $sanpham->appends(request()->query())->links() }}
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
 			$('.input-select1').change(function(){
 				$("#form_order1").submit();
 				$('.input-select1').val();
 			});
 			$('.input-select2').change(function(){
 				$("#form_order2").submit();
 				$('.input-select2').val();
 			});
 			$('.input-select3').change(function(){
 				$("#form_order3").submit();
 				$('.input-select3').val();
 			});
 			$('.input-select4').change(function(){
 				$("#form_order4").submit();
 				$('.input-select4').val();
 			});
 		});
    </script>
@endsection
