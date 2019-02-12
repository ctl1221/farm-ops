<div class="card">
	<header class="card-header has-background-link">
    	<p class="card-header-title">
    		Building Assignments
    			<form method="POST" action='/grows/createFarm'>
					@csrf

					<select name="name">
						@foreach($farm_names as $name)
							<option>{{ $name }}</option>
						@endforeach
					</select>
					{{-- <input type="text" name="name" placeholder="Farm Designation"> --}}
					<input type="hidden" name="grow_id" value="{{ $grow->id }}">
					<input type="submit" value="submit">
				</form>
    	</p>
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
									<span class="tag is-warning">{{ $building->name }}</span>
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

