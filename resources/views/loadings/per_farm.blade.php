@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="#"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Create New Loading</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
	    	
	  	</div>
	</nav>

@endsection

@section('content')

<table class="table is-bordered is-narrow is-hoverable is-fullwidth">
	<thead>
		<tr class="has-background-light">
			<th>Date</th>
			<th>Truck Plate No.</th>
			<th>Total Birds Harvested</th>
		</tr>
	</thead>

	<tbody>
		<tr v-for="x in loadings">
			<td>@{{ x.date }}</td>
			<td>@{{ x.truck_plate_no }}</td>
			<td>@{{ x.net_received }}</td>
		</tr>
	</tbody>
</table>

<form method="POST" action='/loadings'>
	@csrf

	<input type="hidden" v-model="farm_id" value="{{ $farm->id }}">

	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<input class="input" type="date" v-model="date">
			</div>
			<div class="level-item">
				<input class="input" type="text" placeholder="truck plate no" v-model="truck_plate_no">
			</div>
			<div class="level-item">
				<input class="input" type="text" v-model="net_received" placeholder="net chicks received">
			</div>
			<div class="level-item">
				<input @click.prevent="submitForm" type="submit" class="button is-info is-outlined">
			</div>
		</div>
	</div>
</form>

@endsection

@section('scripts')

	<script type="text/javascript">

		var app = new Vue({
			el: '#app_body',

			data: {
				farm_id: {{$farm->id}},
				date:'',
				truck_plate_no:'',
				net_received:'',
			    loadings: [],
			},

			methods: {
				getEntries: function() {
					axios.get('/api/getLoadingsOfFarm/' + {{ $farm->id }}).then(response => this.loadings = response.data.loadings);
				},

				clearInputs: function() {
	  				this.date = '';
					this.truck_plate_no = '';
	  				this.net_received = '';
	  			},

			  	submitForm: function() {
				  		axios.post('/loadings',{
				  			'farm_id':this.farm_id,
				  			'date': this.date,
				  			'truck_plate_no':this.truck_plate_no,
				  			'net_received':this.net_received,
				  		}).then(response => {
				  			this.getEntries();
				  			this.clearInputs();
				  		});
			  	},
		  	},

		  	mounted () {
			  	this.getEntries();
		  	}
		});

	</script>

@endsection