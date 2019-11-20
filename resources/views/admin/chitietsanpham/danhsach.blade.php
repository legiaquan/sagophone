@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - HIỆN THỊ CHI TIẾT SẢN PHẨM<i class="ft-eye"></i></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/sanpham/danhsach" ><span class="badge badge-success mr-2">Thêm</span> Vui lòng chọn 'Thêm hiển thị' tại trang sản phẩm!</a>
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
                                                
                                                <th>Tên sản phẩm</th>
                                                <th>Hình</th>
                                                <th>Màu</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($chitietsanpham as $row)
                                            <tr>
                                                
                                                <td>{{ $row->sanpham->tensp }}</td>
                                                <td><img width="100px" src="upload/imgSanPham/{{ $row->sanpham->hinhsp }}"/></td>
                                                <td style="background: {{ $row->mau->mamau }}">{{ $row->mau->mau }}</td>
                                                <td>{{ $row->soluong }}</td>
                                                <td>{{ number_format($row->gia) }} VNĐ</td>
                                                <td>
                                                    <a href="admin/chitietsanpham/sua/{{ $row->id_sanpham }}/{{ $row->id_mau }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a> - 
                                                    <a href="admin/chitietsanpham/xoa/{{ $row->id_sanpham }}/{{ $row->id_mau }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2"> Xóa</i></span></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                
                                                <th>Tên sản phẩm</th>
                                                <th>Hình</th>
                                                <th>Màu</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
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