<div class="card">
	<header class="card-header has-background-success">
    	<p class="card-header-title">Employee Assignments</p>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content">
  			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Farm</th>
					<th>Building</th>
					<th>Supervisor</th>
					<th>Caretaker</th>
				</thead>


				<tbody>
					@foreach ($farms as $farm)
						@foreach ($farm->buildings as $x)
						<tr>
							<td>{{ $farm->name }}</td>
							<td>{{ $x->name }}</td>
							<td>
								@if($x->pivot->supervisor_id)
								{{ $employee_list[$x->pivot->supervisor_id -1] }}
								@endif
							</td>
							<td>
								@if($x->pivot->caretaker_id)
								{{ $employee_list[$x->pivot->caretaker_id -1] }}
								@endif
							</td>
						</tr>
						@endforeach
					@endforeach
				</tbody>
			</table>
    	</div>
  	</div>
</div>