@extends('master')

@section('content')

All grows here

<table border="1">
	<thead>
		<th>Cycle</th>
		<th>Date Start</th>
		<th>Date End</th>
		<th>Quantity Started</th>
		<th>View</th>
	</thead>

	<tbody>
		@foreach ($grows as $x)
			<tr>
				<td>{{ $x->cycle }}</td>	
				<td>{{ $x->date_start }}</td>	
				<td>{{ $x->date_end }}</td>	
				<td>---</td>
				<td><a href="/grows/{{ $x->id }}">View</a></td>
			</tr>
		@endforeach
	</tbody>
	
</table>

@endsection