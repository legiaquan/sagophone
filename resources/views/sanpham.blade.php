<style>
	.pagination li{
		list-style: none;
		float:left;
		margin-left: 5px;
	}
</style>

@foreach($sanpham as $value)
	{{ $value->ten }} <br>
@endforeach
{!! $sanpham->appends(['sort'=>'vote'])->links() !!}