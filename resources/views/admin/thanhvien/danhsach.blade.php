@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thành Viên
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>User</th>
                                <th>Họ tên</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Trạng thái</th>
                                <th>Level</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($thanhvien as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->hoten }}</td>
                                <td>{{ $row->diachi }}</td>
                                <td>{{ $row->email }}</td>
                                <td>0{{ $row->sdt }}</td>
                                <td>
                                     @if($row->trangthai==1)
                                        <span style="background-color: #4dff4d; border-radius: 5px; color:white">{{ 'Active ' }}<span class=" glyphicon glyphicon-ok-circle"></span></span>
                                    @else
                                        <span style="background-color: #ff1a1a; border-radius: 5px; color:white">{{ 'Banned ' }}<span class=" glyphicon glyphicon-ban-circle"></span></span>
                                    @endif
                                </td>
                                <td>
                                    @if($row->level==1)
                                        <span style="color:green">{{ 'Admin' }}<span style="color:green" class="glyphicon glyphicon-cog"></span></span>
                                    @else
                                        {{ 'User' }}
                                    @endif
                                </td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thanhvien/xoa/{{ $row->id }}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/thanhvien/sua/{{ $row->id }}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection