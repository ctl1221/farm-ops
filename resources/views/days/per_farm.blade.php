@extends('master')

@section('content')

	<h3>Total live chicks received: {{ $farm->loadings->sum('net_received') }}</h3>
	<h3>Total unaccounted chicks: {{  $farm->loadings->sum('net_received') - $farm->buildings->sum('pivot.birds_started') }}</h3>

	@foreach($farm->buildings as $building)
		<h1>{{ $building->name }}</h1>

		<h3>Quantity Started: 
			<form method="POST" action="/update_bird_started">
				@csrf
				<input type="hidden" name="farm_id" value="{{ $farm->id }}">
				<input type="hidden" name="building_id" value="{{ $building->id }}">
				<input type="text" name="birds_started" value="{{ $building->pivot->birds_started }}">
				<input type="submit" value="U">
			</form>	
		</h3>
		
		<form method="POST" action="/days">
			@csrf
			<input type="hidden" name="farm_id" value="{{ $farm->id }}">
			<input type="hidden" name="building_id" value="{{ $building->id }}">
			<input type="submit" value="new day">
		</form>

		<table class="table is-narrow is-fullwidth is-bordered">
			<thead>
				<th>Day</th>
				<th>Mortality <a href="/mortalities/farms/{{ $farm->id }}/buildings/{{ $building->id }}">V</a> </th>
				<th>Cumulative Mortality</th>
				<th>Harvest Recovery</th>
				<th>Feeds Consumed</th>
				<th>Cumulative Feeds Consumed</th>
				<th>ALW <a href="/weighings/farms/{{ $farm->id }}/buildings/{{ $building->id }}">V</a> </th>
				<th>FCR</th>
			</thead>

			<tbody>
				@php 
					$cmortality = 0;
					$cfeedsconsumed = 0;
				@endphp

				@foreach ($days as $x)
					@if($x->building_id == $building->id)
						<tr>
							<td>{{ $x->day }}</td>
							<td>{{ $x->mortalities->sum('quantity') }}</td>
							<td>{{ $cmortality += $x->mortalities->sum('quantity') }}</td>

							<td>
								@if($building->pivot->birds_started)
									{{ number_format($cmortality / $building->pivot->birds_started * 100,2) . " %" }}
								@else
									---
								@endif
							</td>

							<td>
								<form method="POST" action="/feeds_consumptions/{{ $x->feeds_consumption->id }}">
									@csrf
									@method('patch')
									<input type="text" name="quantity" value="{{ $x->feeds_consumption->quantity }}">
									<input type="submit" value="U">
								</form>
								@if(session('message') == $x->feeds_consumption->id)
									"Entry has been Updated"
								@endif
							</td>

							<td>{{ $cfeedsconsumed += $x->feeds_consumption->quantity }}</td>
							@if(in_array($x->id, $weighing_days_ids))
								<td>{{ $alw = $x->pen_weighings->where('weight','>',0)->avg('weight') }}</td>
								<td>
									@if ($alw)
										@php 
											$denominator = ($building->pivot->birds_started - $cmortality) * $alw; 
										@endphp
										{{ number_format($cfeedsconsumed * 50 / $denominator, 3)  }}
									@endif
								</td>	
							@else
								<td>---</td>
								<td>---</td>
							@endif	

						</tr>
					@endif
				@endforeach
			</tbody>

		</table>

	@endforeach

@endsection