<div class="card">
	<header class="card-header has-background-link">
    	<p class="card-header-title">Building Assignments</p>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content">
  			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Farm Designation</th>
					<th>Buildings</th>
					<th>Assign Building</th>
				</thead>

				<tbody>
					@foreach ($farms as $farm)
						<tr>
							<td>{{ $farm->name }}</td>	
							<td>
								@foreach($farm->buildings as $building)
									{{ $building->name }}
								@endforeach
							</td>
							<td>
								<form method="POST" action='/buildings/farm/{{ $farm->id }}/assign'>
									@csrf
									<select name="building_id">
										@foreach($buildings as $building)
											@if(!in_array($building->id, $taken_buildings))
												<option value="{{ $building->id }}">{{ $building->name }}</option>
											@endif
										@endforeach
									</select>
									<input type="submit" value="+">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
    	</div>
  	</div>
</div>

