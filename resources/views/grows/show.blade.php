@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $grow->cycle}}</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
			<div class="item">
				<div class="buttons has-addons">
				  <span class="button">Yes</span>
				  <span class="button">Maybe</span>
				  <span class="button">No</span>
				</div>
			</div>
	  	</div>
	</nav>

@endsection


@section('content')

	@include('grows.partials.performance')

	<br/>

	@include('grows.partials.info')

	<br/>

	@include('grows.partials.records')

	<br/>

	@include('grows.partials.employee_assignments')

	<br/>

	@include('grows.partials.building_assignments')

@endsection

@section('scripts')

	<script type="text/javascript">

		var app = new Vue({
			el: '#app_body',

			data: {
				selectedFarm: '',
				selectedBuilding: [],
				selectedManager: [],
				selectedSupervisor: [],
				selectedCaretaker: [],
				manager_list: {!! $manager_list !!},
				supervisor_list: {!! $supervisor_list !!},
				caretaker_list: {!! $caretaker_list !!},
				employee_assignments: [],
				farms: {!! $farms !!},
				farm_names: {!! $farm_names !!},
				untaken_farms: {!! $farms!!},
				buildings: {!! $buildings !!},
				taken_buildings_ids: {!! $taken_buildings_ids !!},
				untaken_building_ids: [],
			},

			methods: {
				getEmployeeAssignments: function() {
					axios.get('/api/getEmployeeAssignmentsOfGrow/' + {{ $grow->id }}).then(response => {
						this.employee_assignments = response.data;

						for (var i = 0; i < response.data.length; i++) { 
							this.selectedManager[i] = this.manager_list[0].id;
							this.selectedSupervisor[i] = this.supervisor_list[0].id;
							this.selectedCaretaker[i] = this.caretaker_list[0].id;
						}
					});
				},

				getFarms: function() {
					axios.get('/api/getFarmsOfGrow/' + {{ $grow->id }}).then(response => {
						this.farms = response.data;

						for (var i = 0; i < response.data.length; i++) { 
						  this.selectedBuilding[i] = this.untaken_building_ids[0];
						}
					});
				},

				createFarm: function(grow_id) {
					axios.post('/farms',{
						name: this.selectedFarm,
						grow_id: grow_id,
					}).then(response => {

						this.getFarms();

						untaken = this.untaken_farms;
						untaken.splice( untaken.indexOf(this.selectedFarm), 1);

						this.untaken_farms = untaken;
						this.selectedFarm = untaken[0];
					});
				},

				updateUntakenFarms: function() {

					untaken = this.farm_names;
					for (var i = 0; i < this.farms.length; i++) {
						untaken.splice( untaken.indexOf(this.farms[i].name) , 1)
					};

					this.untaken_farms = untaken;
					this.selectedFarm = untaken[0];
				},

				updateUntakenBuildings: function() {
					untaken = []
					for (var i = 0; i < this.buildings.length; i++) {
						if( ! this.taken_buildings_ids.includes(this.buildings[i].id))
						{
							untaken.push(this.buildings[i].id);
						}
					};

					this.untaken_building_ids = untaken;
				},

				assignManager: function (index, building_id, farm_id) {
					axios.post('/assign_building_manager',{
						farm_id: farm_id,
						building_id: building_id,
						manager_id: this.selectedManager[index]
					}).then(response => this.getEmployeeAssignments());
				},

				unassignManager: function (building_id, farm_id) {
					axios.post('/unassign_building_manager',{
						farm_id: farm_id,
						building_id: building_id,
					}).then(response => this.getEmployeeAssignments());
				},

				assignSupervisor: function (index, building_id, farm_id) {
					axios.post('/assign_building_supervisor',{
						farm_id: farm_id,
						building_id: building_id,
						supervisor_id: this.selectedSupervisor[index]
					}).then(response => this.getEmployeeAssignments());
				},

				unassignSupervisor: function (building_id, farm_id) {
					axios.post('/unassign_building_supervisor',{
						farm_id: farm_id,
						building_id: building_id,
					}).then(response => this.getEmployeeAssignments());
				},

				assignCaretaker: function (index, building_id, farm_id) {
					axios.post('/assign_building_caretaker',{
						farm_id: farm_id,
						building_id: building_id,
						caretaker_id: this.selectedCaretaker[index],
					}).then(response => this.getEmployeeAssignments());
				},

				unassignCaretaker: function (building_id, farm_id) {
					axios.post('/unassign_building_caretaker',{
						farm_id: farm_id,
						building_id: building_id,
					}).then(response => this.getEmployeeAssignments());
				},
				
				assignBuilding: function (farm_id, index) {
					axios.post('/buildings/farm/' + farm_id + '/assign', {
						building_id: this.selectedBuilding[index],
					}).then(response => {
						this.taken_buildings_ids.push(this.selectedBuilding[index]);
						this.getEmployeeAssignments();
						this.updateUntakenBuildings();
						this.getFarms();
					});
				},
		  	},

		  	mounted () {
			  	this.getEmployeeAssignments();
			  	this.getFarms();
			  	this.updateUntakenBuildings();
			  	this.updateUntakenFarms();
		  	}
		});
		
	</script>

@endsection