<h3>Records</h3>

<table border="1">
	<thead>
		<th>Farm Designation</th>
		<th>Feeds Received</th>
		<th>Loadings</th>
		<th>Daily Data</th>
		<th>Harvest</th>
		<th>Medicine Received</th>
	</thead>

	<tbody>
		@foreach ($farms as $farm)
			<tr>
				<td>{{ $farm->name }}</td>	
				<td><a href="/receivings/farms/{{ $farm->id }}">View</td>
				<td><a href="/loadings/farms/{{ $farm->id }}">View</a></td>
				<td><a href="/days/farms/{{ $farm->id }}">View</a></td>
				<td><a href="/harvests/farms/{{ $farm->id }}">View</a></td>
				<td><a href="/medicines/farms/{{ $farm->id }}">View</a></td>
			</tr>
		@endforeach
	</tbody>
</table>