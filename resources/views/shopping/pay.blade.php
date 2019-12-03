<title>Xác Nhận Thanh Toán</title>
@extends('layouts.index')

@section('content')
	<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
{{--                     <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div> --}}
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Đơn Hàng <div class="pull-right"><small><a class="afix-1" href="{{route('get.list.shopping.cart')}}">Chỉnh sửa giỏ hàng</a></small></div>
                        </div>
                        <div class="panel-body">
                        	@foreach($products as $sanpham)

	                            <div class="form-group">
	                                <div class="col-sm-3 col-xs-3">
	                                    <img class="img-responsive" width="100px" height="70px" src="upload/imgSanPham/{{($sanpham->options->avatar)}}" />
	                                </div>
	                                <div class="col-sm-6 col-xs-6">
	                                    <div class="col-xs-12">{{$sanpham->name}} {{$sanpham->options->color}}</div>
	                                    <div class="col-xs-12"><small>Số lượng x <span>{{$sanpham->qty}}</span></small></div>
	                                </div>
	                                <div class="col-sm-3 col-xs-3 text-right">
	                                    <h6>{{number_format($sanpham->qty * $sanpham->price,0,',','.')}} <span>VND</span> </h6>
	                                </div>
	                            </div>
	                            <div class="form-group"><hr /></div>
	                            
                            @endforeach
                            <div class="form-group">
	                                <div class="col-xs-12">
	                                    <strong><h4>Tổng Tiền</h4></strong>
	                                    <div class="pull-right">
	                                    	<h3><span> {{Cart::subtotal()}} </span><span>VND</span></h3>
	                                    </div>
	                                </div>
	                        </div>
	                        <hr />
	                        <div class="form-group">
                                <div class="col-md-12">
                                    @if(Cart::count() == 0)
									   <button type="submit" class="btn btn-success" disabled="">Xác Nhận</button>
                                    @else
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
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
                                <div class="col-md-12"><strong>Tên Người Nhận</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa Chỉ Người Nhận</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số Điện Thoại Người Nhận</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi Chú</strong></div>
                                <div class="col-md-12">
                                    <textarea name="note" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa Chỉ Email Đặt Hàng</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{Auth::user()->email}}" disabled="" /></div>
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