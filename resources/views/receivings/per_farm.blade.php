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
				    <li class="is-active"><a><h3 class="title is-3">Create New Receiving</h3></a></li>
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

<h5 class="title is-5">Feeds Received</h5>

	<table class="table is-bordered is-narrow is-hoverable is-fullwidth">
		<thead>
			<tr class="has-background-light">
				<th>Date</th>
				<th>Document No.</th>
				<th>Description</th>
				<th>Quantity</th>
				<th>Declared Weight</th>
				<th>Actual Weight</th>
				<th>Assigned Slips</th>
				<th>Weigh</th>
			</tr>
		</thead>

		<tbody>
			@php
				$current = 0; 
			@endphp
			@foreach ($farm->receivings as $receiving)
				@foreach($receiving->receiving_lines as $x)
					@php 
						$rowspan = $receiving->receiving_lines->count(); 
					@endphp
					<tr>
						@if($x->receiving_id != $current)
							<td rowspan="{{ $rowspan }}">{{ $receiving->date }}</td>
							<td rowspan="{{ $rowspan }}">{{ $receiving->doc_no }}</td>
						@endif

						<td>{{ $x->material->description }}</td>
						<td>{{ $x->quantity }}</td>	

						@if($x->receiving_id != $current)
							<td rowspan="{{ $rowspan }}">
								{{ $receiving->total_declared_weight() }}
							</td>

							<td rowspan="{{ $rowspan }}">
								{{ $receiving->total_actual_weight() }}
							</td>

							<td rowspan="{{ $rowspan }}">
								@foreach ($receiving->truck_weighings as $y)
									<u>{{ $y->ticket_no }}</u>
								@endforeach
							</td>
							
							<td rowspan="{{ $rowspan }}">
								<form method="POST" action="/truckWeighings">
									@csrf
									<input type="hidden" name="receiving_id" value="{{ $x->receiving_id }}">
									<input type="text" name="ticket_no" placeholder="ticket no">
									<input type="text" name="kg_net_weight" placeholder="kg net weight">
									<input type="submit" value="weigh">
								</form>
							</td>
						@endif				
					</tr>

					@if($x->receiving_id != $current)
						@php 
							$current = $x->receiving_id; 
						@endphp
					@endif
				@endforeach
				@if(!$receiving->receiving_lines->count())
					<tr>
						<td>{{ $receiving->date }}</td>
						<td>{{ $receiving->doc_no }}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				@endif
			
			@endforeach	
		</tbody>
	</table>
		

<form method="POST" action="/receivings">
	@csrf
	<input type="hidden" name="farm_id" value="{{ $farm->id }}">

	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<input class="input" type="date" name="date">
			</div>
			<div class="level-item">
				<input class="input" type="text" name="doc_no" placeholder="document no">
			</div>
			<div class="level-item">
				<input type="submit" class="button is-info is-outlined">
			</div>
		</div>
	</div>	
</form>

<br>

<form method="POST" action="/receivingLines">
	@csrf

	<input type="hidden" name="farm_id" value="{{ $farm->id }}">
	
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<select class="select is-small" name="receiving_id">
					@foreach($farm->receivings as $receiving)
				<option value="{{ $receiving->id }}">{{ $receiving->doc_no }}</option>
					@endforeach
				</select>
			</div>
			<div class="level-item">
				<select class="select is-small" name="material_id">
					@foreach($feeds as $feed)
				<option value="{{ $feed->id }}">{{ $feed->description }}</option>
					@endforeach
				</select>
			</div>
			<div class="level-item">
				<input class="input" type="text" name="batch_no" placeholder="batch no">
			</div>
			<div class="level-item">
				<input class="input" type="text" name="quantity" placeholder="quantity">
			</div>
			<div class="level-item">
				<input type="submit" value="Add Line Item" class="button is-info is-outlined">
			</div>
</form>

@endsection