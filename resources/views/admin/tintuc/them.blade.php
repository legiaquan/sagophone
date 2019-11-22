@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Tin tức</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Thêm</h4>
					<p class="mb-12"></p>
					<a href="admin/tintuc/danhsach" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Danh sách</span></a>
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
						<form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Loại tin tức<span style="color: red">*</span></label>
											<select id="projectinput5" name="txtLoaitin" class="form-control">	
												@foreach($loaitin as $row)
												<option value="{{ $row->id }}">{{ $row->tenloaitin }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Tên tiêu đề<span style="color: red">*</span></label>
											<input type="text" id="projectinput3" class="form-control"  name="txtTen">
										</div>
									</div>
								</div>
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Hình</label>
											<input type="file" class="form-control-file" id="projectinput8" name="flHinh">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Mô tả</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtMota">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput5">Trạng thái</label>
											<select id="issueinput5" name="txtTrangthai" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" >
												<option value="show">HIỆN</option>
												<option value="hide">ẨN</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="projectinput8">Nội dung</label>
									<textarea id="projectinput8" rows="5" class="ckeditor" name="txtNoidung" >Đang cập nhật!</textarea>
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