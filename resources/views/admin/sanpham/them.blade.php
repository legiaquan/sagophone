@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Sản phẩm</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Thêm</h4>
					<p class="mb-12"></p>
					<a href="admin/sanpham/danhsach" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Danh sách</span></a>
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
						<form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Hãng điện thoại<span style="color: red">*</span></label>
											<select id="projectinput5" name="txtHangDT" class="form-control">	
												@foreach($hangdt as $row)
												<option value="{{ $row->id }}">{{ $row->tenhang }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Nhóm sản phẩm <span style="color: red">*</span></label>
											<select id="NhomSanPham" name="txtNhomSP" class="form-control">			
												@foreach($nhomsp as $row)
												<option value="{{ $row->id }}">{{ $row->tennhom }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Tên sản phẩm<span style="color: red">*</span></label>
											<input type="text" id="projectinput3" class="form-control"  name="txtTen">
										</div>
									</div>
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
											<label for="projectinput5">RAM</label>
											<select id="projectinput5" name="txtRam" class="form-control">D	
												<option value="1" >1GB</option>
												<option value="2" >2GB</option>
												<option value="3" >3GB</option>
												<option value="4" selected="" >4GB</option>
												<option value="6" >6GB</option>
												<option value="8" >8GB</option>
												<option value="10" >10GB</option>
												<option value="12" >12GB</option>
												<option value="12" >16GB</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">ROM</label>
											<select id="projectinput5" name="txtRom" class="form-control">D	
												<option value="16" >16GB</option>
												<option value="32" >32GB</option>
												<option value="64" selected="" >64GB</option>
												<option value="128" >128GB</option>
												<option value="256" >256GB</option>
												<option value="512" >512GB</option>
												<option value="1024" >1T</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Màn hình</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtManhinh">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Hệ điều hành</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtHedieuhanh">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Camera trước</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtCamtruoc">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Camera sau</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtCamsau">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">CPU</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtCPU">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Thẻ sim</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtThesim" value="Nano Sim">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Dung lượng pin</label>
											<div class="input-group">										
												<input type="number" name="txtPin" class="form-control" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mAh</span>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput3">Giá</label>
											<div class="input-group">										
												<input type="number" name="txtGia" value="1000000" class="form-control" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">VNĐ</span>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="projectinput3">Số lượng</label>
											<div class="input-group">										
												<input type="number" name="txtSoluong" value="100" class="form-control" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Sản phẩm</span>
                                                </div>
                                            </div>
										</div>
									</div>

								</div>

								<div class="form-group">
									<label for="projectinput3">Màu</label>				
									<div class="checkbox">
										@foreach($mau as $row)
			                          	<div class="form-check-label" >
				                            <label class="form-check-label" style="font-size: 15px; float: left;"><input  type="checkbox" name="mau[]" value="{{ $row->id }}"/> <div style=" color:grey;float:right; width: 150px; height: 30px;background: {{ $row->mamau }};">{{ $row->mau }}</div></label>
			                          	</div>
			                          	@endforeach
			                      	</div>
								</div>
								<div>&nbsp;</div>
								<div class="form-group">
									<label for="projectinput8">Mô tả</label>
									<textarea id="projectinput8" rows="5" class="ckeditor" name="txtMota" >Đang cập nhật!</textarea>
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