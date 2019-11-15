@extends('admin.layout.index')
@section('content')
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DANH SÁCH - HÃNG ĐIỆN THOẠI</h4>
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
                                                <th>ID</th>
                                                <th>Tên hãng</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>iphone</td>
                                                <td>
                                                    <a href="admin/hangdt/sua/1"><span class="badge badge-primary mr-2"><i class="ft-edit mr-1"></i>Sửa</span></a> - 
                                                    <a href="admin/hangdt/xoa/1123213"><span class="badge badge-danger mr-2"><i class="ft-trash-2"> Xóa</i></span></a>
                                                </td>
                                                
                                            </tr>
                                            
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