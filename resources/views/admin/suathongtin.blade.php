@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Thông tin cá nhân</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Sửa</h4>
					<p class="mb-12"></p>
					<a href="admin/trang-chu.html" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Trang chủ</span></a>
				</div>
				<div class="card-body">
					<div class="px-3">
						@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
						<form class="form" action="admin/suathongtin/{{ $nhanvien->id }}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
		                                <label>Username</label>
		                                <input class="form-control" name="txtUsername" value="{{ $nhanvien->username }}" disabled="" placeholder="Vui lòng nhập username" />
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Họ tên</label>
		                                <input class="form-control" name="txtHoten" value="{{ $nhanvien->name }}" placeholder="Vui lòng nhập họ tên" />
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Email</label>
		                                <input class="form-control" name="txtEmail" value="{{ $nhanvien->email }}" placeholder="Vui lòng nhập email" />
		                            </div>
		                        </div>
								<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Địa chỉ</label>
		                                <input class="form-control" name="txtDiaChi" value="{{ $nhanvien->diachi }}" placeholder="Vui lòng nhập địa chỉ" />
		                            </div>
		                        </div>
		                    </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="number" name="txtSDT" value="{{ $nhanvien->sdt }}" value="0" placeholder="Vui lòng nhập số điện thoại" />
                            </div>
                            <input type="checkbox" name="changePass" id="changePass"/><label> Đổi mật khẩu</label>
                            <div class="row">
                            	
								<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Password</label>
		                                
                                		<input class="form-control txtPassword" type="password" name="txtPassword" disabled="" placeholder="Vui lòng nhập password" />
		                            </div>
		                        </div>
		                        <div class="col-md-6">
									<div class="form-group">
		                                <label>Nhập lại Password</label>
		                                <input class="form-control txtPassword" type="password" name="txtPasswordAgain" disabled="" placeholder="Vui lòng nhập password" />
                            		</div>
		                        </div>
		                    </div>
                            
							<div class="form-actions">
								<button type="reset" class="btn btn-raised btn-warning mr-1">
									<i class="ft-refresh-ccw"></i> Làm mới
								</button>							
								<button type="submit" class="btn btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Sửa
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
<!--form them end-->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#changePass").change(function(){
                if($(this).is(":checked"))
                {
                    $(".txtPassword").removeAttr('disabled');
                }
                else
                {
                    $(".txtPassword").attr('disabled','');
                }
            });
        });
    </script>
@endsection