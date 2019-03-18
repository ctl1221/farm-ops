@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id }}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Create New Sales</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  	<div class="level-right">
	  	</div>
	</nav>

@endsection

@section ('scripts')

	<script type="text/javascript">

		var app = new Vue({
  		el: '#app_body',
  		data: {
  			fcr_rates: {!! $fcr_rates !!},
  			hr_rates: {!! $hr_rates !!},
  			bpi_rates: {!! $bpi_rates !!},
  			fcri_rates: {!! $fcri_rates !!},
  			gross_birds_received:98892,
  			birds_adjustments:100,
  			birds_harvested:95459,
  			gross_weight:190945.13,
  			staging_adjustment:0,
  			feed_in_crop:59.50,
  			IBFP:3013,
  			IBGP:1950,
  			IBSC:900,
  			ICBC:400,
  			age:33.62,
  			alw_fee:1007340.59,
  		},
  		computed: {
  			net_birds_received: function(){
  				return this.gross_birds_received - this.birds_adjustments;
  			},

  			pct_hr: function(){
  				return this.birds_harvested / this.net_birds_received * 100;
  			},

  			net_weight: function(){
  				return this.gross_weight - this.staging_adjustment;
  			},

  			total_feeds_bags: function(){
  				return this.IBFP + this.IBGP + this. IBSC + this.ICBC;
  			},

  			alw: function(){
  				return this.net_weight / this.birds_harvested;
  			},

  			fcr: function(){
  				return this.total_feeds_bags * 50 / (this.birds_harvested * this.alw);
  			},

  			bpi: function(){
  				return this.pct_hr * this.alw * 100 / (this.age * this.fcr);
  			},

  			fcr_rate: function(){
  				let rate = 0;
  				for (let i=0; i<this.fcr_rates.length; i++)
  				{
  					if (this.fcr >= this.fcr_rates[i].start && this.fcr <= this.fcr_rates[i].end)
  					{
  						rate = this.fcr_rates[i].rate;
  						break;
  					}
  				} 
  				return rate;
  			},

  			hr_rate: function(){
  				let rate = 0;
  				for (let i=0; i<this.hr_rates.length; i++)
  				{
  					if (this.pct_hr >= this.hr_rates[i].start && this.pct_hr <= this.hr_rates[i].end)
  					{
  						rate = this.hr_rates[i].rate;
  						break;
  					}
  				} 
  				return rate;
  			},

  			bpi_rate: function(){
  				let rate = 0;
  				for (let i=0; i<this.bpi_rates.length; i++)
  				{
  					if (this.bpi >= this.bpi_rates[i].start && this.bpi <= this.bpi_rates[i].end)
  					{
  						rate = this.bpi_rates[i].rate;
  						break;
  					}
  				} 
  				return rate;
  			},

  			fcri_rate: function(){
  				let rate = 0;
  				for (let i=0; i<this.fcri_rates.length; i++)
  				{
  					if (this.fcr >= this.fcri_rates[i].start && this.fcr <= this.fcri_rates[i].end)
  					{
  						rate = this.fcri_rates[i].rate;
  						break;
  					}
  				} 
  				return rate;
  			},

  			alw_rate:function(){
  				return this.alw_fee / this.birds_harvested;
  			},

  			basic_fees:function(){
  				return this.alw_fee + (this.hr_rate + this.fcr_rate) * this.birds_harvested;
  			},
  		}
  	});

	</script>

@endsection

@section('content')

