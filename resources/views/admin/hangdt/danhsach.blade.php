@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - HÃNG ĐIỆN THOẠI <i class="ft-pocket"></i></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="card-block card-dashboard">
                                    <a href="admin/hangdt/them" ><span class="badge badge-success mr-2">Thêm</span></a>
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
                                                <th>Tên hãng</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hangdt as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->tenhang }}</td>
                                                <td>
                                                    <a href="admin/hangdt/sua/{{ $row->id }}"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a>- 
                                                    <a href="admin/hangdt/xoa/{{ $row->id }}"><span class="badge badge-danger mr-2"><i class="ft-trash-2">Xóa</i></span></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên hãng</th>
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