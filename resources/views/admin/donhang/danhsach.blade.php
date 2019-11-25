@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - ĐƠN HÀNG <i class="ft-shopping-cart"></i></h4>
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
                                                <th></th>
                                                <th width="90px">Mã ĐH</th>
                                                <th width="50px">Khách Hàng</th>
                                                <th width="125px">Thông tin giao hàng</th>
                                                <th width="100px">Ngày đặt& Giao</th>
                                                <th>Tổng tiên</th>
                                                <th width="30px">Admin confirmed</th>
                                                <th width="70px">Tình trạng</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($donhang as $row)
                                            <tr>
                                                <td><i class="ft-shopping-cart"></i></td>
                                                <td>
                                                    <b>#{{ $row->madh }}</b><br>
                                                    <b>Đánh giá:</b>
                                                    @if(avgStarSanPham($row->id)!=null)
                                                    {{ round(avgStarSanPham($row->id),2) }}/5
                                                    @else
                                                        Chưa đánh giá
                                                    @endif
                                                    <br>
                                                    @if(getNhanXet($row->id)!=null)
                                                        <?php $dem=null;?>
                                                        @foreach(getNhanXet($row->id) as $nx)
                                                            Nhận xét{{ $dem }}: {{ $nx->nhanxet }}<br><?php $dem++;?>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{ $row->thanhvien->username }}</td>
                                                <td><b>Tên:</b> {{ $row->tennguoinhan }}<br>
                                                    <b>Địa chỉ:</b> {{ $row->diachinguoinhan }}<br>
                                                    <b>SĐT:</b> {{ $row->sdtnguoinhan }}
                                                </td>
                                                <td>
                                                    <b>Ngày đặt:</b><br> {{ date_format($row->created_at,'d-m-Y') }}<br>
                                                    <b>Dự kiến giao: </b><br>{{ date_format(date_modify($row->created_at,'+5days'),'d-m-Y') }}
                                                </td>
                                                <td>{{ number_format($row->tongtien) }}₫</td>
                                                <td>
                                                    @if(isset($row->admins->username))
                                                        {{ $row->admins->username }}
                                                    @endif
                                                </td>
                                                <td>
                                                   
                                                    @if($row->tinhtrang == 'confirmed')
                                                        <a class="btn btn-raised btn-primary" style="width: 100%" >Đã xác nhận</a>
                                                    @elseif($row->tinhtrang == 'delivery')
                                                        <a class="btn btn-raised btn-info" style="width: 100%" >Đang giao</a>
                                                    @elseif($row->tinhtrang == 'complete')
                                                        <a class="btn btn-raised btn-success" style="width: 100%" >Thành công</a>
                                                    @elseif($row->tinhtrang == 'cancel')
                                                        <a class="btn btn-raised btn-danger" style="width: 100%"> Hủy</a>
                                                    @else
                                                        <a class="btn btn-raised btn-warning" style="width: 100%"> Chờ xử lý</a>
                                                    @endif
                                                    
                                                </td>
                                                <td align="center">
                                                    <a href="admin/donhang/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a><br>
                                                    <a target="_blank" href="admin/chitietdonhang/danhsach/{{ $row->id }}"><span class="badge badge-success mr-2"><i class="ft-eye mr-1"></i>Xem<br> CT</span></a><br>
                                                    @if($row->tinhtrang !='complete' and $row->tinhtrang !='cancel')
                                                    <div class="form-group">
                                                        <!-- Button dropdowns with icons -->
                                                        <div class="btn-group">
                                                            <button style="font-size: 12px" type="button" class="btn btn-raised btn-secondary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-star"></i> Xử lý</button>
                                                            <div class="dropdown-menu">
                                                                @if($row->tinhtrang !='cancel' and $row->tinhtrang !='complete')
                                                                <a class="btn btn-raised btn-danger" style="width: 100%"  href="admin/donhang/xuly/{{ $row->id }}/cancel">Hủy</a>
                                                                @endif
                                                                @if($row->tinhtrang != 'confirmed' and $row->tinhtrang != 'delivery' )
                                                                <a class="btn btn-raised btn-primary" style="width: 100%" href="admin/donhang/xuly/{{ $row->id }}/confirmed">Đã xác nhận</a>
                                                                @endif
                                                                @if($row->tinhtrang != 'delivery' and $row->tinhtrang !='pending')
                                                                <a class="btn btn-raised btn-info" style="width: 100%" href="admin/donhang/xuly/{{ $row->id }}/delivery">Đang giao hàng</a>
                                                                @endif
                                                                @if($row->tinhtrang !='pending' and $row->tinhtrang != 'confirmed')
                                                                <a class="btn btn-raised btn-success" style="width: 100%" href="admin/donhang/xuly/{{ $row->id }}/complete">Thành công</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Mã ĐH</th>
                                                <th>Khách Hàng</th>
                                                <th>Thông tin người nhận</th>
                                                <th>Ngày đặt& Giao</th>
                                                <th>Tổng tiên</th>
                                                <th>Admin xử lý</th>
                                                <th>Tình trạng</th>
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