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
  			gross_birds_received:98910,
  			birds_adjustment:100,
  			birds_harvested:94945,
  			gross_weight:180881.59,
  			staging_adjustment:465.94,
  			feed_in_crop:223.70,
  			IBFP:1306,
  			IBGP:2342,
  			IBSC:1384,
  			ICBC:856,
  			age:32.21,
  			alw_fee:961099.85,
  			class_a_fee:0.00,
  			growing_defectives_rate:0.00,
  			hauling_defectives_rate:0.00,
  			lpg_rate:0.50,
  			incentive_1_rate:0.00,
  			incentive_2_rate:0.00,
  			power_subsidy:0,
  			vetmed_disinfectant_rebate:47472.50,
  			dob_vaccination:62543.66,
  			depletion:4065,
  			fly_charges_rate:0.00,
  		},
  		computed: {
  			net_birds_received: function(){
  				return this.gross_birds_received - this.birds_adjustment;
  			},

  			pct_hr: function(){
  				return this.birds_harvested / this.net_birds_received * 100;
  			},

  			net_weight: function(){
  				return this.gross_weight + this.staging_adjustment;
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
            gross_birds_received: this.gross_birds_received,
            birds_adjustment: this.birds_adjustment,
            net_birds_received: this.net_birds_received,
            birds_harvested: this.birds_harvested,
            gross_weight: this.gross_weight,
            staging_adjustment: this.staging_adjustment,
            net_weight: this.net_weight,
            feed_in_crop: this.feed_in_crop,
            IBFP: this.IBFP,
            IBGP: this.IBGP,
            IBSC: this.IBSC,
            ICBC: this.ICBC,
            bpi: this.bpi,
            alw_fee: this.alw_fee,
            fcr_rate: this.fcr_rate,
            hr_rate: this.hr_rate,
            bpi_rate: this.bpi_rate,
            fcri_rate: this.fcri_rate,
            class_a_fee: this.class_a_fee,
            growing_defectives_rate: this.growing_defectives_rate,
            hauling_defectives_rate: this.hauling_defectives_rate,
            lpg_rate: this.lpg_rate,
            incentive_1_rate: this.incentive_1_rate,
            incentive_2_rate: this.incentive_2_rate,
            power_subsidy: this.power_subsidy,
            vetmed_disinfectant_rebate: this.vetmed_disinfectant_rebate,
            total_growers_fee: this.total_growers_fee,
            dob_vaccination: this.dob_vaccination,
            depletion: this.depletion,
            fly_charges_rate: this.fly_charges_rate,
            total_chargeable: this.total_chargeable,
            net_growers_fee: this.net_growers_fee,
  				}
  				).then(response => window.location.href = '/grows/{{ $farm->grow->id }}#records').catch(errors => console.log(errors));
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