<form>
	<div class="columns">
		<div class="column is-two-fifths">

			<table class="table is-bordered is-fullwidth is-narrow">
				<tr>
					<th colspan="3" class="has-text-centered">Quantity Started</th>
				</tr>

				<tr>
					<td colspan="2" class="has-text-right">Net Day-Old Broilers Received</td>
					<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="gross_birds_received"></td>		
				</tr>
				
				<tr>
					<td colspan="2" class="has-text-right">DOB/Bird Adjustment</td>
					<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="birds_adjustments"></td>
				</tr>

				<tr>	
					<td colspan="2" class="has-text-right">Adjusted Quantity Started</td>
					<td class="has-text-right" style="padding-right:3.5rem">@{{ net_birds_received | numberFormat}}</td>
				</tr>	

				<tr>
					<th colspan="3" class="has-text-centered">Broilers Harvested</th>
				</tr>	

				<tr>	
					<td colspan="2" class="has-text-right">Broilers Harvested</td>
					<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="birds_harvested"></td>
				</tr>		

				<tr>
					<td colspan="2" class="has-text-right">Net Live Weight</td>
					<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="gross_weight"></td>
				</tr>	

				<tr>
					<td colspan="2" class="has-text-right">Staging Time Adjustment</td>
					<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="staging_adjustment"></td>
				</tr>	

				<tr>
					<td colspan="2" class="has-text-right">Adjusted Live Weight</td>
					<td class="has-text-right" style="padding-right:3.5rem">@{{ net_weight | currencyFormat }}</td>
				</tr>	

				<tr>
					<td colspan="2" class="has-text-right">Feed In Crop</td>
					<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="feed_in_crop"></td>
				</tr>	

				<tr>
					<th colspan="3" class="has-text-centered">Feed Consumption</th>
				</tr>

				<tr>
					<th class="has-text-centered">Feed Type</th>
					<th class="has-text-centered">Bags</th>
					<th class="has-text-centered">KG</th>
				</tr>

				<tr>
					<td class="has-text-centered">IBFP</td>
					<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="IBFP"></td>
					<td class="has-text-right" style="padding-right:4.2rem">@{{ (IBFP * 50) | numberFormat }}</td>
				</tr>

				<tr>
					<td class="has-text-centered">IBGP</td>
					<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="IBGP"></td>
					<td class="has-text-right" style="padding-right:4.2rem">@{{ (IBGP * 50) | numberFormat }}</td>
				</tr>

				<tr>
					<td class="has-text-centered">IBSC</td>
					<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="IBSC"></td>
					<td class="has-text-right" style="padding-right:4.2rem">@{{ (IBSC * 50) | numberFormat }}</td>
				</tr>

				<tr>
					<td class="has-text-centered">ICBC</td>
					<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="ICBC"></td>
					<td class="has-text-right" style="padding-right:4.2rem">@{{ (ICBC * 50) | numberFormat }}</td>
				</tr>

				<tr>
					<td></td>
					<td class="has-text-right" style="padding-right:4.5rem">@{{ total_feeds_bags | numberFormat }}</td>
					<td class="has-text-right" style="padding-right:4.2rem">@{{ (total_feeds_bags * 50) | numberFormat }}</td>
				</tr>

			</table>
		</div>

		<div class="column">
			<table class="table is-bordered is-fullwidth is-narrow">
					
				<tr>
					<th colspan="5" class="has-text-centered">Efficiencies and Incentives</th>
				</tr>

				<tr>
					<td></td>
					<th class="has-text-centered">%HR</th>
					<th class="has-text-centered">FCR</th>
					<th class="has-text-centered">ALW</th>
					<th class="has-text-centered">AGE</th>
				</tr>

				<tr>
					<td class="has-text-right">Adjusted Efficiencies</td>
					<td class="has-text-centered">@{{ pct_hr | currencyFormat }}</td>
					<td class="has-text-centered">@{{ fcr | fcrFormat }}</td>
					<td class="has-text-centered">@{{ alw | weightFormat }}</td>
					<td><input class="input is-small has-text-centered" type="number" v-model="age"></td>
				</tr>


				<tr>
					<td class="has-text-right">Broiler Production Index</td>
					<td class="has-text-centered">@{{ bpi | currencyFormat }}</td>
					<td colspan="3"></td>
				</tr>

				<tr>
					<th class="has-text-centered">Basic Grower's Fee</th>
					<td colspan="3"></td>
					<td class="has-text-right" style="padding-right:3rem">@{{ basic_fees | currencyFormat }}</td>
				</tr>

				<tr>
					<td class="has-text-right">on Live Weight (ALW)</td>
					<td class="has-text-right" style="padding-right:1.5rem">@{{ alw_rate | currencyFormat }}</td>
					<td colspan="2"><input class="input is-small has-text-right" style="padding-right: 2.1rem" type="number" v-model="alw_fee"></td>
					<td></td>
				</tr>

				<tr>
					<td class="has-text-right">on Feed Conversion Ratio (FCR)</td>
					<td class="has-text-right" style="padding-right:1.5rem">@{{ fcr_rate | currencyFormat }}</td>
					<td colspan="2" class="has-text-right" style="padding-right:3.5rem">@{{ (fcr_rate * birds_harvested) | currencyFormat }}</td>
					<td></td>
				</tr>

				<tr>
					<td class="has-text-right">on Harvest Recovery (HR)</td>
					<td class="has-text-right" style="padding-right:1.5rem">@{{ hr_rate | currencyFormat }}</td>
					<td colspan="2" class="has-text-right" style="padding-right:3.5rem">@{{ (hr_rate * birds_harvested) | currencyFormat }}</td>
					<td></td>
				</tr>

				<tr>
					<th class="has-text-centered">Incentives/Subsidies</th>
					<td colspan="4"></td>
				</tr>

				<tr>
					<td class="has-text-right">BPI Incentive</td>
					<td class="has-text-right" style="padding-right:1.5rem">@{{ bpi_rate | currencyFormat }}</td>
					<td colspan="2"></td>
					<td class="has-text-right" style="padding-right:3rem">@{{ (bpi_rate * birds_harvested) | currencyFormat }}</td>
				</tr>

				<tr>
					<td class="has-text-right">Feed Efficiency Bonus</td>
					<td class="has-text-right" style="padding-right:1.5rem">@{{ fcri_rate | currencyFormat }}</td>
					<td colspan="2"></td>
					<td class="has-text-right" style="padding-right:3rem">@{{ (fcri_rate * birds_harvested) | currencyFormat }}</td>
					
				</tr>

			</table>
		</div>
	</div>

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


			</table> --}}
</form>

@endsection