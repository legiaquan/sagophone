@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
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
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Tên sp</th>
                                                <th>Hãng</th>
                                                <th>Nhóm</th>                            
                                                <!-- <th>Mô tả</th> -->
                                                <th>Màn hình</th>
                                                <th>OS</th>
                                                <th>Camera</th>
                                                <th>CPU & Pin</th>
                                                <th>Thẻ sim</th>                                     
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sanpham as $row)
                                            <tr>
                                                <td>
                                                    {{ $row->tensp }} - {{ $row->ram }}/{{ $row->rom }}GB<br/><img width="90px" src="upload/imgSanPham/{{ $row->hinhsp }}"/>
                                                </td>   
                                                <td>{{ $row->hangdt->tenhang }}</td>
                                                <td>{{ $row->nhomsp->tennhom }}</td>
                                            <!-- <td>
                                                     @if(strlen($row->mota)<=100)
                                                         {{ $row->mota }}
                                                     @else
                                                         {{ mb_substr($row->mota,0,100-3,'UTF-8').'...' }}
                                                     @endif
                                                 </td> -->
                                                <td>{{ $row->manhinh }}</td>
                                                <td>{{ $row->hedieuhanh }}</td>
                                                <td>Trước:{{ $row->camtruoc }}<br/>Sau:{{ $row->camsau }}</td>
                                                <td>{{ $row->cpu }} <br>{{ $row->dungluongpin }} mAh</td>

                                                <td>{{ $row->thesim }}</td>                                                                  
                                                <td align="center">
                                                    <a href="admin/sanpham/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a><br>
                                                    <a href="admin/sanpham/xoa/{{ $row->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2">Xóa</i></span></a><br>
                                                    <a href="admin/soluongmausp/them/{{ $row->id }}"><span class="badge badge-success mr-2"><i class="ft-eye mr-1"></i>Thêm<br> hiện thị</span></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tên sp</th>
                                                <th>Hãng</th>
                                                <th>Nhóm</th>
                                                <!-- <th>Mô tả</th> -->
                                                <th>Màn hình</th>
                                                <th>OS</th>
                                                <th>Camera</th>
                                                <th>CPU & Pin</th>
                                                <th>Thẻ sim</th>                                     
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