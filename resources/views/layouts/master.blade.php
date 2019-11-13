<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quan le</title>
	<link rel="stylesheet" href="<?php echo asset('public/css/style.css');?>">
</head>
<body>
	@include('layouts.Header')
	<div id = "content">
		<h1>Học lập trình</h1>
		@yield('NoiDung')
	</div>

</body>
	@include('layouts.Footer')

</html>