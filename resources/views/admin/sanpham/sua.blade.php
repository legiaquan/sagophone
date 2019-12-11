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
					<h4 class="card-title" id="basic-layout-tooltip">Sửa - {{ $sanpham->tensp }}</h4>

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
						<form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Hãng điện thoại<span style="color: red">*</span></label>
											<select id="projectinput5" name="txtHangDT" class="form-control">	
												@foreach($hangdt as $row)
												<option
												@if($sanpham->hangdt->id==$row->id)
	                                        		{{ "selected" }}
	                                    			@endif
												value="{{ $row->id }}">{{ $row->tenhang }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Nhóm sản phẩm <span style="color: red">*</span></label>
											<select id="projectinput6" name="txtNhomSP" class="form-control">			
												@foreach($nhomsp as $row)
												<option 
													@if($sanpham->nhomsanpham->id==$row->id)
	                                        		{{ "selected" }}
	                                    			@endif
                                     			value="{{ $row->id }}">{{ $row->tennhom }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Tên sản phẩm<span style="color: red">*</span></label>
											<input type="text" id="projectinput3" class="form-control"  name="txtTen" value="{{ $sanpham->tensp }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Hình</label><br>
											<img width="150px" src="upload/imgSanPham/{{ $sanpham->hinhsp }}" alt="placeholder+image">
											<input type="file" class="form-control-file" id="projectinput8" name="flHinh">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">RAM<span style="color: red">*</span></label>
											<select id="projectinput5" name="txtRam" class="form-control">
												<option @if($sanpham->rom==null){{ 'selected' }}  @endif value="">---Không có---</option>
												<option @if($sanpham->ram==1){{ 'selected' }} @endif value="1" >1GB</option>
												<option @if($sanpham->ram==2){{ 'selected' }} @endif value="2" >2GB</option>
												<option @if($sanpham->ram==3){{ 'selected' }} @endif value="3" >3GB</option>
												<option @if($sanpham->ram==4){{ 'selected' }} @endif value="4" >4GB</option>
												<option @if($sanpham->ram==6){{ 'selected' }} @endif value="6" >6GB</option>
												<option @if($sanpham->ram==8){{ 'selected' }} @endif value="8" >8GB</option>
												<option @if($sanpham->ram==10){{ 'selected' }} @endif value="10" >10GB</option>
												<option @if($sanpham->ram==12){{ 'selected' }} @endif value="12" >12GB</option>
												<option @if($sanpham->ram==16){{ 'selected' }} @endif value="12" >16GB</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">ROM<span style="color: red">*</span></label>
											<select id="projectinput5" name="txtRom" class="form-control">
												<option @if($sanpham->rom==null){{ 'selected' }} @endif value="">---Không có---</option>
												<option @if($sanpham->rom==16){{ 'selected' }} @endif value="16" >16GB</option>
												<option @if($sanpham->rom==32){{ 'selected' }} @endif value="32" >32GB</option>
												<option @if($sanpham->rom==64){{ 'selected' }} @endif value="64" >64GB</option>
												<option @if($sanpham->rom==128){{ 'selected' }} @endif value="128" >128B</option>
												<option @if($sanpham->rom==256){{ 'selected' }} @endif value="256" >256GB</option>
												<option @if($sanpham->rom==512){{ 'selected' }} @endif value="512" >512GB</option>
												<option @if($sanpham->rom==1024){{ 'selected' }} @endif value="1024" >1T</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Màn hình</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtManhinh" value="{{ $sanpham->manhinh }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Hệ điều hành</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtHedieuhanh" value="{{ $sanpham->hedieuhanh }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Camera trước</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtCamtruoc" value="{{ $sanpham->camtruoc }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Camera sau</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtCamsau" value="{{ $sanpham->camsau }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">CPU</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtCPU" value="{{ $sanpham->cpu }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Thẻ sim</label>
											<input type="text" id="projectinput3" class="form-control"  name="txtThesim" value="{{ $sanpham->thesim }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Dung lượng pin</label>
											<div class="input-group">										
												<input type="number" name="txtPin" class="form-control" value="{{ $sanpham->dungluongpin }}" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mAh</span>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="projectinput8">Mô tả</label>
									<textarea id="projectinput8" rows="5" class="ckeditor" name="txtMota">{{ $sanpham->mota }}</textarea>
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