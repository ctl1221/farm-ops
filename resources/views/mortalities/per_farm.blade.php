@extends('master')

@section('content')

	Per building mortality here
	@foreach($farm->buildings as $building)
		<h1>{{ $building->name }}
			<form method="POST" action="/days">
				@csrf
				<input type="hidden" name="farm_id" value="{{ $farm->id }}">
				<input type="hidden" name="building_id" value="{{ $building->id }}">
				<input type="submit" value="new day">
			</form>
		</h1>

		<table>
			<thead>
				<th>Day</th>
				<th>Mortality</th>
				<th>Feeds Consumed</th>
			</thead>

			<tbody>
				@foreach ($days as $x)
					@if($x->building_id == $building->id)
						<tr>
							<td>{{ $x->day }}</td>
							<td>
								<form>
									<input type="text" name="subtotal">
									<input type="submit" value="update">
								</form>
							</td>
							<td>---</td>
						</tr>
					@endif
				@endforeach
			</tbody>

		</table>

		<!--
		<form method="POST" action='/mortalities'>
			@csrf

			<input type="hidden" name="farm_id" value="{{ $farm->id }}">
			<input type="hidden" name="building_id" value="{{ $building->id }}">
			<input type="time" name="time">
			<input type="text" name="subtotal" placeholder="subtotal">
			<input type="submit">
		</form>
	-->

	@endforeach


@endsection