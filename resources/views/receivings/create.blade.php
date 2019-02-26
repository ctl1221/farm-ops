@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $grow->id }}"><h3 class="title is-3 has-text-link">{{ $grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Create Material Slip</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
			<div class="level-item" style="align-items: center;">
	    	</div>
	  	</div>
	</nav>

@endsection

@section('content')		

	<material-slip></material-slip>

@endsection

@section('scripts')

	<script type="text/javascript">

		var app = new Vue({
			el: '#app_body',
			data: {
				// grid_fields: [
				// 	{name: 'Enter', type:'input',value:'Input'},
				// 	{name: 'Display', type:'text',value:'Text'},
				// 	{name: 'Select', type:'dropdown', value:['a','b','c']},
				// ],
			}
		});
		
	</script>

@endsection