<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('layouts.head')
</head>
    <body class="">
		
		<div id="main" class="main-full">
			@include('layouts.header')
			@include('layouts.sidebar')
			@section('main-content')
				@show
			@include('layouts.footer')
		</div>
    </body>
</html>
