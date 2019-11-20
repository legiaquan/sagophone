@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Hiển thị</div>
        </div>
    </div>
	


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Sửa</h4>
					<p class="mb-12"></p>
					<a href="admin/chitietsanpham/danhsach" ><span class="badge badge-success mr-2"><i class="ft-corner-down-left"></i> Danh sách</span></a>
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
						<form class="form" action="admin/chitietsanpham/sua/{{ $chitietsanpham->id_sanpham }}/{{ $chitietsanpham->id_mau }}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput1">Tên sản phẩm </label>
											<input type="text" id="issueinput1" class="form-control"  name="txtTen" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" disabled="" value="{{ $chitietsanpham->sanpham->tensp }} {{ $chitietsanpham->mau->mau }}">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Màu<span style="color: red">*</span></label>
											<select id="projectinput5" name="txtMau" class="form-control">	
												@foreach($mau as $row)
												<option
												@if($chitietsanpham->id_mau == $row->id)
													{{ 'selected' }}
												@endif
												@foreach($dshienthi as $ht)
														@if($ht->id_mau == $row->id && $chitietsanpham->id_mau != $row->id)
															{{ 'disabled' }}
														@endif
													@endforeach
												value="{{ $row->id }}" style="background-color: {{ $row->mamau }}">{{ $row->mau }}
												@foreach($dshienthi as $ht)
														@if($ht->id_mau == $row->id)
															{{ '(Sản phẩm đã có màu này)' }}
														@endif
													@endforeach
												</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput3">Số lượng</label>
											<input type="number" id="issueinput3" class="form-control" name="txtSoluong" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" placeholder="Vui lòng nhập tên hãng" value="{{ $chitietsanpham->soluong }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput4">Giá</label>
											<div class="input-group">										
												<input type="number" name="txtGia" class="form-control" value="{{ $chitietsanpham->gia }}" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">VNĐ</span>
                                                </div>
                                            </div>
										</div>
									</div>
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