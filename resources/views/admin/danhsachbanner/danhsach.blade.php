@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - CÁC SẢN PHẨM TRONG BANNER <i class="ft-bookmark"></i></h4>
                                <label style="font-weight: bold;font-size: 30px">{{ $banner->tenbanner }}</label>
                                <img width="100%" src="upload/imgKhuyenMai/{{ $banner->hinhbanner }}" />
                            </div>

                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/danhsachbanner/them/{{ $banner->id }}" ><span class="badge badge-success mr-2">Thêm</span> Thêm sản phẩm vào banner này!</a><br><br>
                                    <a href="admin/banner/danhsach" ><span class="badge badge-info mr-2"><i class="ft-corner-down-left"></i> Danh sách banner</span></a>
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
                                                <th>Ram</th>
                                                <th>Rom</th>
                                                <th>Giá</th>
                                                <th>KM %</th>
                                                <th>Giá mới</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($danhsachbanner as $row)
                                            <tr>
                                                <?php $thongtinsp = getDanhSanhBannerSanPham($row->id_chitietsanpham)?>

                                                <td width="400px" align="center"><b>{{ $thongtinsp->tensp }}</b> <br> <img width="100px" src="upload/imgSanPham/{{ $thongtinsp->hinhchitiet }}" /></td>
                                                <td align="center">{{ $thongtinsp->ram }}GB</td>
                                                <td align="center">{{ $thongtinsp->rom }}GB</td>
                                                <td>
                                                    <span style="background: {{$thongtinsp->mamau }};color:#a6a6a6;border-radius: 5px;">{{ $thongtinsp->mau }}:</span> {{ number_format($row->chitietsanpham->gia) }}₫<br>
                                                    
                                                </td>
                                                <td align="center" width="110px"><b>{{ $row->phantramkhuyenmai }} 
                                                    @if(isset($row->phantramkhuyenmai)==false)
                                                        <span class="badge badge-warning mr-2" >Chưa nhập<br> khuyến mãi<br> Vui lòng chọn<br> sửa để <br>thêm</span> 
                                                    @endif%</b>
                                                </td>
                                                <td>
                                                    <span style="background: {{ $thongtinsp->mamau }};color:#a6a6a6;border-radius: 5px;">{{ $thongtinsp->mau }}:</span> {{ number_format(giaKhuyenMai($row->chitietsanpham->gia,$row->phantramkhuyenmai)) }}₫<br>
                                                </td>
                                                <td align="center">
                                                    <a href="admin/danhsachbanner/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a> <br>
                                                    <a href="admin/danhsachbanner/xoa/{{ $row->id_banner }}/{{ $row->id_chitietsanpham }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2"> Xóa</i></span></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Ram</th>
                                                <th>Rom</th>
                                                <th>Giá</th>
                                                <th>Khuyến mãi</th>
                                                <th>Giá mới</th>
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