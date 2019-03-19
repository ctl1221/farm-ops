@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id }}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Harvests</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  	<div class="level-right">
	  		<a href="/deliveries/farms/{{ $farm->id }}">
	  			<button class="button is-outlined is-primary">Deliveries Records</button>
	  		</a>
	  	</div>
	</nav>

@endsection

@section('content')

	<harvests 
		:farm="{{ $farm }}"
		:alw_rates="{{ $alw_rates }}"
		:deliveries_aggregates="{{ $deliveries_aggregates }}">
		
	</harvests>

@endsection

@section ('scripts')

	<script type="text/javascript">

		var app = new Vue({
  		el: '#app_body',
  		data: {},
  	});

	</script>

@endsection