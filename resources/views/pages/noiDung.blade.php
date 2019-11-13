@extends('layouts.master')

@section('NoiDung')

<h2> Quân </h2>
<?php $khoahoc = array('PHP','IOS','ASP');?>


@forelse($khoahoc as $value)
	@break($value=="IOS")
	{{$value}}<br>
@empty
	{{"Mang rong"}}
@endforelse

@endsection