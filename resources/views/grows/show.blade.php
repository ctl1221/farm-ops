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
	    	<h4 class="subtitle is-4 level-item">
	    		Duration : {{ $period_start }} to {{ $period_end }} 
	    		({{ Carbon\Carbon::parse($period_end)->diffInDays(Carbon\Carbon::parse($period_start)) + 1 }} 
	    		Days)
	    	</h4>
	  	</div>
	</nav>

@endsection


@section('content')

	@include('grows.partials.info')

	<br/>

	<div class="columns">
		<div class=column>
			@include('grows.partials.sales_summary')
		</div>
		<div class=column>
			@include('grows.partials.expenses_summary')
		</div>
	</div>

	@include('grows.partials.records')

	<br/>

	@include('grows.partials.invoices')

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
				selectedSupervisor: [],
				supervisor_list: {!! $supervisor_list !!},
				employee_assignments: [],
			},

			methods: {
				getEmployeeAssignments: function() {
					axios.get('/api/getEmployeeAssignmentsOfGrow/' + {{ $grow->id }}).then(response => {
						this.employee_assignments = response.data;

						for (var i = 0; i < response.data.length; i++) { 
						  this.selectedSupervisor[i] = this.supervisor_list[0].id;
						}
					});
				},

				assignSupervisor(index, building_id, farm_id) {
					axios.post('/assign_building_supervisor',{
						farm_id: farm_id,
						building_id: building_id,
						supervisor_id: this.selectedSupervisor[index]
					}).then(response => this.getEmployeeAssignments());
				},

				unassignSupervisor(building_id, farm_id) {
					axios.post('/unassign_building_supervisor',{
						farm_id: farm_id,
						building_id: building_id,
					}).then(response => this.getEmployeeAssignments());
				},
		  	},

		  	mounted () {
			  	this.getEmployeeAssignments();
		  	}
		});
		
	</script>

@endsection