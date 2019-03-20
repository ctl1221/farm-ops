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
				<td></td>
				<td class="has-text-centered">{{ number_format($farm->sales->IBFP) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">IBGP</th>
				<td></td>
				<td class="has-text-centered">{{ number_format($farm->sales->IBGP) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">IBSC</th>
				<td></td>
				<td class="has-text-centered">{{ number_format($farm->sales->IBSC) }}</td>
			</tr>

			<tr>
				<th class="has-text-right">ICBC</th>
				<td></td>
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

	{{-- <div class="columns">
		<div class="column is-one-third">
			<table class="table is-bordered is-fullwidth is-narrow">

				<tr>
					<th colspan="3" class="has-text-centered">Efficiencies and Incentives</th>
				</tr>
				
				<tr>
					<td class="has-text-right">ALW</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">FCR</td>
					<td class="has-text-centered">{{ number_format($FCR, 3) }}</td>
					<td class="has-text-centered">0.000</td>
				</tr>

				<tr>
					<td class="has-text-right">%HR</td>
					<td class="has-text-centered">{{ number_format($pct_hr, 2) . ' %' }}</td>
					<td class="has-text-centered">00.00 %</td>
				</tr>

				<tr>
					<td class="has-text-right">Age</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">0.000</td>
				</tr>

				<tr>
					<td class="has-text-right">BPI</td>
					<td class="has-text-centered">000</td>
					<td class="has-text-centered">0.000</td>
				</tr>

				<tr>
					<th colspan="3" class="has-text-centered">Quantity Started</th>
				</tr>

				<tr>
					<td class="has-text-right">Net Day Old Broilers Received</td>
					<td class="has-text-centered">{{ $total_received }}</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">DOB Bird Adjustment</td>
					<td class="has-text-centered">{{ $total_doa }}</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Adjusted Quantity Started</td>
					<td class="has-text-centered">{{ $net_received }}</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<th colspan="3" class="has-text-centered">Flock Details</th>
				</tr>

				<tr>
					<td class="has-text-right">Broilers Harvested</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Net Live Weight</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Staging Time Adjusted</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Adjusted Live Weight</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Feed in Crop</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<th colspan="3" class="has-text-centered">Depletion</th>
				</tr>

				<tr>
					<td class="has-text-right">Recorded Depletion</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Hauling Rejects / Runts</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<td class="has-text-right">Unaccounted Depletion</td>
					<td class="has-text-centered">---</td>
					<td class="has-text-centered">---</td>
				</tr>

				<tr>
					<th colspan="3" class="has-text-centered">Feed Consumption (Internal)</th>
				</tr>

				<tr>
					<td class="has-text-right">IBFP</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<td class="has-text-right">IBGP</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>				

				<tr>
					<td class="has-text-right">IBSC</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<td class="has-text-right">ICBC</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<td class="has-text-right"></td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<th colspan="3" class="has-text-centered">Feed Consumption (Official)</th>
				</tr>

				<tr>
					<td class="has-text-right">IBFP</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<td class="has-text-right">IBGP</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>				

				<tr>
					<td class="has-text-right">IBSC</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<td class="has-text-right">ICBC</td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

				<tr>
					<td class="has-text-right"></td>
					<td class="has-text-centered">0,000 Bags</td>
					<td class="has-text-centered">000,000 KG</td>
				</tr>

			</table>
		</div>

			<div class="column">
			<table class="table is-bordered is-fullwidth is-narrow">
				<tr>
					<th colspan="3">Basic Grower's Fee</th>
					<td class="has-text-centered">0,000,000.00</td>
					<td colspan="2"></td>
					<td class="has-text-centered">0,000,000.00</td>
				</tr>
				<tr>
					<td class="has-text-right">on ALW</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered"></td>
				</tr>
				<tr>
					<td class="has-text-right">on FCR</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered"></td>
				</tr>
				<tr>
					<td class="has-text-right">on HR</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered"></td>
				</tr>

				<tr>
					<th colspan="7">Incentives / Subsidies</th>
				</tr>

				<tr>
					<td class="has-text-right">BPI Incentive</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Feed Efficiency Bonus</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Class A</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Growing Defectives</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Hauling Defectives</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">LPG</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Other Incentive 1</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Other Incentive 2</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<th colspan="7">Penalties</th>
				</tr>

				<tr>
					<td class="has-text-right">Feed In Crop (FIC)</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<th colspan="7">Adjustments</th>
				</tr>

				<tr>
					<td class="has-text-right">Construction Asst. Incentive</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">FICWaive</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Vetmed & Disint. Incentive</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td class="has-text-centered">0.00</td>
					<td class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr><td colspan="7" style="padding: 1.90rem"></td></tr>
				
				<tr>
					<th colspan="3">Total Grower's Fee</th>
					<td class="has-text-centered">0,000,000.00</td>
					<td colspan="2"></td>
					<td class="has-text-centered">0,000,000.00</td>
				</tr>

				<tr>
					<th>Gross Fee / Bird</th>
					<td class="has-text-centered">00.00</td>
					<td colspan="2"></td>
					<td class="has-text-centered">00.00</td>
					<td colspan="2"></td>
				</tr>

				<tr><td colspan="7" style="padding: 1.95rem"></td></tr>

				<tr>
					<th colspan="7">Chargeable to Grower</th>
				</tr>

				<tr>
					<td class="has-text-right">DOB Vaccination</td>
					<td colspan="2" class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td colspan="2" class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Unaccounted Depletion</td>
					<td colspan="2" class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td colspan="2" class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr>
					<td class="has-text-right">Fly Control Charges</td>
					<td colspan="2" class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
					<td colspan="2" class="has-text-centered"></td>
					<td class="has-text-centered">000,000.00</td>
				</tr>

				<tr><td colspan="7" style="padding: 1.25rem"></td></tr>

				<tr>
					<th colspan="3">Net Grower's Fee</th>
					<td class="has-text-centered">0,000,000.00</td>
					<td colspan="2"></td>
					<td class="has-text-centered">0,000,000.00</td>
				</tr>

				<tr>
					<th>Net Fee / Bird</th>
					<td class="has-text-centered">00.00</td>
					<td colspan="2"></td>
					<td class="has-text-centered">00.00</td>
					<td colspan="2"></td>
				</tr>


			</table>
		</div>
	</div> --}}

@endsection