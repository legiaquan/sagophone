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
                            <li><a>Trang Chủ</a></li>
                            <li class="active"><a>Người Dùng</a></li>
                            <li class="active"><a>Lịch Sử Mua Hàng</a></li>
                            <li class="active"><a>Chi Tiết Đơn Hàng</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->
	<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row" style="height: 10px">
                </div>
                <div class="row">
                    <div style="display: table; margin: auto; height: 50px; text-align: center;">
                    	<h3>Trạng Thái Đơn Hàng <i class="fa fa-truck"> </i> 
                    		@if($tinhtrang == "cancel")
	                       	 	<span class="step step_complete"> <a class="btn btn-default" style="font-weight: bolder;">Đã Hủy</a> <span class="step_line "></span> <span class="step_line step_complete"> </span> </span>
                    		@endif
                    	</h3><br>
                    	@if($tinhtrang == "apending")
							<span class="step step_complete"> <a class="btn btn-warning" style="font-weight: bolder;">Đang Xử Lý</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-primary" style="opacity: 0.4;">Đã Xác Nhận</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-info" style="opacity: 0.4">Đang Vận Chuyển</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-success" style="opacity: 0.4">Đã Hoàn Thành</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
	                    @elseif($tinhtrang == "confirmed")
	                    	<span class="step step_complete"> <a class="btn btn-warning" style="opacity: 0.4;">Đang Xử Lý</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-primary" style="font-weight: bolder;">Đã Xác Nhận</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-info" style="opacity: 0.4">Đang Vận Chuyển</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-success" style="opacity: 0.4">Đã Hoàn Thành</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
	                    @elseif($tinhtrang == "delivery")
	                    	<span class="step step_complete"> <a class="btn btn-warning" style="opacity: 0.4;">Đang Xử Lý</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-primary" style="opacity: 0.4" >Đã Xác Nhận</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-info" style="font-weight: bolder;">Đang Vận Chuyển</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-success" style="opacity: 0.4">Đã Hoàn Thành</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
						 @elseif($tinhtrang == "complete")
	                    	<span class="step step_complete"> <a class="btn btn-warning" style="opacity: 0.4;">Đang Xử Lý</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-primary" style="opacity: 0.4">Đã Xác Nhận</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-info" style="opacity: 0.4">Đang Vận Chuyển</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-success" style="font-weight: bolder;">Đã Hoàn Thành</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <i class="fa fa-arrow-right"> </i> </span>

	                 
	                     @else
	                     	<span class="step step_complete"> <a class="btn btn-warning" style="opacity: 0.4;">Đang Xử Lý</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-primary" style="opacity: 0.4">Đã Xác Nhận</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-info" style="opacity: 0.4">Đang Vận Chuyển</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
	                        <span class="step step_complete"> <a class="btn btn-success" style="opacity: 0.4">Đã Hoàn Thành</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <i class="fa fa-arrow-right"> </i> </span>
                    	@endif
                       {{--  <span class="step step_complete"> <a href="#" class="btn btn-warning">Đang Xử Lý</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> <i class="fa fa-arrow-right"> </i> </span> </span>
                        <span class="step step_complete"> <a href="#" class="btn btn-primary">Đã Xác Nhận</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
                        <span class="step step_complete"> <a href="#" class="btn btn-info">Đang Vận Chuyển</a> <span class="step_line step_complete"> </span> <span class="step_line backline">  <i class="fa fa-arrow-right"> </i> </span> </span>
                        <span class="step step_complete"> <a href="#" class="btn btn-success" style="opacity: 0.5">Đã Hoàn Thành</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <i class="fa fa-arrow-right"> </i> </span>
                        <span class="step step_complete"> <a href="#" class="btn btn-default">Đã Hủy</a> <span class="step_line "></span> <span class="step_line step_complete"> </span> </span>  --}}
                    </div>
                </div>
                <div class="row" style="height: 30px">
                   
                </div>
                </div>
            </div>   
            <div class="row cart-body">
                <form class="form-horizontal" method="POST" action="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                  
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Chi Tiết Đơn Hàng</h4>
                        </div>
                        <div class="panel-body">
                        		@foreach($chitietdonhang as $chitiet)        
		                            <div class="form-group">
		                                <div class="col-sm-3 col-xs-3">
		                                    <img class="img-responsive" width="100px" height="70px" src="upload/imgSanPham/{{$chitiet->chitietsanpham->sanpham->hinhsp}}" />
		                                </div>
		                                <div class="col-sm-6 col-xs-6">
		                                    <div class="col-xs-12">{{$chitiet->chitietsanpham->sanpham->tensp}} {{$chitiet->chitietsanpham->mau->mau}}</div>
		                                    <div class="col-xs-12"><small>Số lượng x <span>{{$chitiet->soluong}}</span></small></div>
		                                </div>
		                                <div class="col-sm-3 col-xs-3 text-right">
		                                	<?php 
                    							$getphantram = getPhanTram($chitiet->id_chitietsanpham);
                    						?>
		                                	@if($getphantram != null)
		                                    	<h6>{{number_format($chitiet->chitietsanpham->gia * (100 - $getphantram) / 100,0,',','.')}} <span>VND</span> </h6>
		                                    @else
												<h6>{{number_format($chitiet->chitietsanpham->gia,0,',','.')}} <span>VND</span> </h6>
		                                    @endif
		                                </div>
		                            </div>
	                            @endforeach
	                           	<div class="form-group"><hr /></div>
                            <div class="form-group">
	                                <div class="col-xs-12">
	                                    <strong><h4>Tổng Tiền</h4></strong>
	                                    <div class="pull-right">
	                                    	<h3><span> {{number_format($chitiet->giamua,0,',','.')}}VND</span></h3>
	                                    </div>
	                                </div>
	                        </div>
	                        <hr />
	                        <div class="form-group">
                                <div class="col-md-12" style="text-align: right;">
                                	@if($tinhtrang == "apending")
										<button type="submit" class="btn btn-danger" onclick="return confirm('Chọn OK để Hủy')">Hủy Đơn Hàng</button>
									@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3>Thông Tin Thanh Toán</h3></div>
	                        <div class="panel-body">
	                        	<div class="form-group">
	                                <div class="col-md-12"><strong>Mã Đơn Hàng</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="order" class="form-control" value="{{$chitiet->donhang->madh}}" disabled="" />
	                                </div>
	                            </div>
	                        	<div class="form-group">
	                                <div class="col-md-12"><strong>Tên Người Nhận</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="name" class="form-control" value="{{$chitiet->donhang->tennguoinhan}}" disabled="" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Địa Chỉ Người Nhận</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="address" class="form-control" value="{{$chitiet->donhang->diachinguoinhan}}" disabled="" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Số Điện Thoại Người Nhận</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="phone" class="form-control" value="{{$chitiet->donhang->sdtnguoinhan}}" disabled="" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Ghi Chú</strong></div>
	                                <div class="col-md-12">
	                                    <textarea name="note" cols="30" rows="5" class="form-control" disabled="">{{$chitiet->donhang->ghichu}}</textarea>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Địa Chỉ Email Đặt Hàng</strong></div>
	                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{Auth::user()->email}}" disabled="" /></div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Số Điện Thoại Đặt Hàng</strong></div>
	                                <div class="col-md-12"><input type="text" name="phone_address" class="form-control" value="{{Auth::user()->sdt}}" disabled="" /></div>
	                            </div>
	                          
	                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->

                </div>
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
@endsection