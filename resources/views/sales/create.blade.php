@extends('master')

@section('content')

Creating Sales for {{ $farm->name }}

<table class="table is-fullwidth is-bordered">
	<thead>
		<tr>
			<th></th>
			<th>Op Data</th>
			<th>Official Data</th>
			<th>Difference</th>
		</tr>
	</thead>

	<tbody>

		<tr>
			<th colspan="4">Flock Details</th>
		</tr>

		@php
			$total_received =  $farm->loadings->sum('total_delivered');
			$total_doa =  $farm->loadings->sum('doa');
			$net_received = $total_received - $total_doa;
		@endphp

		<tr>
			<td>Net Day Old Broilers Received</td>
			<td>{{ $total_received }}</td>
			<td>---</td>
			<td>---</td>
		</tr>

		<tr>
			<td>DOB Bird Adjustment</td>
			<td>{{ $total_doa }}</td>
			<td>---</td>
			<td>---</td>
		</tr>

		<tr>
			<td>Adjusted Quantity Started</td>
			<td>{{ $net_received }}</td>
			<td>---</td>
			<td>---</td>
		</tr>

		<tr>
			<th colspan="4">Efficiencies and Incentives</th>
		</tr>

		@php
			$total_mortalities = $farm->mortalities->sum('quantity');
			$pct_hr = (1 - $total_mortalities / $quantity_started) * 100;
		@endphp
		<tr>
			<td>%HR</td>
			<td>{{ number_format($pct_hr, 2) . ' %' }}</td>
			<td>---</td>
			<td>---</td>
		</tr>

		@php
			$FCR = ($farm->feeds_consumptions->sum('quantity')*50) / (($net_received-$total_mortalities) * .501);
		@endphp
		<tr>
			<td>FCR</td>
			<td>{{ $FCR }}</td>
			<td>---</td>
			<td>---</td>
		</tr>


	</tbody>
</table>

@endsection