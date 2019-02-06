@extends('master')

@section('content')

Farm {{ $farm->name }}, Cycle {{ $farm->grow->cycle }}

<table border="1">
	<thead>
		<th>Date</th>
		<th>Truck Plate No.</th>
		<th>Total Birds Harvested</th>
	</thead>

	<tbody>
		@foreach ($loadings as $x)
			<tr>
				<td>{{ $x->date }}</td>
				<td>{{ $x->truck_plate_no }}</td>	
				<td>{{ $x->net_received }}</td>	
			</tr>
		@endforeach
	</tbody>
</table>

<form method="POST" action='/loadings'>
	@csrf

	<input type="hidden" name="farm_id" value="{{ $farm->id }}">
	<input type="date" name="date">
	<input type="text" name="truck_plate_no" placeholder="truck plate no">
	<input type="text" name="net_received" placeholder="net chicks received">
	<input type="submit">
</form>

@endsection