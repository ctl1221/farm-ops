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
  			class_a_fee:0.00,
  			growing_defectives_rate:0.00,
  			hauling_defectives_rate:0.00,
  			lpg_rate:0.50,
  			incentive_1_rate:0.00,
  			incentive_2_rate:0.00,
  			power_subsidy:47729.50,
  			vetmed_disinfectant_rebate:63479.50,
  			dob_vaccination:75918.68,
  			depletion:0.00,
  			fly_charges_rate:0.00,
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

  			total_growers_fee:function(){
  				return this.basic_fees + (this.bpi_rate + this.fcri_rate + this.growing_defectives_rate + this.hauling_defectives_rate + this.lpg_rate + this.incentive_1_rate + this.incentive_2_rate) * this.birds_harvested + this.class_a_fee + this.power_subsidy + this.vetmed_disinfectant_rebate;
  			},

  			total_chargeable:function(){
  				return this.dob_vaccination + this.depletion + (this.fly_charges_rate * this.birds_harvested);
  			},

  			net_growers_fee:function(){
  				return this.total_growers_fee - this.total_chargeable;
  			},
  		},

  		methods: {
  			submitForm: function(){
  				axios.post('/sales',
  				{
  					farm_id: '{{ $farm->id }}',
  					pct_hr: this.pct_hr,
  					fcr: this.fcr,
  					alw: this.alw,
  					age: this.age,
  				}
  				).then(response => window.location.href = '/grows/{{ $farm->grow->id }}#records');
  			}
  		}
  	});

	</script>

@endsection

@section('content')

	<div class="columns">

		<div class="column is-two-fifths">

			@include('sales.partials.create_first_column')

			<button class="button is-fullwidth is-success" @click="submitForm()">Create</button>

		</div>

		<div class="column">

			@include('sales.partials.create_second_column')

		</div>

	</div>

@endsection