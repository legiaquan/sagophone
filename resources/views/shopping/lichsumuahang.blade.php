<title>Lịch Sử Mua Hàng</title>
@extends('layouts.index')	
@section('content')
	<div class="section">
			<!-- container -->
			<div class="container">
				<a style="text-align: center;"><h3><i class="fa fa-list-alt"></i>Lịch sử mua hàng</h3></a><br>
				<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">STT</th>
				      <th scope="col">Mã Đơn Hàng</th>
				      <th scope="col">Tên Người Nhận</th>
				      <th scope="col">Địa Chỉ Người Nhận</th>
				      <th scope="col">Số Điện Thoại</th>
				      <th scope="col">Tổng Tiền</th>
				      <th scope="col">Tình Trạng</th>
				      <th scope="col">Thao Tác</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1 ?>
				  	@foreach($donhang as $dh)
				
					    <tr>
					    	<th scope="row">#{{$i}}</th>
					    	<td>{{$dh->madh}}</td>
							<td>{{$dh->tennguoinhan}}</td>
							<td>{{$dh->diachinguoinhan}}</td>
							<td>{{$dh->sdtnguoinhan}}</td>
							<td>{{$dh->tongtien}}</td>
							<td>
								@if($dh->tinhtrang == "apending")
									<a class="btn btn-warning">Đang xử lý</a>
					      			<a href="#"><i class="fa fa-trash-o"></i>Hủy</a>
								@elseif($dh->tinhtrang == "confirmed")
									<a class="btn btn-primary">Đã Xác Nhận</a>
								@elseif($dh->tinhtrang == "delivery")
									<a class="btn btn-info">Đang vận chuyển</a>
								@elseif($dh->tinhtrang == "complete")
									<a class="btn btn-success">Đã Hoàn Thành</a>
								@else
									<a class="btn btn-default">Đã Hủy</a>
								@endif
							</td>
							<td>
								<a href="chitietdonhang/{{$dh->id}}"><i class="fa fa-spinner"></i>Chi tiết</a>
					      	</td>
					    </tr>
					<?php $i++ ?>
					@endforeach
				  </tbody>
				</table>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	
@endsection;