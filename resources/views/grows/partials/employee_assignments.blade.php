<h3>Employee Assignments</h3>

<table border="1">
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