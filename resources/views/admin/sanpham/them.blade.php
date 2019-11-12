@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                        
                        <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="txtTenSP" placeholder="Vui lòng nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Hãng</label>
                                <select class="form-control" name="HangDT">
                                    @foreach($hangdt as $row)
                                    <option value="{{ $row->id }}">{{ $row->tenhang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhóm</label>
                                <select class="form-control" name = "NhomSP">
                                    @foreach($nhomsp as $row)
                                    <option value="{{ $row->id }}">{{ $row->tennhom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" id="price" name="txtGia" value="1000000" placeholder="Vui lòng nhập Giá" />
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" type="number" name="txtSL" value="10" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi %</label>
                                <input class="form-control" name="txtKM" value="0" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type='file' name='flHinh'  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" class="ckeditor" name="txtMoTa" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>NEW</label>
                                <label class="radio-inline">
                                    <input name="rdoNew" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoNew" value="0" type="radio">Không
                                </label>
                            </div>
                            <div class="form-group">
                                <label>SEO</label>
                                <label class="radio-inline">
                                    <input name="rdoSeo" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoSeo" value="0" type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection