@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id }}"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Compare</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>
	</nav>

@endsection


@section('content')

	<table class="table is-bordered is-narrow">
		
		<thead>
			<tr>
				<th></th>
				<th>Farm</th>
				<th>Contractor</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<th class="has-text-right">Quantity Started</th>
				<td class="has-text-centered">{{ number_format($quantity_started) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->net_birds_received) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">Birds Harvested</th>
				<td class="has-text-centered">{{ number_format($birds_harvested) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->birds_harvested) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">Reference Weight</th>
				<td class="has-text-centered">{{ number_format($birds_weight) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->net_weight) }}</td>
			</tr>

			<tr><td colspan="3" style="padding: .5rem"></td></tr>

			<tr>
				<th>Feeds Consumption</th>
				<td colspan="2"></td>
			</tr>

			<tr>
				<th class="has-text-right">IBFP</th>
				<td class="has-text-centered">{{ number_format($farm->feeds_breakdown('IBFP')) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->IBFP) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">IBGP</th>
				<td class="has-text-centered">{{ number_format($farm->feeds_breakdown('IBGP')) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->IBGP) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">IBSC</th>
				<td class="has-text-centered">{{ number_format($farm->feeds_breakdown('IBSC')) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->IBSC) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">ICBC</th>
				<td class="has-text-centered">{{ number_format($farm->feeds_breakdown('ICBC')) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->ICBC) }}</td>
			</tr>

			<tr><td colspan="3" style="padding: .5rem"></td></tr>

			<tr>
				<th class="has-text-right">%HR</th>
				<td class="has-text-centered">{{ number_format($pct_hr,2) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->pct_hr,2) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">FCR</th>
				<td class="has-text-centered">{{ number_format($fcr,4) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->fcr,4) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">ALW</th>
				<td class="has-text-centered">{{ number_format($alw,3) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->alw,3) }}</td>
			</tr>	

			<tr>
				<th class="has-text-right">BPI</th>
				<td></td>
				<td class="has-text-centered">{{ number_format($farm->sales->bpi,2) }}</td>
			</tr>		

			<tr><td colspan="3" style="padding: .5rem"></td></tr>

			<tr>
				<th class="has-text-right">HR Fee</th>
				<td class="has-text-centered">{{ number_format($hr_fee,2) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->hr_rate * $farm->sales->birds_harvested,2) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">FCR Fee</th>
				<td class="has-text-centered">{{ number_format($fcr_fee,2) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->fcr_rate * $farm->sales->birds_harvested,2) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">ALW Fee</th>
				<td class="has-text-centered">{{ number_format($alw_fee,2) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->alw_fee,2) }}</td>
			</tr>	
	
			<tr>
				<th class="has-text-right">BPI Incentive</th>
				<td></td>
				<td class="has-text-centered">{{ number_format($farm->sales->bpi_rate * $farm->sales->birds_harvested,2) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">Feed Efficiency Bonus</th>
				<td class="has-text-centered">{{ number_format($fcri_fee,2) }}</td>
				<td class="has-text-centered">{{ number_format($farm->sales->fcri_rate * $farm->sales->birds_harvested,2) }}</td>
			</tr>

		</tbody>

	</table>

@endsection