@extends('master')

@section('breadcrumb')

<nav class="level">
	<div class="level-left">
		<div class="level-item">
			<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				<ul>
					<li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
					<li>
						<a href="/grows/{{$farm->grow->id}}#records">
							<h3 class="title is-3 has-text-link">{{ $farm->grow->cycle}}</h3>
						</a>
					</li>
					<li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
					<li class="is-active"><a><h3 class="title is-3">Material Slips</h3></a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Right side -->
	<div class="level-right">
		<h4 class="subtitle is-4 level-item">
			<a class="button is-small is-outlined" href="/receivings/grows/{{ $farm->grow->id }}/create">Create</a>
		</h4>
	</div>
</nav>


</h3>

@endsection

@section('content')

<table class="table is-narrow is-fullwidth is-bordered">
	<thead>
		<th>Date</th>
		<th>Reference</th>
		<th>Material</th>
		<th>Quantity</th>
		<th>Declared Weight</th>
		<th>Actual Weight</th>
		<th>Ticket Scale No</th>
		<th>Weigh</th>
	</thead>

	<tbody>
		@foreach($farm->receivings as $x)
			<tr>
				<td rowspan="{{ $x->receiving_lines->count()}}">{{ $x->date }}</td>
				<td rowspan="{{ $x->receiving_lines->count()}}">{{ $x->doc_no }}</td>

				@foreach($x->receiving_lines as $i => $y)

					<td>{{ $y->material->short_description }}</td>
					<td>{{ $y->quantity }}</td>
				
					@if($i == 0)

						<td rowspan="{{ $x->receiving_lines->count()}}">{{ $d = $x->total_declared_weight() }}</td>
				
						@if($x->total_declared_weight() != $x->total_actual_weight())
							<td bgcolor="#FF6347" rowspan="{{ $x->receiving_lines->count() }}">{{ $x->total_actual_weight() }}</td>
						@else
							<td rowspan="{{ $x->receiving_lines->count() }}">{{ $x->total_actual_weight() }}</td>
						@endif

						<td rowspan="{{ $x->receiving_lines->count() }}">
							@foreach ($x->truck_weighings as $y)

							<a class="tooltip is-tooltip is-small" style="border-color:white" data-tooltip="{{ number_format($y->kg_net_weight) . ' KG'  }}"><u>{{ $y->ticket_no }}</u></a>

							@endforeach
						</td>

						<td rowspan="{{ $x->receiving_lines->count() }}">
							<form method="POST" action="/truckWeighings">
								@csrf
								<input type="hidden" name="receiving_id" value="{{ $x->id }}">
								<input type="text" name="ticket_no" placeholder="ticket no" required>
								<input type="text" name="kg_net_weight" placeholder="kg net weight" required>
								<input type="submit" value="weigh">
							</form>
						</td>
					@endif
				</tr>
			@endforeach
		@endforeach
	</tbody>

</table>

@endsection

@section('scripts')

<script type="text/javascript">

	var app = new Vue({
		el: '#app_body',
		data: {}

	});

</script>

@endsection