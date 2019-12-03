@extends('layouts.index')

@section('content')
<br>
	<div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading"><h3>Đăng ký tài khoản</h3></div>
				  	<div class="panel-body">
				  		{{-- @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif --}}

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
				    	<form action="dangky" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Tên đăng nhập</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên người dùng" name="Ten" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Nhập email" name="Email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>								
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="againPassword" aria-describedby="basic-addon1" placeholder="Nhập lại mật khẩu">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
@endsection