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
				    <li class="is-active"><a><h3 class="title is-3">Create New Harvest</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>
	</nav>

@endsection

@section('content')

<table class="table is-bordered is-narrow is-hoverable is-fullwidth">
	<thead>
		<tr class="has-background-light">
			<th>Date</th>
			<th>Truck Plate No.</th>
			<th>Birds Harvested</th>
		</tr>
	</thead>

	<tbody>
		<tr v-for="x in harvests">
			<td>@{{ x.date }}</td>
			<td>@{{ x.truck_plate_no }}</td>	
			<td>@{{ x.total_birds_harvested }}</td>	
		</tr>
	</tbody>
</table>

<form method="POST" action='/harvests'>

	<input type="hidden" v-model="farm_id" value="{{ $farm->id }}">

	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<input class="input" type="date" v-model="date">
			</div>
			<div class="level-item">
				<input class="input" type="text" v-model="truck_plate_no" placeholder="truck plate no">
			</div>
			<div class="level-item">
				<input class="input" type="text" v-model="total_birds_harvested" placeholder="total birds harvested">
			</div>
			<div class="level-item">
				<input @click.prevent="submitForm" type="submit" class="button is-info is-outlined">
			</div>
		</div>
	</div>
</form>

@endsection

@section ('scripts')

	<script type="text/javascript">

		var app = new Vue({
  		el: '#app_body',
  		data: {
  			farm_id: {{$farm->id}},
  			date: '',
  			truck_plate_no: '',
  			total_birds_harvested: '',
    		harvests: [],
  		},

  // 		computed: {
		//     computedSum: function () {
		//       return this.harvests.reduce(function (total, num) {return total + parseInt(num['total_birds_harvested'])});
		//     }
		// },

  		methods: {
  			// sumOfBirds(total, item) {
  			// 	return total + parseInt(item.total_birds_harvested);
  			// },

  			getEntries: function() {
  				axios.get('/api/getHarvestsOfFarm/' + {{$farm->id}}).then(response => {this.harvests=response.data.harvests});
  			},

  			clearInputs: function() {
  				this.date = '';
				this.truck_plate_no = '';
  				this.total_birds_harvested = '';
  			},

  			submitForm: function() {
  				axios.post('/harvests',{
  					'farm_id': this.farm_id,
  					'date': this.date,
  					'truck_plate_no': this.truck_plate_no,
  					'total_birds_harvested': this.total_birds_harvested,
  				}).then(response => {
  					this.getEntries();
  					this.clearInputs();
  				});
  			}
  		},

  		mounted () {
  			this.getEntries (); 
  		}

		})

	</script>

@endsection