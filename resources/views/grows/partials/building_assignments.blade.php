<div class="card">
	<header class="card-header has-background-info">
    	<p class="card-header-title">
    		Farm / Building Assignments
    	</p>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content">

  			<div v-if="untaken_farms.length"class="container is-marginless" style="padding-bottom: 1rem">
	  			<div class="select">
					<select v-model="selectedFarm">
						<option v-for="farms in untaken_farms">@{{ farms }}</option>
					</select>
				</div>
				<button class="button is-outlined is-success" @click="createFarm({{ $grow->id }})">+</button>
			</div>

			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Farm Designation</th>
					<th>Buildings</th>
					<th v-if="untaken_building_ids.length">Assign Building</th>
				</thead>

				<tbody>
					<tr v-for="(farm, index) in farms">
						<td>@{{ farm.name }}</td>	
						<td>
							<span v-for="building in farm.buildings" 
							class="tag is-warning" 
							style="margin-right: 0.25rem"> 
								@{{ building.name }}
							</span>
						</td>
						<td v-if="untaken_building_ids.length">
							<div class="select is-small">
								<select name="building_id" v-model="selectedBuilding[index]">
									<option 
										:value="building.id"
										v-for="building in buildings" 
										v-if="!taken_buildings_ids.includes(building.id)" 
										v-text="building.name">
									</option>
								</select>
							</div>
							<button class="button is-small is-outlined is-success" @click="assignBuilding(farm.id, index)">+</button>
						</td>
					</tr>
				</tbody>
			</table>


    	</div>
  	</div>
</div>

