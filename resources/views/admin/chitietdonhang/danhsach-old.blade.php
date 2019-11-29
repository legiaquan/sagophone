@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - Chi tiết đơn hàng</h4>
                            </div>
                                
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/donhang/danhsach" ><span class="badge badge-success mr-2">Quay về Quản lý đơn hàng</span></a>
                                    <br><br><span style="color:tomato;font-weight: bold">Mã đơn hàng: </span>#{{ $donhang->madh }}
                                    <br><span style="font-weight: bold">Tài khoản khách: </span>{{ $donhang->thanhvien->username }}
                                    <br><span style="font-weight: bold">Admins xác nhận đơn hàng: </span>@if(isset($donhang->admins->username)){{ $donhang->admins->username }}@endif
                                    <p class="card-text">
                                        @if(session('thongbao'))
                                            <div class="alert alert-success">
                                                {{ session('thongbao') }}
                                            </div>
                                        @endif
                                    </p>
                                        <table width="100%" border="0px">
                                        <tbody>

                                            <tr>
                                                <!--donhang-->          
                                                <td colspan="2">Ngày đặt: {{ $donhang->created_at }}</td>
                                                <td colspan="2">Tình trạng: 
                                                        @if($donhang->tinhtrang == 'confirmed')
                                                            <a class="btn btn-raised btn-primary" style="width: 50%" >Đã xác nhận</a>
                                                        @elseif($donhang->tinhtrang == 'delivery')
                                                            <a class="btn btn-raised btn-info" style="width: 50%" >Đang giao</a>
                                                        @elseif($donhang->tinhtrang == 'complete')
                                                            <a class="btn btn-raised btn-success" style="width: 50%" >Thành công</a>
                                                        @elseif($donhang->tinhtrang == 'cancel')
                                                            <a class="btn btn-raised btn-danger" style="width: 50%"> Hủy</a>
                                                        @else
                                                            <a class="btn btn-raised btn-warning" style="width: 50%"> Chờ xử lý</a>
                                                        @endif
                                                </td>
                                                <!--/donhang-->

                                            </tr>
                                            <tr>
                                                <th width="40%">Tên sản phẩm</th>
                                                <th width="30%">Đánh giá & nhận xét</th>
                                                <th>Giá</th>
                                                <th>Giá mua & Số lượng</th>
                                                <th>Tổng giá</th>
                                            </tr>
                                            <?php $sumGia=0;?>
                                            @foreach($chitietdonhang as $row)
                                            <!--sp don hang-->  
                                            
                                            <tr>
                                                <td>
                                                    <hr><img  height="150px" width="150px" src="upload/imgSanPham/{{ $row->hinhsp }}" /><b>{{ $row->tensp }}</b>
                                                </td>
                                                <td>
                                                    @for($i=1;$i<=$row->star;$i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    <br>
                                                    {{ $row->nhanxet }}
                                                </td>
                                                <td>{{ number_format($row->giamua)}}₫ x{{ $row->soluong }}</td>
                                                <td>{{ number_format($row->giamua*$row->soluong) }}₫ </td>
                                                </tr>
                                                <?php $sumGia+=$row->giamua*$row->soluong; ?>
                                                @endforeach

                                            <tr>
                                                <td  colspan="2"><hr>
                                                     <b>Địa chỉ giao hàng</b>
                                                    <br>
                                                       {{ $donhang->tennguoinhan }}
                                                    <br>
                                                        {{ $donhang->diachinguoinhan }}
                                                    <br>
                                                       +{{ $donhang->sdtnguoinhan }}
                                                </td>
                                                <td colspan="2">
                                                        <b>Tổng cộng: <?php echo number_format($sumGia);?>₫<b>
                                                    <br>   
                                                </td>
                                            </tr>
                                        
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
@endsection