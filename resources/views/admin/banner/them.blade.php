@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Banner</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Thêm</h4>
					<p class="mb-12"></p>
					<a href="admin/banner/danhsach" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Danh sách</span></a>
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
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{ session('loi') }}
                            </div>
                        @endif
						<form class="form" action="admin/banner/them/{{ auth('admin')->user()->id }}" method="POST"  enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-body">
								<div class="form-group">
									<label for="issueinput1">Tên banner</label>
									<input type="text" id="issueinput1" class="form-control"  name="txtTen" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" placeholder="Vui lòng nhập tên banner">
								</div>
								
								<div class="form-group">
									<label>Hình</label>
									<input type="file" class="form-control-file" id="projectinput8" name="flHinh">
								</div>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput3">Ngày bắt đầu</label>
											<input type="date" id="issueinput3" class="form-control" name="txtNgaybatdau" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" placeholder="Vui lòng nhập tên banner">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput4">Ngày kết thúc</label>
											<input type="date" id="issueinput4" class="form-control" name="txtNgayketthuc" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" placeholder="Vui lòng nhập tên banner">
										</div>
									</div>
								</div>


								<div class="form-group">
									<label for="issueinput5">Trạng thái</label>
									<select id="issueinput5" name="txtTrangthai" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" >
										<option value="show">HIỆN</option>
										<option value="hide">ẨN</option>
									</select>
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