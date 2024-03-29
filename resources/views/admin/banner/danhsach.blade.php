@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - Banner<i class="ft-bookmark"></i></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/banner/them" ><span class="badge badge-success mr-2">Thêm</span></a>
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
                                                <th>Tên banner & Hình banner</th>
                                                <th>Admin thêm</th>
                                                <th width="10px">Trạng thái</th>
                                                <th>Ngày bắt đầu</th>
                                                <th width="100px">Ngày kết thúc</th>

                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($banner as $row)
                                            <tr>
                                                <td><i class="ft-eye"></i></td>
                                                <?php $dem = 0;?>
                                                @foreach($dembanner as $row_dem)
                                                    @if($row_dem->id_banner ==$row->id)
                                                        <?php $dem++; ?>
                                                    @endif
                                                @endforeach
                                                <td align="center"><span  ><b>{{ $row->tenbanner }}</b> - hiện có ({{ $dem }}) sp</span><br><img width="500px"  src="upload/imgKhuyenMai/{{ $row->hinhbanner }}"/>
                                                </td>
                                                <td>{{ $row->admins->username }}</td>
                                                <td>
                                                    @if($row->trangthai=='show')
                                                    <a href="admin/banner/hide/{{ $row->id }}"><span class="badge badge-primary ">{{ $row->trangthai }}</span></a>
                                                    @else
                                                    <a href="admin/banner/show/{{ $row->id }}"><span class=" badge badge-dark">{{ $row->trangthai }}</span></a>
                                                    @endif
                                                </td>
                                                <td>{{ $row->ngaybatdau }}</td>
                                                <?php 
                                                $ngaykt = strtotime($row->ngayketthuc);
                                                $ngayhientai = strtotime(date("Y-m-d"));
                                                $checkNgay = $ngaykt - $ngayhientai;
                                                ?>
                                                <td>
                                                    @if($checkNgay >0)
                                                    {{$row->ngayketthuc }}
                                                    @else
                                                        @if($row->ngayketthuc!=null)
                                                        <b><span style="color: tomato"><i class="ft-alert-triangle"></i>{{$row->ngayketthuc }}</span></b>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td width="100px" align="center">
                                                    <a  href="admin/banner/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a><br>
                                                    <a href="admin/banner/xoa/{{ $row->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2"> Xóa</i></span></a>
                                                    <a href="admin/danhsachbanner/danhsach/{{ $row->id }}"><span class="badge badge-success mr-2"><i class="ft-eye mr-1"></i>DS
                                                    sản phẩm<br> trong banner</span></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên banner & Hình banner</th>
                                                <th>Admin thêm</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
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