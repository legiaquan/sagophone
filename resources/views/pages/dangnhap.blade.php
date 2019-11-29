@extends('layouts.index')

@section('content')
<br>
 <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				  	@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif	
				    	<form action="dangnhap" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			&nbsp;<label>Tên đăng nhập hoặc Email</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên đăng nhập hoặc Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			&nbsp;<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
@endsection