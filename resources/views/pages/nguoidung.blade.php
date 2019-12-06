@extends('layouts.index')


@section('content')
<!-- container -->
<!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <li><a href="trangchu">Trang Chủ</a></li>
                        <li><a href="hotdeals">Hot Deals</a></li>
                        <li><a href="loaitin">Tin Tức</a></li>
                        <li><a href="cuahang">Cửa Hàng</a></li>                                  
                        <li><a href="lienhe">Liên Hệ</a></li>
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
<!-- /NAVIGATION -->
<!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb-tree">
                            <li><a href="trangchu">Trang Chủ</a></li>
                            <li class="active"><a href="nguoidung">Thông Tin Tài Khoản</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->
<div class="container">
<!-- row -->
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Thông tin tài khoản</h3></div>
                        <div class="panel-body">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif

                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <form action="nguoidung" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div>
                                    <label>Tên người dùng</label>
                                    <input type="text" class="form-control" name="userName" aria-describedby="basic-addon1" disabled value="{{Auth::user()->username}}">
                                </div>
                                <br>
                                <div>
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="Email" aria-describedby="basic-addon1"
                                    disabled value="{{Auth::user()->email}}"
                                    >
                                </div>
                                <br>
                                <div>
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="Name" aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
                                </div>
                                <br>    
                                <div class="form-group">
                                    <input type="checkbox" id="changePassword" name="changePassword"/>
                                    <label>(Click để đổi mật khẩu)</label>
                                    <input type="password" class="form-control password" name="Password" placeholder="Nhập mật khẩu mới" disabled="" />
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại Mật Khẩu</label>
                                    <input type="password" class="form-control password" name="againPassword" placeholder="Nhập lại mật khẩu mới" disabled="" />
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="Address"  aria-describedby="basic-addon1" value="{{Auth::user()->diachi}}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="Phone"  aria-describedby="basic-addon1" value="{{Auth::user()->sdt}}">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Cập Nhật
                                </button>
                            </form>
                        </div>
                    </div>
    </div>
    <div class="col-md-2">
    </div>
 <!-- /row -->
</div>
<!-- /container -->

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });            
        });
    </script>
@endsection