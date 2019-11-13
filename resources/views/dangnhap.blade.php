{{ $error or '' }}
<form action="{{ route('login') }}" method="post">
	{{ csrf_field() }}
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<input type="submit">
</form>