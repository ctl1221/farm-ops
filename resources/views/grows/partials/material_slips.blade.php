<div id="material_slips" class="card">
	<header class="card-header has-background-warning">
		<nav class="level">
			<div class="level-left">
				<div class="level-item">
		      		<p class="card-header-title">Material Slips</p>
		      		<a class="button is-small is-outlined" href="/receivings/grows/{{ $grow->id }}/create">Create</a>
		    	</div>
		  	</div>
		</nav>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content">
  			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Date</th>
					<th>Farm</th>
					<th>Reference</th>
					<th>Declared Weight</th>
					<th>Actual Weight</th>
					<th>Ticket Scale No</th>
					<th>Weigh</th>
				</thead>

				<tbody>
					@foreach($grow->receivings as $x)
						<tr>
							<td>{{ $x->date }}</td>
							<td>{{ $x->farm->name }}</td>
							<td>{{ $x->doc_no }}</td>
							<td>{{ $d = $x->total_declared_weight() }}</td>
							@if($x->total_declared_weight() != $x->total_actual_weight())
								<td bgcolor="#FF6347">{{ $x->total_actual_weight() }}</td>
							@else
								<td>{{ $x->total_actual_weight() }}</td>
							@endif
							<td>
								@foreach ($x->truck_weighings as $y)
									<a class="tooltip is-tooltip is-small" style="border-color:white" data-tooltip="{{ number_format($y->kg_net_weight) . ' KG'  }}"><u>{{ $y->ticket_no }}</u></a>
								@endforeach
							</td>
							<td>
								<form method="POST" action="/truckWeighings">
									@csrf
									<input type="hidden" name="receiving_id" value="{{ $x->id }}">
									<input type="text" name="ticket_no" placeholder="ticket no" required>
									<input type="text" name="kg_net_weight" placeholder="kg net weight" required>
									<input type="submit" value="weigh">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
					
			</table>
    	</div>
  	</div>
</div>