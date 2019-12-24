@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-24" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - SẢN PHẨM <i class="ft-smartphone"></i></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/sanpham/them" ><span class="badge badge-success mr-2">Thêm</span></a>
                                    <p class="card-text">
                                        @if(session('thongbao'))
                                            <div class="alert alert-success">
                                                {{ session('thongbao') }}
                                            </div>
                                        @endif
                                    </p>
                                    <table width="103%" class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th width="10px"></th>
                                                <th width="10px">ID</th>
                                                <th width="10px">Tên sp</th>
                                                <th width="10px">Hãng</th>
                                                <th width="10px">Nhóm</th>                            
                                                <!-- <th>Mô tả</th> -->
                                                <th width="10px">Màn hình</th>
                                                <th width="10px">OS</th>
                                                <th width="10px">CAM</th>
                                                <th width="10px" >CPU & Pin</th>
                                                <th width="10px" >Thẻ sim</th>
                                                <th width="300px">Giá & Số lượng</th>                              
                                                <th width="10px" >Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sanpham as $row)
                                            <tr>
                                                <td><i class="ft-smartphone"></i></td>
                                                <td>{{ $row->id }}</td>
                                                <td>
                                                    {{ $row->tensp }} <br/><img width="90px" height="90px" src="upload/imgSanPham/{{ $row->hinhsp }}"/>
                                                </td>   
                                                <td>{{ $row->hangdt->tenhang }}</td>
                                                <td>{{ $row->nhomsanpham->tennhom }}</td>
                                            <!-- <td>
                                                     @if(strlen($row->mota)<=100)
                                                         {{ $row->mota }}
                                                     @else
                                                         {{ mb_substr($row->mota,0,100-3,'UTF-8').'...' }}
                                                     @endif
                                                 </td> -->
                                                <td>{{ $row->manhinh }}</td>
                                                <td>{{ $row->hedieuhanh }}</td>
                                                <td>@if($row->camtruoc)<b>Trước: </b>{{ $row->camtruoc }}@endif<br/>@if($row->camsau)<b>Sau: </b>{{ $row->camsau }}@endif</td>
                                                <td>{{ $row->cpu }} <br><i>{{ $row->dungluongpin }} @if($row->dungluongpin)mAh @endif</i></td>

                                                <td>{{ $row->thesim }}</td>
                                                <td><?php $arrGia = getAllGia($row->id) ?>
                                                    @foreach($arrGia as $giasp)
                                                        <span style="background: {{ $giasp->mamau }};color:#a6a6a6;border-radius: 5px;">{{ $giasp->mau }}</span> {{ number_format($giasp->gia) }}₫ - 
                                                        @if($giasp->soluong>0)
                                                            {{ $giasp->soluong }}
                                                        @else
                                                            <span style="color: tomato">({{ $giasp->soluong }})</span>
                                                        @endif
                                                        <a style="float:right" href="admin/chitietsanpham/sua/{{ $row->id }}/{{ $giasp->id_mau }}"><i class="ft-edit mr-1"></i></a>
                                                        <a style="float:right" href="admin/chitietsanpham/xoa/{{ $row->id }}/{{ $giasp->id_mau }}"><span class=" danger"><i class="ft-trash "></i></span></a>
                                                        <br>
                                                    @endforeach</td>                                                              
                                                <td align="center">
                                                    <a href="admin/sanpham/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit"></i>Sửa</span></a><br>
                                                    <a href="admin/sanpham/xoa/{{ $row->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2">Xóa</i></span></a><br>
                                                    <a href="admin/chitietsanpham/them/{{ $row->id }}"><span class="badge badge-success mr-2"><!-- <i class="ft-image"></i> -->Thêm<br>màu</span></a>
                                                    {{-- <a href="admin/chitietsanpham/danhsach/{{ $row->id }}"><span class="badge badge-info mr-2"><i class="ft-eye "></i>Xem<br>chi tiết</span></a> --}}
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Tên sp</th>
                                                <th>Hãng</th>
                                                <th>Nhóm</th>
                                                <!-- <th>Mô tả</th> -->
                                                <th>Màn hình</th>
                                                <th>OS</th>
                                                <th>Camera</th>
                                                <th>CPU & Pin</th>
                                                <th>Thẻ sim</th>
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