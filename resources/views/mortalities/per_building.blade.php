@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id }}"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li><a href="/days/farms/{{ $farm->id }}"><h3 class="title is-3 has-text-link">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $building->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Mortalities</h3></a></li>
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

	


			{{-- @foreach ($current_days as $x)
				<tr>
					<td class="has-text-centered">{{ $x->day }}</td>
					@php
						$current_total = 0;
						$current_pens_mortalities = $x->mortalities->pluck('quantity');
					@endphp

					@foreach($x->mortalities as $y)
						<td class="has-text-centered">
							<form method="POST" action="/mortalities/{{ $y->id }}">
								@csrf
								@method('patch')
								<input class="input is-small" style="width:40px" type="test" name="quantity" value="{{ $y->quantity }}">
								<button class="button is-small"></button>
							</form>
						</td>
						@php
							$current_total += $y->quantity;
						@endphp
					@endforeach
					<td class="has-text-centered">{{ $current_total }}</td>
				</tr>
			@endforeach --}}

	<pen-mortalities :current_days="{{ $current_days }}"></pen-mortalities>

@endsection

@section('scripts')

<script>

	var app = new Vue({
		el: '#app_body'
	});

</script>

@endsection 