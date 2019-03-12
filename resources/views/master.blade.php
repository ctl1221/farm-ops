<!DOCTYPE html>
<html>

	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="{{mix('css/app.css')}}">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

{{-- 		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}

		<title>Coops</title>
	</head>

	<body> 
		<div id="app_body">
			<div id="navbar">
				<my-navbar></my-navbar>
			</div>

			<h1 class="title is-2 has-text-centered has-background-light has-text-danger" style="padding:0.25rem">
				{{ env('APP_NAME') }}
			</h1>

			<section class="section" style="padding-top:0rem">
				@yield('page_title')
				@yield('breadcrumb')
				@yield('toolbar')
				@yield('content')
			</section>

			@include('footer')
		</div>
	</body>

	<script src="{{mix('js/app.js')}}"></script>

	@yield('scripts')

</html>