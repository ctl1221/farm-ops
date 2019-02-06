@extends('master')

@section('content')

Electricity Billing

<table border="1">
	<thead>
		<th>Period Start</th>
		<th>Period End</th>
		<th>KWH</th>
		<th>Amount</th>
		<th>Supplier Name</th>
	</thead>

	<tbody>
		@foreach ($utility_bills as $x)	
			<tr>
				<td>{{ $x->period_start }}</td>
				<td>{{ $x->period_end }}</td>
				<td>{{ $x->utility->kwh }}</td>
				<td>{{ number_format($x->amount,2) }}</td>
				<td>{{ $x->supplier->name }}</td>
			</tr>
		@endforeach	
	</tbody>
	
</table>

@endsection