<title>Giỏ Hàng</title>
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
							<li class="active"><a href="shopping/cart">Giỏ Hàng</a></li>
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
				<a style="text-align: center;"><h3> Giỏ Hàng Của Bạn <i class="fa fa-shopping-cart"></i> </h3></a><br>
				<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">STT</th>
				      <th scope="col">Tên Sản Phẩm</th>
				      <th scope="col">Hình Ảnh</th>
				      <th scope="col">Số Lượng</th>
				      <th scope="col">Màu</th>
				      <th scope="col">Giá</th>
				      <th scope="col">Thành Tiền</th>
				      <th scope="col">Thao Tác</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1 ?>
				  	@foreach($products as $pds)
					    <tr>
					    <th scope="row">#{{$i}}</th>
					      <th scope="row"><a href="#">{{$pds->name}}</a></th>
					      <td><img style="width: 120px; height: 120px" src="upload/imgSanPham/{{$pds->options->avatar}}"></td>
					      <td>
							<form action="shopping/update/{{$pds->rowId}}" method="POST" id="form_update">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="number" value="{{$pds->qty}}" name="qty" id="qty" min="1">
								<input type="hidden" value="{{$pds->rowId}}" name="rowId">
								<i class="fa fa-pencil"></i>
					      	</form>
					      	
					      </td>
					      <td>{{$pds->options->color}}</td>
					      <td>{{number_format($pds->price,0,',','.')}} VND</td>
					      <td>{{number_format($pds->qty * $pds->price,0,',','.')}} VND</td>
					      <td>		    
					      	<a href="{{route('delete.cart.item',$pds->rowId)}}"><i class="fa fa-trash-o"></i>Xóa</a>
					      </td>
						
					    </tr>
					<?php $i++ ?>
				    @endforeach
				  </tbody>
				</table>
				@if(Auth::user() != null)
					<h4 class="pull-right">TỔNG TIỀN THANH TOÁN : {{Cart::subtotal()}}<a href="{{route('pay.cart')}}" class="btn-success btn" class="pull-right">THANH TOÁN</a></h4>
				@else
					<h4 class="pull-right">TỔNG TIỀN THANH TOÁN : {{Cart::subtotal()}}<a href="{{route('pages.dangnhap')}}" class="btn-success btn" class="pull-right" diable>THANH TOÁN</a></h4>
				@endif
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	
@endsection
@section('script')
    <script>
 		$(function(){
 			$('#qty').change(function(){
 				$("#form_update").submit();
 				$('#qty').val();
 			});
 		});
    </script>
@endsection