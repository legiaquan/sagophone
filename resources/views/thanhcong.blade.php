@if(Auth::check())
	<h1>Đăng nhập thành công!</h1>
	@if(isset($user))
		{{ "Ten: ".$user->name }}
		<br>
		{{ "Mail: ".$user->email }}
		<a href="{{ url('logout') }}">logout</a>
	@endif
@else
	<h1>Bạn chưa đăng nhập</h1>

@endif