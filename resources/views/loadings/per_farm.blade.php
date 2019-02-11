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
{{-- 		@foreach ($loadings as $x)
			<tr>
				<td>{{ $x->date }}</td>
				<td>{{ $x->truck_plate_no }}</td>	
				<td>{{ $x->net_received }}</td>	
			</tr>
		@endforeach --}}

		<tr v-for="x in loadings">
			<td>@{{ x.date}}</td>
			<td>@{{ x.truck_plate_no}}</td>
			<td>@{{ x.net_received}}</td>
		</tr>

	</tbody>
</table>

<button @click="getEntries">Get From Database</button>

<form method="POST" action='/loadings'>
	@csrf

	<input type="hidden" name="farm_id" value="{{ $farm->id }}">

	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<input class="input" type="date" name="date">
			</div>
			<div class="level-item">
				<input class="input" type="text" name="truck_plate_no" placeholder="truck plate no">
			</div>
			<div class="level-item">
				<input class="input" type="text" name="net_received" placeholder="net chicks received">
			</div>
			<div class="level-item">
				<input type="submit" class="button is-info is-outlined">
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
		  	test: 'charles',
		    loadings: [],
		  },

		  methods: {
		  	alertMe: function() {
		  		alert("I've been clicked");
		  	},

		  	getEntries: function() {
		  		// this.loadings.push({'date':'2019-07-08','truck_plate_no':'ghjkjk','net_received':500})
		  		// alert('Get From Database');
		  		axios.get('/api/getAllLoadings')
				  .then(function (response) {
				  		this.loadings = response.data;
				  })
		  	},
		  },

		  mounted () {
		  	// axios.get('/api/getAllLoadings')
				 //  .then(function (response) {
				 //  		this.loadings = response.data;
				 //  		//console.log(response.data)
				 //  })
		  }
		});

	</script>

@endsection