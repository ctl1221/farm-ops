@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id}}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
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

<table class="table is-bordered is-narrow is-fullwidth">
	<thead>
		<tr class="has-background-light">
			<th>Date</th>
			<th>Hatchery Source</th>
			<th>Net Received</th>
			<th>Truck Plate No.</th>
			<th>Seal No.</th>
			<th>Notes</th>
		</tr>
	</thead>

	<tbody>
		<tr v-for="x in loadings">
			<td>
				@{{ x.date + ' - ' + x.arr_farm }} &nbsp;
				<a class="tooltip is-tooltip is-small" style="border-color:white" :data-tooltip="'Time Dep Hatchery - ' + x.dep_hatchery + ' | Time Dep Farm - ' + x.dep_farm "><i class="fas fa-info-circle"></i></a>
			</td>
			<td>
				@{{ x.hatchery_source }} &nbsp;

				<a class="tooltip is-tooltip is-small" style="border-color:white" :data-tooltip="'Source Identification - ' + x.source_id"><i class="fas fa-info-circle"></i></a>

			</td>

			<td>
				@{{ x.net_received }} &nbsp;

				<a class="tooltip is-tooltip is-small" style="border-color:white" :data-tooltip="'Birds - ' + x.total_delivered + ' | DOA - ' + x.doa "><i class="fas fa-info-circle"></i></a>

			</td>
			<td> 
				@{{ x.truck_plate_no }} &nbsp;

				<a class="tooltip is-tooltip is-small" style="border-color:white" :data-tooltip="'Trucker Name - ' + x.trucker_name"><i class="fas fa-info-circle"></i></a>

			</td>
			<td>@{{ x.seal_no }}</td>
			<td>@{{ x.notes }}</td>
		</tr>
	</tbody>
</table>

<form method="POST" action='/loadings'>
	@csrf

	<input type="hidden" v-model="farm_id" value="{{ $farm->id }}">

	<input class="input" type="date" v-model="date">
	<input class="input" type="text" v-model="hatchery_source" placeholder="hatchery source">
	<input class="input" type="text" v-model="total_delivered" placeholder="total delivered">
	<input class="input" type="text" v-model="doa" placeholder="doa">
	<input class="input" type="text" v-model="net_received" placeholder="net chicks received">
	<input class="input" type="text" v-model="truck_plate_no" placeholder="truck plate no">
	<input class="input" type="text" v-model="trucker_name" placeholder="trucker's name">
	Time Departure Hatchery<input class="input" type="time" v-model="dep_hatchery">
	Time Arrival Farm<input class="input" type="time" v-model="arr_farm">
	Time Departure Farm<input class="input" type="time" v-model="dep_farm">
	<input class="input" type="text" v-model="source_id" placeholder="source identification">
	<input class="input" type="text" v-model="seal_no" placeholder="seal no">
	<input class="input" type="text" v-model="notes" placeholder="notes">
	<input @click.prevent="submitForm" type="submit" class="button is-info is-outlined">
</form>

@endsection

@section('scripts')

	<script type="text/javascript">

		var app = new Vue({
			el: '#app_body',

			data: {
				farm_id: {{$farm->id}},
				date:'',
				hatchery_source:'',
				total_delivered:'',
				doa:'',
				net_received:'',
				truck_plate_no:'',
				trucker_name:'',
				dep_hatchery:'',
				arr_farm:'',
				dep_farm:'',
				source_id:'',
				seal_no:'',
				notes:'',
			    loadings: [],
			},

			methods: {
				getEntries: function() {
					axios.get('/api/getLoadingsOfFarm/' + {{ $farm->id }}).then(response => this.loadings = response.data.loadings);
				},

				clearInputs: function() {
	  				this.date = '';
					this.hatchery_source = '';
				  	this.total_delivered = '';
				  	this.doa = '';
				  	this.net_received = '';
				  	this.truck_plate_no = '';
				  	this.trucker_name = '';
				  	this.dep_hatchery = '';
				  	this.arr_farm = '';
				  	this.dep_farm = '';
				  	this.source_id = '';
				  	this.seal_no = '';
				  	this.notes = '';
	  			},

			  	submitForm: function() {
				  	axios.post('/loadings', this.$data).then(response => {
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