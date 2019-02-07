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


</h3>

@endsection


@section('content')

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