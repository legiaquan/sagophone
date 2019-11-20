@extends('admin.layout.index')
@section('content')
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">XÓA LOẠI TIN <a style="color: tomato">{{ $loaitin->tenloaitin }}</a></h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
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
                      <strong>Lưu ý!</strong>
                      <p>Hệ thống sẽ xóa tất cả tin tức, bình luận liên quan tới nhóm này.</p>
                      <p>Bạn có chắc chắn muốn xóa?</p>

                      <form class="form" action="admin/loaitin/xoa/{{ $loaitin->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>
                          Tôi đồng ý: <input type="checkbox" name="confirm" value="1">
                        </p>

                        <div class="form-actions">
                          <button type="button" class="btn btn-raised btn-raised btn-warning mr-1" onclick="quayve()">
                            <i class="ft-x"></i> Quay về
                          </button>
                          <button type="submit" class="btn btn-raised btn-raised btn-primary">
                            <i class="fa fa-check-square-o"></i> Xóa
                          </button>
                        </div>

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection