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
				    <li class="is-active"><a><h3 class="title is-3">Daily Data</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
	    	<h4 class="subtitle is-4">Unaccounted Chicks: @{{ unaccountedChicks }}{{-- {{  $farm->loadings->sum('net_received') - $farm->buildings->sum('pivot.birds_started') }} --}}</h4>

	  	</div>
	</nav>

@endsection

@section('content')
	
	@foreach($farm->buildings as $building)
		<div class="card">
			<div class="card-header has-background-warning">
				<p class="card-header-title">
					{{ $building->name }} : &nbsp;

					<input type="text" class="input is-small" style="text-align:center; width:100px" :value="birds[{!! $loop->index !!}]['birds_started']" @input="updateBirdStarted($event.target.value, {!! $farm->id !!}, {!! $building->id !!})">
				</p>
			</div>	
			
			<div class="card-content">
				<table class="table is-narrow is-fullwidth is-bordered">
					<thead>
						<th>Day</th>
						<th>Mortality <a href="/mortalities/farms/{{ $farm->id }}/buildings/{{ $building->id }}"><i class="fas fa-eye"></i></a> </th>
						<th>Cum. Mortality</th>
						<th>% Alive</th>
						<th>Feeds Consumed</th>
						<th>Cum. Feeds Consumed</th>
						<th>ALW <a href="/weighings/farms/{{ $farm->id }}/buildings/{{ $building->id }}"><i class="fas fa-eye"></i></a> </th>
						<th>FCR</th>
					</thead>

					<tbody>
						@php 
							$cmortality = 0;
							$cfeedsconsumed = 0;
						@endphp

						@foreach ($days as $x)
							@if($x->building_id == $building->id)
								<tr>
									<td>{{ $x->day }}</td>
									<td>{{ $x->mortalities->sum('quantity') }}</td>
									<td>{{ $cmortality += $x->mortalities->sum('quantity') }}</td>

									<td>
										@if($building->pivot->birds_started)
											{{ number_format((1 - $cmortality / $building->pivot->birds_started) * 100 ,2) . " %" }}
										@else
											---
										@endif
									</td>

									<td>
										<form method="POST" action="/feeds_consumptions/{{ $x->feeds_consumption->id }}">
											@csrf
											@method('patch')
											<div class="level">
												<input class="input is-small" type="text" name="quantity" value="{{ $x->feeds_consumption->quantity }}">
												<button class="button is-small"><i class="fas fa-arrow-circle-right"></i></button>
											</div>
										</form>
									</td>

									<td>{{ $cfeedsconsumed += $x->feeds_consumption->quantity }}</td>
									@if(in_array($x->id, $weighing_days_ids))
										<td>{{ $alw = $x->pen_weighings->where('weight','>',0)->avg('weight') }}</td>
										<td>
											@if ($alw)
												@php 
													$denominator = ($building->pivot->birds_started - $cmortality) * $alw; 
												@endphp
												{{ number_format($cfeedsconsumed * 50 / $denominator, 3)  }}
											@endif
										</td>	
									@else
										<td>---</td>
										<td>---</td>
									@endif	
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>

				<form method="POST" action="/days">
					@csrf
					<input type="hidden" name="farm_id" value="{{ $farm->id }}">
					<input type="hidden" name="building_id" value="{{ $building->id }}">
					<input class="button is-success" type="submit" value="NEW DAY">
				</form>

			</div>
		</div>
	
	<br/>
	
	@endforeach

@endsection

@section('scripts')
	<script type="text/javascript">

		var app = new Vue({
		  el: '#app_body',
		  data: {
		  	total_birds_in_building: 0,
		  	total_birds_in_farm: {!! $farm->loadings->sum('net_received') !!},
		  	birds: {!! $birds_started !!},
		  },

		  computed: {
		  	unaccountedChicks: function () {
		  		return this.total_birds_in_farm - this.total_birds_in_building;
		  	}
		  },

		  methods: {
		  	calcSumBirds()
		  	{
		  		var total_birds_in_building = 0;
	  			for(var i = 0; i < this.birds.length; i++)
		  			{
		  				total_birds_in_building += parseInt(this.birds[i].birds_started);
		  			}
	  			this.total_birds_in_building = total_birds_in_building;
		  	},

		  	updateBirdStarted(newValue, farm_id, building_id)
		  	{
		  		axios.post('/update_bird_started',{
		  			farm_id: farm_id,
		  			building_id: building_id,
		  			birds_started: newValue,
		  		}).then(response => { 

		  			for(var i = 0; i < this.birds.length; i++)
		  			{
		  				if(this.birds[i].farm_id == farm_id && this.birds[i].building_id == building_id)
		  				{
		  					this.birds[i].birds_started = newValue;
		  				}
		  			}; 

		  			this.calcSumBirds();
		  		});
		  	}
		  },

		  mounted () {
		  	this.calcSumBirds();
		  }
		});

	</script>
@endsection