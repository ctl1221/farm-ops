@extends('master')

@section('content')

Creating Sales for {{ $farm->name }}

	@php
		$total_mortalities = $farm->mortalities->sum('quantity');
		$pct_hr = (1 - $total_mortalities / $quantity_started) * 100;
		$total_received =  $farm->loadings->sum('total_delivered');
		$total_doa =  $farm->loadings->sum('doa');
		$net_received = $total_received - $total_doa;
		$FCR = ($farm->feeds_consumptions->sum('quantity')*50) / (($net_received-$total_mortalities) * .501);
	@endphp

	<div class="columns">
		<div class="column">
			<table class="table is-bordered is-fullwidth">

				<tr>
					<th colspan="4">Efficiencies and Incentives</th>
				</tr>
				
				<tr>
					<td>%HR</td>
					<td>{{ number_format($pct_hr, 2) . ' %' }}</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<td>FCR</td>
					<td>{{ $FCR }}</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<th colspan="4">Quantity Started</th>
				</tr>

				<tr>
					<td class="has-text-right">Net Day Old Broilers Received</td>
					<td>{{ $total_received }}</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<td class="has-text-right">DOB Bird Adjustment</td>
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
					<th colspan="4">Flock Details</th>
				</tr>

				<tr>
					<td>Broilers Harvested</td>
					<td>---</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<td>Net Live Weight</td>
					<td>---</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<td>Staging Time Adjusted</td>
					<td>---</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<td>Adjusted Live Weight</td>
					<td>---</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr>
					<td>Feed in Crop</td>
					<td>---</td>
					<td>---</td>
					<td>---</td>
				</tr>

			</table>
		</div>

			<div class="column">
			<table class="table is-bordered is-fullwidth">
				<tr>
					<th>
						----
					</th>
				</tr>
			</table>
		</div>
	</div>

@endsection