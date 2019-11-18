@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Nhân viên</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Thêm</h4>
					<p class="mb-12"></p>
					<a href="admin/nhanvien/danhsach" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Danh sách</span></a>
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
						<form class="form" action="admin/nhanvien/them" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
		                                <label>Username</label>
		                                <input class="form-control" name="txtUsername" placeholder="Vui lòng nhập username" />
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Họ tên</label>
		                                <input class="form-control" name="txtHoten" placeholder="Vui lòng nhập họ tên" />
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Email</label>
		                                <input class="form-control" name="txtEmail" placeholder="Vui lòng nhập email" />
		                            </div>
		                        </div>
								<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Địa chỉ</label>
		                                <input class="form-control" name="txtDiaChi" placeholder="Vui lòng nhập địa chỉ" />
		                            </div>
		                        </div>
		                    </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="number" name="txtSDT" value="0" placeholder="Vui lòng nhập số điện thoại" />
                            </div>
                            <div class="row">
								<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Password</label>
		                                <input class="form-control" type="password" name="txtPassword" placeholder="Vui lòng nhập password" />
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Nhập lại Password</label>
		                                <input class="form-control" type="password" name="txtPasswordAgain" placeholder="Vui lòng nhập password" />
		                            </div>
		                        </div>
		                    </div>
                            <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Level</label>
		                                <select class="form-control" name="Level">
		                                	@foreach($level as $row)
		                                    <option value="{{ $row->id }}">{{ $row->tenlevel }}</option>
		                                    @endforeach
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>Trạng thái</label>
		                                <select class="form-control" name="TrangThai">
		                                    <option value="0">Banned</option>
		                                    <option value="1" selected >Active</option>
		                                </select>
		                            </div>
		                        </div>
		                    </div>
							<div class="form-actions">
								<button type="reset" class="btn btn-raised btn-warning mr-1">
									<i class="ft-refresh-ccw"></i> Làm mới
								</button>							
								<button type="submit" class="btn btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Thêm
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
<!--form them end-->
@endsection