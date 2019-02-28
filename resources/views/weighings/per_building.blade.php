@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id }}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li><a href="/days/farms/{{ $farm->id }}#{{ $building->name }}"><h3 class="title is-3 has-text-link">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $building->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Weighings</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
	    	
	  	</div>
	</nav>

@endsection

@section('content')

	<span>*** weights are in g</span>
	<pen-weighings :current_weighings="{{ $current_weighings }}" :n_weighings="{{ config('default.n_weighs')}}"></pen-weighings>

@endsection

@section('scripts')

	<script type="text/javascript">

		var app = new Vue({
			el: '#app_body',
		});
		
	</script>

@endsection