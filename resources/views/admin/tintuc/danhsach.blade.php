@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - Tin Tức<i class="ft-smartphone"></i></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/tintuc/them" ><span class="badge badge-success mr-2">Thêm</span></a>
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
                                                <th width="10px">ID</th>
                                                <th width="80px">Loại tin</th>
                                                <th width="5px">Admin đăng</th>
                                                <th width="270px">Tiêu đề & Ảnh</th>                            
                                                <!-- <th>Mô tả</th> -->
                                                <th width="150px">Mô tả</th>
                                                <th>Nội dung</th>
                                                <th width="10px">Trạng thái</th>                                    
                                                <th width="10px">Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tintuc as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td><b>{{ $row->loaitin->tenloaitin }}</b></td>
                                                <td>{{ $row->nhanvien->username }}</td>
                                                <td>
                                                    <b>{{ $row->tieude }}</b> <br/><img width="300px" src="upload/imgTinTuc/{{ $row->img }}"/>
                                                </td>   
                                                
                                                <td>
                                                    @if(strlen($row->mota)<=100)
                                                         {{ $row->mota }}
                                                     @else
                                                         {{ mb_substr($row->mota,0,160-3,'UTF-8').'...' }}
                                                     @endif
                                                 </td>

                                                     
                                                <td>
                                                    @if(strlen($row->noidung)<=100)
                                                         {{ $row->noidung }}
                                                     @else
                                                         {{ mb_substr($row->noidung,0,160-3,'UTF-8').'...' }}
                                                     @endif
                                                </td>

                                                <td>
                                                    @if($row->trangthai=='show')
                                                    <span class="badge badge-primary ">{{ $row->trangthai }}</span>
                                                    @else
                                                    <span class=" badge badge-dark">{{ $row->trangthai }}</span>
                                                    @endif
                                                </td>                                                                  
                                                <td align="center">
                                                    <a href="admin/tintuc/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a><br>
                                                    <a href="admin/tintuc/xoa/{{ $row->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2">Xóa</i></span></a><br>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Loại tin</th>
                                                <th>Admin Đăng</th>
                                                <th>Tiêu đề</th>                            
                                                <!-- <th>Mô tả</th> -->
                                                <th>Mô tả</th>
                                                <th>Nội dung</th>
                                                <th>Trạng thái</th>                                    
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