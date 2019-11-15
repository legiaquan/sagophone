@extends('admin.layout.index')
@section('content')
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Hãng</div>
        </div>
    </div>
	
		


<!--form them-->
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-tooltip">Sửa</h4>
					<p class="mb-12"></p>
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
						<form class="form" action="admin/hangdt/sua/id" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-body">
								<div class="form-group">
									<label for="issueinput1">Tên hãng</label>
									<input type="text" id="issueinput1" class="form-control"  name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" placeholder="Vui lòng nhập tên hãng">
								</div>

								<div class="form-group">
									<label for="issueinput2">Opened By</label>
									<input type="text" id="issueinput2" class="form-control"  name="openedby" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By" placeholder="Vui lòng nhập tên hãng">
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput3">Date Opened</label>
											<input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" placeholder="Vui lòng nhập tên hãng">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="issueinput4">Date Fixed</label>
											<input type="date" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" placeholder="Vui lòng nhập tên hãng">
										</div>
									</div>
								</div>


								<div class="form-group">
									<label for="issueinput5">Priority</label>
									<select id="issueinput5" name="priority" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" >
										<option value="low">Low</option>
										<option value="medium">Medium</option>
										<option value="high">High</option>
									</select>
								</div>

								<div class="form-group">
									<label for="issueinput6">Status</label>
									<select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
										<option value="not started">Not Started</option>
										<option value="started">Started</option>
										<option value="fixed">Fixed</option>
									</select>
								</div>

								<div class="form-group">
									<label for="issueinput8">Comments</label>
									<textarea id="issueinput8" rows="5" class="form-control" name="comments"  data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments" placeholder="Vui lòng nhập tên hãng"></textarea>
								</div>

							</div>

							<div class="form-actions">
								<button type="reset" class="btn btn-raised btn-warning mr-1">
									<i class="ft-x"></i> Làm mới
								</button>
								<button type="button" class="btn btn-raised btn-primary">
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