@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Đơn hàng</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Sửa thông tin</h4>
					<p class="mb-12"></p>
					<a href="admin/donhang/danhsach" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Danh sách</span></a>
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
						<form class="form" action="admin/donhang/sua/{{ $donhang->id }}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-body">
								<div class="form-group">
									<label for="issueinput1">Mã đơn hàng</label>
									<input type="text" id="issueinput1" class="form-control"  name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" disabled="" value="{{ $donhang->madh }}">
								</div>
								
								<div class="form-group">
									<label for="issueinput2">Username</label>
									<input type="text" id="issueinput2" class="form-control"  name="openedby" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By" disabled="" placeholder="{{ $donhang->thanhvien->username }}">
								</div>
								<hr>
								<label for="issueinput2">Thông tin giao hàng*</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput3">Tên người nhận</label>
											<input type="text" id="issueinput3" class="form-control" name="txtTen" data-toggle="tooltip" data-trigger="hover" data-placement="top" value="{{ $donhang->tennguoinhan }}" placeholder="Vui lòng nhập tên người nhận">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput4">Số điện thoại người nhận</label>
											<input type="text" id="issueinput4" class="form-control" name="txtSDT" data-toggle="tooltip" data-trigger="hover" data-placement="top" value="{{ $donhang->sdtnguoinhan }}" placeholder="Vui lòng nhập sđt người nhận">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="issueinput4">Địa chỉ</label>
									<input type="text" id="issueinput4" class="form-control" name="txtDiachi" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" value="{{ $donhang->diachinguoinhan }}" placeholder="Vui lòng nhập địa chỉ người nhận">
								</div>

							</div>

							<div class="form-actions">
<!-- 								<button type="button" class="btn btn-raised btn-secondary mr-1" onclick="quayve()">
	<i class="ft-corner-down-left"></i> Quay lại
</button> -->
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