@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{$farm->grow->id}}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Feeds Received</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
			<div class="level-item" style="align-items: center;">
	    	</div>
	  	</div>
	</nav>

@endsection

@section('content')

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
	
@endsection