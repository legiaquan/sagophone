@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">BÌNH LUẬN - Sản phẩm <i class="ft-smartphone"></i></h4>
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
                                                <th>ID</th>
                                                <th>Tên sp</th>
                                                <th>Hãng</th>
                                                <th>Nhóm</th>                            
                                                <!-- <th>Mô tả</th> -->                        
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sanpham as $row)
                                            <tr>
                                                <td><i class="ft-smartphone"></i></td>
                                                <td>{{ $row->id }}</td>
                                                <td>
                                                    {{ $row->tensp }} <br/><img width="90px" src="upload/imgSanPham/{{ $row->hinhsp }}"/>
                                                </td>   
                                                <td>{{ $row->hangdt->tenhang }}</td>
                                                <td>{{ $row->nhomsanpham->tennhom }}</td>                                                          
                                                <td align="center">
                                                    @if(demBinhLuan($row->id)>0)
                                                        <a target="_blank" href="admin/comment-san-pham/binhluan/{{ $row->id }}"><span class="badge badge-success mr-2"><i class="ft-eye mr-1"></i>Xem<br>{{ demBinhLuan($row->id) }} Bình Luận</span></a>
                                                    @else
                                                        <a><span class="badge badge-warning mr-2"><i class="ft-alert-circle"></i> Chưa có<br> bình luận</a>
                                                    @endif
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