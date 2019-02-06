@extends('master')

@section('content')

Farm {{ $farm->name }}, Cycle {{ $farm->grow->cycle }}

<table>
	<thead>
		<th>Date</th>
		<th>Truck Plate No.</th>
		<th>Birds Harvested</th>
	</thead>

	<tbody>
		@foreach ($harvests as $x)
			<tr>
				<td>{{ $x->date }}</td>
				<td>{{ $x->truck_plate_no }}</td>	
				<td>{{ $x->total_birds_harvested }}</td>	
			</tr>
		@endforeach
	</tbody>
</table>

<form method="POST" action='/harvests'>
	@csrf

	<input type="hidden" name="farm_id" value="{{ $farm->id }}">
	<input type="date" name="date">
	<input type="text" name="truck_plate_no" placeholder="truck plate no">
	<input type="text" name="total_birds_harvested" placeholder="total birds harvested">
	<input type="submit">
</form>

@endsection