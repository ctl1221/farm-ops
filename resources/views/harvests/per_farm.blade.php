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
				    <li class="is-active"><a><h3 class="title is-3">Create New Harvest</h3></a></li>
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
			<th>Birds Harvested</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($harvests as $x)
			<tr>
				<td>{{ $x->date }}</td>
				<td>{{ $x->truck_plate_no }}</td>	
				<td>{{ $x->total_birds_harvested }}</td>	
			</tr>
		@endforeach
	</tbody>
</table>

<form method="POST" action='/harvests'>
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
				<input class="input" type="text" name="total_birds_harvested" placeholder="total birds harvested">
			</div>
			<div class="level-item">
				<input type="submit" class="button is-info is-outlined">
			</div>
		</div>
	</div>
</form>

@endsection