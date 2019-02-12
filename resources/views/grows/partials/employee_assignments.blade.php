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
					<tr v-for="(x, index) in employee_assignments">
						<td>@{{ x.farm_name }}</td>
						<td>@{{ x.building_name }}</td>
						<td>
							<div class="level">
								<div class="level-left">
									<div class="level-item" v-if="!x.supervisor_name">
										<div class="select is-small">
											<select v-model="selectedSupervisor[index]">
												<option v-for="y in supervisor_list" :value="y.id">
													@{{ y.display_name }}
												</option>
											</select>
										</div>
									</div>

									<div class="level-item">
										@{{ x.supervisor_name }}
									</div>
								</div>

								<div class="level-right">
									<div class="level-item">
										<button v-if="!x.supervisor_name" class="button is-outlined is-success is-small" 
										@click="assignSupervisor(index, x.building_id, x.farm_id)">
											Assign
										</button>
									</div>

									<div class="level-item">
										<button v-if="x.supervisor_name" class="button is-outlined is-danger is-small" 
										@click="unassignSupervisor(x.building_id, x.farm_id)">
											Unassign
										</button>
									</div>
								</div>
							</div>
							
						</td>
						<td>
							@{{ x.caretaker_name }}
						</td>
					</tr>
				</tbody>
			</table>
    	</div>
  	</div>
</div>