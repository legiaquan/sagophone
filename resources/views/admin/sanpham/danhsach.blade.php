@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sp</th>
                                <th>Hãng</th>
                                <th>Nhóm</th>
                                {{-- <th>Hình</th> --}}
                                <th>Giá</th>
                                <th>SL</th>
                                <th>KM</th>
                                <th>SEO</th>
                                <th>NEW</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->tensp }}<br/><img width="50px" src="upload/imgSanPham/{{ $row->hinhsp }}" /></td>
                                <td>{{ $row->hangdt->tenhang }}</td>
                                <td>{{ $row->nhomsp->tennhom }}</td>
                                {{-- <td><img width="50px" src="upload/imgSanPham/{{ $row->hinhsp }}" /></td> --}}
                                <td>{{ number_format($row->gia) }}₫</td>
                                <td>{{ $row->soluong }}</td>
                                <td>{{ $row->khuyenmai }}%</td>
                                <td>
                                    @if($row->seo==0)
                                        {{ 'Không' }}
                                    @else
                                        {{ 'Có' }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->new==0)
                                        {{ 'Không' }}
                                    @else
                                        {{ 'Có' }}
                                    @endif
                                </td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{ $row->id }}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{ $row->id }}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection