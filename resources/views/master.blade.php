<!DOCTYPE html>
<html>

<head>

	{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">

	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<title>Coops</title>
</head>

<body> 
	<div id="root">

		<div id="navbar">
			@include('nav')
		</div>

		<h1 class="title is-2 has-text-centered has-background-light has-text-danger" style="padding:0.25rem">
			{{ env('APP_NAME') }}
		</h1>

		<div id="app_body">
			<section class="section" style="padding-top:0rem">
				@yield('page_title')
				@yield('breadcrumb')
				@yield('toolbar')
				@yield('content')
			</section>
		</div>
	</div>
</body>

<script type="text/javascript">

	var navbar = new Vue({
	  el: '#navbar',
	  data: {
	  	ops_dropdown: false,
	  	adm_dropdown: false,
	  	showMenu: false,
	  }
	});
	
</script>

@yield('scripts')

</html>