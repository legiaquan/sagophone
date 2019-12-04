@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">THÊM - SẢN PHẨM VÀO BANNER <i class="ft-bookmark"></i></h4>
                                <label style="font-weight: bold;font-size: 30px">{{ $banner->tenbanner }}</label>
                                <img width="100%" src="upload/imgKhuyenMai/{{ $banner->hinhbanner }}" />
                            </div>

                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/danhsachbanner/danhsach/{{ $banner->id }}" ><span class="badge badge-success mr-2">Quay về</span></a>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sanpham as $row)
                                            
											<tr>
                                                <td width="500px" align="center"><b>{{ $row->tensp }}</b> <br> <img width="100px" src="upload/imgSanPham/{{ $row->hinhsp }}" /></td>
                                                <td align="center">{{ $row->ram }} GB</td>
                                                <td align="center">{{ $row->rom }} GB</td>
                                                <td align="center">
                                                	
                                                    <?php $arrGia = getAllGia($row->id) ?>
                                                    @foreach($arrGia as $giasp)
                                                        
                                                        <span style="background: {{ $giasp->mamau }};color:#a6a6a6;border-radius: 5px;">{{ $giasp->mau }}:</span> {{ number_format($giasp->gia) }}₫ - {{ $giasp->soluong }}
                                                        
                                                        @if(checkTonTaiSPBanner($giasp->id,$banner->id)==0)
                                                        <a href="admin/danhsachbanner/them/{{ $banner->id }}/{{ $giasp->id}}"><span style="float: right;" class="badge badge-primary mr-2"><i class="ft-plus-circle"></i> Thêm</span></a>
                                                        @else
                                                        <a><span style="float: right;" class="badge badge-warning mr-2"><i class="ft-alert-circle"></i> Đã có</span></a>
                                                        
                                                        
                                                        @endif
                                                        <br><br>
                                                    @endforeach
                                                    	
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