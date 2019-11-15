@extends('layouts.index')

@section('content')
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
                        <li class="active"><a href="loaitin">Tin Tức</a></li>
                        <li><a href="danhmuc">Danh Mục</a></li>
                        <li><a href="smartphones">Smartphones</a></li>                                  
                        <li><a href="phukien">Phụ Kiện</a></li>
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
<!-- /NAVIGATION -->
<!-- Page Content -->
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Loại Tin
                    </li>

                    <li href="#" class="list-group-item menu1">
                        Level 1
                    </li>
                    
                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>

                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>

                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>
                    
                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>
                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Panel heading without title</b></h4>
                    </div>

                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="image/320x150.png" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>Project Five</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident .</p>
                            <a class="btn btn-primary" href="detail.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>

                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="image/320x150.png" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>Project Five</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident .</p>
                            <a class="btn btn-primary" href="detail.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>

                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="image/320x150.png" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>Project Five</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident .</p>
                            <a class="btn btn-primary" href="detail.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>

                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <li>
                                    <a href="#">&laquo;</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
<!-- end Page Content -->
@endsection