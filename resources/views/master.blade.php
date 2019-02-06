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

		@include('nav')

		<section class="section">
			<div class="columns">
{{-- 	  			<div class="column is-4-tablet is-3-desktop is-2-widescreen has-background-light">
	  				@include('ops_menu')
				</div> --}}

	  			<div class="column">

	  				@yield('page_title')

	  				@yield('breadcrumb')

					@yield('toolbar')

	  				@yield('content')
				</div>
			</div>
		</section>


{{-- 		<div class="container">
			@yield('breadcrumb')
		</div> --}}
</body>

<script type="text/javascript">
	
	var menu = new Vue({
	  el: '#menu',
	  data: {
	  	showMenu: true,
	  }
	})

</script>

@yield('scripts')

</html>