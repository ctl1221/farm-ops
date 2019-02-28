{{-- <grow-employee-assignments 
	:grow="{{ $grow }}"
	:employee_assignments="{{ $employee_assignments }}"
	:supervisor_list="{{ $supervisor_list }}"
	:caretaker_list="{{ $caretaker_list }}"

	@employee_assignments_changed="">
		
</grow-employee-assignments> --}}
<div class="card">
	<header class="card-header has-background-info">
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
						<td style="width:350px">
							<div class="level">
								<div class="level-left">
									<div class="select is-small" v-if="!x.supervisor_name">
										<select v-model="selectedSupervisor[index]">
											<option v-for="y in supervisor_list" :value="y.id">
												@{{ y.display_name }}
											</option>
										</select>
									</div>
									@{{ x.supervisor_name }}
								</div>

								<div class="level-right">
									<button v-if="!x.supervisor_name" class="button is-outlined is-success is-small" 
										@click="assignSupervisor(index, x.building_id, x.farm_id)">
											Assign
									</button>
									<button v-if="x.supervisor_name" class="button is-outlined is-danger is-small" 
										@click="unassignSupervisor(x.building_id, x.farm_id)">
											Unassign
									</button>
								</div>
							</div>
							
						</td>
						<td style="width:350px">
							<div class="level">
								<div class="left">	
									@{{ x.caretaker_name }}
									<div class="select is-small" v-if="! x.caretaker_name" >
										<select v-model="selectedCaretaker[index]">
											<option v-for="c in caretaker_list" :value="c.id">@{{ c.display_name }}</option>
										</select>
									</div>
								</div>
								<div class="right">	
		 							<button v-if="! x.caretaker_name" @click="assignCaretaker(index, x.building_id, x.farm_id)" class="button is-outlined is-small is-success">Assign</button> 
		 							<button v-if="x.caretaker_name" @click="unassignCaretaker(x.building_id, x.farm_id)" class="button is-outlined is-small is-danger">Unassign</button>
		 						</div>	
 							</div>
						</td>
					</tr>
				</tbody>
			</table>
    	</div>
  	</div>
</div>