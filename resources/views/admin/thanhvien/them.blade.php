@extends('admin.layout.index')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thành Viên
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                            @foreach($errors->all() as $err)     
                                    {{ $err }}<br/>  
                            @endforeach
                             </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                        <form action="admin/thanhvien/them" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUsername" placeholder="Vui lòng nhập username" />
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="txtHoten" placeholder="Vui lòng nhập họ tên" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiaChi" placeholder="Vui lòng nhập địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtEmail" placeholder="Vui lòng nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="txtSDT" value="0" placeholder="Vui lòng nhập số điện thoại" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="txtPassword" placeholder="Vui lòng nhập password" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input class="form-control" type="password" name="txtPasswordAgain" placeholder="Vui lòng nhập password" />
                            </div>
                            
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="TrangThai">
                                    <option value="0">Banned</option>
                                    <option value="1" selected >Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="Level">
                                    <option value="0" selected>User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection