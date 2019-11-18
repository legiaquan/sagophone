@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - NHÂN VIÊN <i class="ft-user"></i></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/nhanvien/them" ><span class="badge badge-success mr-2">Thêm</span></a>
                                    <p class="card-text">
                                        @if(session('thongbao'))
                                            <div class="alert alert-success">
                                                {{ session('thongbao') }}
                                            </div>
                                        @endif
                                    </p>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Họ tên</th>
                                                <th>Địa chỉ</th>
                                                <th>Email</th>
                                                <th>SĐT</th>
                                                <th>Trạng thái</th>
                                                <th>Level</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($nhanvien as $row)
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->username }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->diachi }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->sdt }}</td>
                                                <td>
                                                     @if($row->trangthai==1)
                                                        <span style="background-color: #4dff4d; border-radius: 5px; color:white">{{ 'Active ' }}<span class=" glyphicon glyphicon-ok-circle"></span></span>
                                                    @else
                                                        <span style="background-color: #ff1a1a; border-radius: 5px; color:white">{{ 'Banned ' }}<span class=" glyphicon glyphicon-ban-circle"></span></span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->level->tenlevel }}
                                                </td>
                                                <td>
                                                    <a href="admin/nhanvien/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a> - 
                                                    <a href="admin/nhanvien/xoa/{{ $row->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2"> Xóa</i></span></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Họ tên</th>
                                                <th>Địa chỉ</th>
                                                <th>Email</th>
                                                <th>SĐT</th>
                                                <th>Trạng thái</th>
                                                <th>Level</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
@endsection