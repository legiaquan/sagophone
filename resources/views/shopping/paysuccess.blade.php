@extends('layouts.index')

@section('content')
	<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
	        <br><br> <h2 style="color:#0fad00">Xác Nhận Thành Công</h2>
	        <i class="fa fa-check-circle" style="font-size: 50px"></i><br>
	        <h3>Chúc mừng {{Auth::user()->name}}!</h3>
	        <p style="font-size:20px;color:#5C5C5C;">Đơn hàng của bạn đã được duyệt! </p>
	        <p style="font-size:20px;color:#5C5C5C;">Bạn có thể theo dõi trạng thái đơn hàng của mình.</p>
	    	<br>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
	        <a href="trangchu" class="btn btn-primary">     Trang Chủ <i class="fa fa-undo"></i>     </a>
	        <a href="lichsumuahang" class="btn btn-info">    Lịch Sử Mua Hàng <i class="fa fa-list-alt"></i>     </a>
	    <br><br>
        </div>
	</div>
</div>
@endsection