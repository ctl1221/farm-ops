<!DOCTYPE html>
<html>

<head>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<title></title>
</head>

<body> 
	<div id="root">
		@include('nav')

		<div class="container">
			@yield('breadcrumb')
		</div>

		<div class="container">
			@yield('content')
		</div>
	</div>
</body>

@yield('script')

</html>