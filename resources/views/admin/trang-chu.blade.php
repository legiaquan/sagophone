@extends('admin.layout.index')
@section('content')
 <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0">{{ $sothanhvien }}</h3>
                            <span>User</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-users font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0">{{ $soluongsanphamdaban }}</h3>
                            <span>Số sản phẩm đã bán</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-pie-chart font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">                  
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card bg-success">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0">{{ $sodonhangpending }}</h3>
                            <span>Đơn hàng chờ</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-graph font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 class="font-large-1 mb-0">{{ number_format($doanhthu) }}₫</h3>
                            <span>Doanh thu</span>
                        </div>
                        <div class="media-right white text-right">
                            <i class="icon-wallet font-large-1"></i>
                        </div>
                    </div>
                </div>
                <div id="Widget-line-chart4" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">                    
                </div>
            </div>
        </div>
    </div>
</div>

<!--Light table starts-->
<section id="light">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top 10 sản phẩn bán chạy nhất</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table">
                            <thead class="thead-default">
                                <tr>
                                    <th>#</th>
                                    <th>ID sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Giá niêm yết</th>
                                    <th>Số lượng đã bán</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $top = 0;?>
                              @foreach($sanphambanchay as $row)
                                <tr>
                                    <?php $top++;?>
                                    <th>{{ $top }}</th>
                                    <td scope="row">{{ $row->id_sanpham }}</td>
                                    <td><img width="50px" src="upload/imgSanPham/{{ $row->hinhsp }}" />{{ $row->tensp }}</td>
                                    <td bgcolor="{{ $row->mamau }}">{{ $row->mau }}</td>
                                    <td>{{ number_format($row->gia) }}₫</td>
                                    <td>{{ $row->soluongbanchay }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Light table Ends-->

@endsection