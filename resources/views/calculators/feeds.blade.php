@extends('master')

@section('page_title')

	<div class="level" style="margin-bottom: 0rem">
		<div class="level-left">
			<div class="level-item">
				<h2 class="title is-3" style="margin-bottom: 0rem">Calculate Feeds</h2>
			</div>

			<div class="level-item">
			 	<button class="button is-outlined is-primary" @click="submitForm">Calculate</button>
			</div>

			<div class="level-item">
			 	<button class="button is-outlined is-danger" @click="resetForm">Reset</button>
			</div>
		</div>

		<div class="level-right">
            <div class="level-item">
				<div class="select">
					<select v-model="n_farms">
						<option :value="2">2 Farms</option>
						<option :value="3">3 Farms</option>
						<option :value="4">4 Farms</option>
						<option :value="5">5 Farms</option>
					</select>
				</div>
            </div>
		</div>
	</div>

@endsection

@section('content')

	@include('calculators.partials.feeds_input')

	@include('calculators.partials.feeds_original')

	@include('calculators.partials.feeds_suggested')

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app_body = new Vue({
		  el: '#app_body',
		  data: {
		  	fcr: [],
		  	bpi: [],
		  	alw: [],
		  	hr: [],
		  	age: [],
		  	hr_grow_rates: [],
		  	fcr_grow_rates: [],
		  	fcri_grow_rates: [],
		  	bpi_grow_rates: [],
		  	feeds_consumed: [0,0,0],
		  	quantity_started_edited : [],
		  	birds_harvested: [],
		  	quantity_started: [],
		  	m_farms: ['Farm A', 'Farm B', 'Farm C','Farm D', 'Farm E'],
		  	n_farms: 3,
		  	farms: ['Farm A', 'Farm B','Farm C'],
		  	calculated: false,
		  },

		  computed: {
		  	total_feeds_consumed () {
		  		var total = 0;
		  		for (i = 0; i < this.n_farms; i++) {
		  			total += parseInt(this.feeds_consumed[i]);
				}
				return total;
		  	}
		  },

		  watch: {
		  	 n_farms: function (val, oldVal) {
		  	 	this.farms = this.m_farms.slice(0,val);
		    },
		  },

		  methods: {
		  	submitForm()
		  	{
		  		axios.post('/feeds_calculate', this.$data).then(response => {
		  			console.log(response.data);
		  			this.quantity_started_edited = response.data.quantity_started_edited;

		  			this.calculated = true;
		  		});
		  	},	

		  	resetForm()
		  	{

		  	}
		  }
		})
	</script>

@endsection