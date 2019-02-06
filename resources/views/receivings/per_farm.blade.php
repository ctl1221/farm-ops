@extends('master')

@section('breadcrumb')
	<nav class="breadcrumb" aria-label="breadcrumbs">
	  <ul>
	  	<li><a href="#">All Grows</a></li>
	    <li><a href="#">Current Grow</a></li>
	    <li><a href="#">Farms</a></li>
	    <li class="is-active"><a href="#" aria-current="page">Receiving</a></li>
	  </ul>
	</nav>
@endsection

@section('content')

<h1>Feeds Received</h1>

	<table border="1">
		<thead>
			<th>Date</th>
			<th>Document No.</th>
			<th>Description</th>
			<th>Quantity</th>
			<th>Declared Weight</th>
			<th>Actual Weight</th>
			<th>Assigned Slips</th>
			<th>Weigh</th>
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
	<input type="date" name="date">
	<input type="text" name="doc_no" placeholder="document no">
	<input type="submit" value="submit">
</form>

<form method="POST" action="/receivingLines">
	@csrf
	<input type="hidden" name="farm_id" value="{{ $farm->id }}">
	<select name="receiving_id">
		@foreach($farm->receivings as $receiving)
			<option value="{{ $receiving->id }}">{{ $receiving->doc_no }}</option>
		@endforeach
	</select>
	<select name="material_id">
		@foreach($feeds as $feed)
			<option value="{{ $feed->id }}">{{ $feed->description }}</option>
		@endforeach
	</select>
	<input type="text" name="batch_no" placeholder="batch no">
	<input type="text" name="quantity" placeholder="quantity">
	<input type="submit" value="add line item">
</form>

@endsection