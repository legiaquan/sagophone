@extends('admin.layout.index')
@section('content')
<div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Invoice template starts-->
<div class="row">
    <div class="col-md-12">
        <h4>Chi tiết đơn hàng</h4>
        <a href="admin/donhang/danhsach" ><span class="badge badge-success mr-2">Quay về Quản lý đơn hàng</span></a>
    </div>
</div>
<section class="invoice-template">
    <div class="card">
        <div class="card-body p-3">
            <div id="invoice-template" class="card-block">
                <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row">
                    <div class="col-6 text-left">
                        <img src="admin_asset/app-assets/img/logos/sago-32.png" alt="company logo" class="mb-2" width="70">
                        <a class="logo" style="font-size: 30px;color: silver">Sagophone</a>
                        <ul class="px-0 list-unstyled">
                            <!-- <li class="text-bold-800">Sagophone</li>
                            <li>180 Cao Lỗ,</li>
                            <li>Phường 4,</li>
                            <li>Quận 8,</li>
                            <li>Tp-HCM, Việt Nam</li> -->
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <h2>Đơn hàng</h2>
                        <p class="pb-3"># {{ $donhang->madh }}</p>
                        <!-- <ul class="px-0 list-unstyled">
                            <li>Tổng tiền</li>
                            <li class="lead text-bold-800">300000₫</li>
                        </ul> -->

                    </div>
                </div>
                <!--/ Invoice Company Details -->
                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-left">
                        <p class="text-muted">Địa chỉ giao hàng</p>
                    </div>
                    <div class="col-6 text-left">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-800">{{ $donhang->tennguoinhan }}</li>
                            <li>{{ $donhang->diachinguoinhan }}</li>
                            <li>+{{ $donhang->sdtnguoinhan }}</li>
                            <li>Username: {{ $donhang->thanhvien->username }}</li>
                            <li>Email: {{ $donhang->thanhvien->email }}</li>
                            <li>Ghi chú: {{ $donhang->ghichu }}</li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <p><span class="text-muted">Ngày đặt :</span> {{ $donhang->created_at }}</p>
                        <!-- <p><span class="text-muted">Phương thức :</span> Due on Receipt</p> -->
                        <p><span class="text-muted">Dự kiến giao hàng :</span>{{ date_modify($donhang->created_at,'+5days') }}</p>
                        <p><span class="text-muted">Tình trạng:</span>
                        
                          @if($donhang->tinhtrang == 'confirmed')
                              <a class="btn btn-raised btn-primary" style="width: 30%" >Đã xác nhận</a>
                          @elseif($donhang->tinhtrang == 'delivery')
                              <a class="btn btn-raised btn-info" style="width: 30%" >Đang giao</a>
                          @elseif($donhang->tinhtrang == 'complete')
                              <a class="btn btn-raised btn-success" style="width: 30%" >Thành công</a>
                          @elseif($donhang->tinhtrang == 'cancel')
                              <a class="btn btn-raised btn-danger" style="width: 30%"> Hủy</a>
                          @else
                              <a class="btn btn-raised btn-warning" style="width: 30%"> Chờ xử lý</a>
                          @endif
                        
                    </div>
                </div>
                <!--/ Invoice Customer Details -->
                <!-- Invoice Items Details -->
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-right">Giá mua</th>
                                        <th class="text-right">Sô lượng</th>
                                        <th class="text-right">Thành giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sumGia=0;?>
                                    @foreach($chitietdonhang as $row)
                                    <tr>
                                        <th scope="row">{{ $row->id }}</th>
                                        <td>
                                            <p>{{ $row->tensp }} | 
                                              Đánh giá: 
                                              @if($row->star!=null)
                                                @for($i=1;$i<=$row->star;$i++)
                                                          <i class="fa fa-star"></i>
                                                @endfor
                                              @else
                                                Khách chưa đánh giá
                                              @endif
                                            </p>
                                            <p class="text-muted"><img width="100px" src="upload/imgSanPham/{{ $row->hinhsp }}" />Màu: {{ $row->mau }} <i style="color: {{ $row->mamau }}" class="fa fa-heart"></i> <br></p>Nhận xét:@if($row->nhanxet!=null){{ $row->nhanxet }}@else Khách hàng chưa nhận xét @endif
                                        </td>
                                        <td class="text-right">{{ number_format($row->giamua) }}₫</td>
                                        <td class="text-right">{{ $row->soluong }}</td>
                                        <td class="text-right">{{ number_format($row->giamua*$row->soluong) }}₫</td>
                                        <?php $sumGia+=$row->giamua*$row->soluong; ?>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-left">
                            <!-- <p class="lead">Payment Methods:</p>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                                <td>Bank name:</td>
                                                <td class="text-right">ABC Bank, USA</td>
                                            </tr>
                                            <tr>
                                                <td>Acc name:</td>
                                                <td class="text-right">Amanda Orton</td>
                                            </tr>
                                            <tr>
                                                <td>IBAN:</td>
                                                <td class="text-right">FGS165461646546AA</td>
                                            </tr>
                                            <tr>
                                                <td>SWIFT code:</td>
                                                <td class="text-right">BTNPP34</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- <p class="lead">Tông tiên</p> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <!-- <tr>
                                            <td>Sub Total</td>
                                            <td class="text-right">$ 14,900.00</td>
                                        </tr>
                                        <tr>
                                            <td>TAX (12%)</td>
                                            <td class="text-right">$ 1,788.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-800">Total</td>
                                            <td class="text-bold-800 text-right"> $ 16,688.00</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Made</td>
                                            <td class="pink text-right">(-) $ 4,688.00</td>
                                        </tr> -->
                                        <tr class="bg-grey bg-lighten-4">
                                            <td class="text-bold-800">Tổng tiền</td>
                                            <td class="text-bold-800 text-right">{{ number_format($sumGia) }}₫</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!--Invoice template ends-->
@endsection