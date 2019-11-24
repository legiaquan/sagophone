@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">BÌNH LUẬN - Sản phẩm <i class="ft-smartphone"></i></h4>
                                 <b>ID: </b>{{ $sanpham->id }} - <b>Tên:</b> {{ $sanpham->tensp }}<br>
                                <img width="150px" src="upload/imgSanPham/{{ $sanpham->hinhsp }}" />
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
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
                                                <th width="5px"></th>
                                                <th width="30px">ID thành viên</th>
                                                <th width="100px">Thành viên</th>
                                                <th width="200px">Tên thành viên</th>
                                                <th>Comment</th>
                                                <th width="100px">Ngày đăng</th>
                                                <th width="50px">Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($binhluan as $row)
                                            <tr>
                                                <td></td>
                                                <td>{{ $row->id_thanhvien }}</td>
                                                <td>{{ $row->username }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->binhluan }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td><a href="admin/comment-san-pham/binhluan/xoa/{{ $row->id }}/{{ $sanpham->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2">Xóa</i></span></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>ID thành viên</th>
                                                <th>Thành viên</th>
                                                <th>Tên thành viên</th>
                                                <th>Comment</th>
                                                <th>Ngày đăng</th>
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