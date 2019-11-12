@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center" style="font-size: 10px">
                                <th></th>
                                <th>Mã HĐ</th>
                                <th>Username</th>
                                <th>Tên NN</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Tình Trạng</th>
                                <th>Ghi chú</th>
                                <th>Ngày đặt</th>
                                <th>Ngày giao</th>
                                <th>Tổng tiền</th>
                                <th>Xem chi tiết</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($hoadon as $row )
                            <tr class="odd gradeX" align="center" style="font-size: 10px">
                                <td class="center"><i class="   glyphicon glyphicon-play"></i> <a href="#"></a></td>
                                <td>{{ $row->mahd }}</td>
                                <td>{{ $row->thanhvien->username }}</td>
                                <td>{{ $row->tennguoinhan }}</td>
                                <td id="diachi">{{ $row->diachinguoinhan }}</td>
                                <td>0{{ $row->sdtnguoinhan }}</td>
                                <td>{{ $row->tinhtrang }}</td>
                                <td>{{ $row->ghichu }}</td>
                                <td>{{ $row->ngaydathang }}</td>
                                <td>{{ $row->ngaygiaohang }}</td>
                                <td>{{ number_format($row->tongtien) }}₫</td>
                                <td class="center"><i class="glyphicon glyphicon-eye-open"></i><a href="#"> Xem {{ $row->id }}</a></td>
                                
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
